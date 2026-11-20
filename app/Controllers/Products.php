<?php

namespace App\Controllers;

use App\Models\ProductModel;

class Products extends BaseController
{
    public function index()
    {
        $model = new ProductModel();

        return view('products', [
            'products' => $model->findAll()
        ]);
    }

    public function new()
    {
        return view('product_new');
    }

    public function create()
    {
        $rules = [
            'name' => 'required|max_length[100]',
            'price' => 'required|numeric|greater_than_equal_to[0]',
            'stock_quantity' => 'required|integer|greater_than_equal_to[0]',
            'image' => 'permit_empty|is_image[image]|mime_in[image,image/jpeg,image/png]|max_size[image,2048]'
        ];

        if (! $this->validate($rules)) {
            return redirect()->back()->withInput()
                ->with('errors', $this->validator->getErrors());
        }

        $data = [
            'name' => $this->request->getPost('name'),
            'price' => $this->request->getPost('price'),
            'stock_quantity' => $this->request->getPost('stock_quantity'),
            'created_at' => date('Y-m-d H:i:s')
        ];

        $file = $this->request->getFile('image');

        if ($file && $file->isValid() && ! $file->hasMoved()) {
            $path = FCPATH . 'uploads/products/';

            if (! is_dir($path)) {
                mkdir($path, 0755, true);
            }

            $name = $file->getRandomName();
            $file->move($path, $name);

            \Config\Services::image()
                ->withFile($path . $name)
                ->fit(300, 300, 'center')
                ->save($path . $name);

            $data['image'] = $name;
        }

        (new ProductModel())->insert($data);

        return redirect()->to('/products');
    }

    public function edit($id)
    {
        $product = (new ProductModel())->find($id);

        if (! $product) {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
        }

        return view('product_edit', ['product' => $product]);
    }

    public function update($id)
    {
        $model = new ProductModel();
        $product = $model->find($id);

        if (! $product) {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
        }

        $rules = [
            'name' => 'required|max_length[100]',
            'price' => 'required|numeric|greater_than_equal_to[0]',
            'stock_quantity' => 'required|integer|greater_than_equal_to[0]',
            'image' => 'permit_empty|is_image[image]|mime_in[image,image/jpeg,image/png]|max_size[image,2048]'
        ];

        if (! $this->validate($rules)) {
            return redirect()->back()->withInput()
                ->with('errors', $this->validator->getErrors());
        }

        $data = [
            'name' => $this->request->getPost('name'),
            'price' => $this->request->getPost('price'),
            'stock_quantity' => $this->request->getPost('stock_quantity')
        ];

        $file = $this->request->getFile('image');

        if ($file && $file->isValid() && ! $file->hasMoved()) {
            $path = FCPATH . 'uploads/products/';

            if (! is_dir($path)) {
                mkdir($path, 0755, true);
            }

            $name = $file->getRandomName();
            $file->move($path, $name);

            \Config\Services::image()
                ->withFile($path . $name)
                ->fit(300, 300, 'center')
                ->save($path . $name);

            $data['image'] = $name;
        }

        $model->update($id, $data);

        return redirect()->to('/products');
    }

    public function delete($id)
    {
        $model = new ProductModel();
        $product = $model->find($id);

        if (! $product) {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
        }

        if (db_connect()->table('sales')->where('product_id', $id)->countAllResults() > 0) {
            return redirect()->to('/products')
                ->with('error', 'Cannot delete a product with sales history.');
        }

        $model->delete($id);

        return redirect()->to('/products');
    }
}
