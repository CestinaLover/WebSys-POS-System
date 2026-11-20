<?php

namespace App\Controllers;

use App\Models\ProductModel;
use App\Models\CustomerModel;

class Sales extends BaseController
{
    public function index()
    {
        $db = db_connect();

        $sales = $db->table('sales')
            ->select('sales.*, products.name AS product_name,
                      customers.full_name AS customer_name,
                      users.full_name AS staff_name')
            ->join('products', 'products.id = sales.product_id')
            ->join('customers', 'customers.id = sales.customer_id', 'left')
            ->join('users', 'users.id = sales.sold_by')
            ->orderBy('sales.created_at', 'DESC')
            ->get()
            ->getResultArray();

        return view('sales', ['sales' => $sales]);
    }

    public function new()
    {
        return view('sale_new', [
            'products' => (new ProductModel())
                ->where('stock_quantity >', 0)
                ->findAll(),
            'customers' => (new CustomerModel())->findAll()
        ]);
    }

    public function create()
    {
        $rules = [
            'product_id' => 'required|is_natural_no_zero',
            'customer_id' => 'permit_empty|is_natural_no_zero',
            'quantity' => 'required|is_natural_no_zero'
        ];

        if (! $this->validate($rules)) {
            return redirect()->back()
                ->withInput()
                ->with('errors', $this->validator->getErrors());
        }

        $productId = (int) $this->request->getPost('product_id');
        $quantity = (int) $this->request->getPost('quantity');
        $customerId = $this->request->getPost('customer_id');
        $staffId = (int) session()->get('user_id');

        if ($staffId <= 0) {
            return redirect()->to('/login');
        }

        $db = db_connect();
        $db->transBegin();

        try {
            $product = $db->table('products')
                ->where('id', $productId)
                ->get()
                ->getRowArray();

            if (! $product) {
                throw new \RuntimeException('Product not found.');
            }

            if ($quantity > (int) $product['stock_quantity']) {
                throw new \RuntimeException('Not enough stock available.');
            }

            if (! empty($customerId)) {
                $customer = $db->table('customers')
                    ->where('id', (int) $customerId)
                    ->get()
                    ->getRowArray();

                if (! $customer) {
                    throw new \RuntimeException('Customer not found.');
                }
            }

            $db->table('products')
                ->set('stock_quantity', 'stock_quantity - ' . $quantity, false)
                ->where('id', $productId)
                ->where('stock_quantity >=', $quantity)
                ->update();

            if ($db->affectedRows() !== 1) {
                throw new \RuntimeException('Not enough stock available.');
            }

            $total = round((float) $product['price'] * $quantity, 2);

            $saved = $db->table('sales')->insert([
                'product_id' => $productId,
                'customer_id' => empty($customerId) ? null : (int) $customerId,
                'sold_by' => $staffId,
                'quantity' => $quantity,
                'total_price' => $total,
                'created_at' => date('Y-m-d H:i:s')
            ]);

            if (! $saved || $db->transStatus() === false) {
                throw new \RuntimeException('Could not record sale.');
            }

            $db->transCommit();

            return redirect()->to('/sales')
                ->with('success', 'Sale recorded successfully.');

        } catch (\Throwable $e) {
            $db->transRollback();

            log_message('error', 'Sale failed: ' . $e->getMessage());

            $message = $e instanceof \RuntimeException
                ? $e->getMessage()
                : 'Unable to record sale. Please try again.';

            return redirect()->back()
                ->withInput()
                ->with('error', $message);
        }
    }
}
