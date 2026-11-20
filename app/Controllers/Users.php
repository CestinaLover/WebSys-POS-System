<?php

namespace App\Controllers;

use App\Models\UserModel;

class Users extends BaseController
{
    public function index()
    {
        $model = new UserModel();

        return view('users', [
            'users' => $model->findAll()
        ]);
    }

    public function new()
    {
        return view('user_new');
    }

    public function create()
    {
        $rules = [
            'username' => 'required|max_length[50]|is_unique[users.username]',
            'full_name' => 'required|max_length[100]',
            'password' => 'required|min_length[8]'
        ];

        if (! $this->validate($rules)) {
            return redirect()->back()
                ->withInput()
                ->with('errors', $this->validator->getErrors());
        }

        $model = new UserModel();

        $model->insert([
            'username' => $this->request->getPost('username'),
            'full_name' => $this->request->getPost('full_name'),
            'password' => password_hash(
                $this->request->getPost('password'),
                PASSWORD_DEFAULT
            ),
            'created_at' => date('Y-m-d H:i:s')
        ]);

        return redirect()->to('/users')
            ->with('success', 'Staff account added successfully.');
    }

    public function edit($id)
    {
        $model = new UserModel();
        $user = $model->find($id);

        if (! $user) {
            return redirect()->to('/users')
                ->with('error', 'Staff account not found.');
        }

        return view('user_edit', [
            'user' => $user
        ]);
    }

    public function update($id)
    {
        $model = new UserModel();
        $user = $model->find($id);

        if (! $user) {
            return redirect()->to('/users')
                ->with('error', 'Staff account not found.');
        }

        $rules = [
            'username' => "required|max_length[50]|is_unique[users.username,id,{$id}]",
            'full_name' => 'required|max_length[100]',
            'password' => 'permit_empty|min_length[8]',
            'avatar' => 'permit_empty|is_image[avatar]|mime_in[avatar,image/jpeg,image/png]|max_size[avatar,2048]'
        ];

        if (! $this->validate($rules)) {
            return redirect()->back()
                ->withInput()
                ->with('errors', $this->validator->getErrors());
        }

        $data = [
            'username' => $this->request->getPost('username'),
            'full_name' => $this->request->getPost('full_name')
        ];

        $password = $this->request->getPost('password');

        if (! empty($password)) {
            $data['password'] = password_hash($password, PASSWORD_DEFAULT);
        }

        $file = $this->request->getFile('avatar');

        if ($file && $file->isValid() && ! $file->hasMoved()) {
            $path = FCPATH . 'uploads/avatars/';

            if (! is_dir($path)) {
                mkdir($path, 0755, true);
            }

            $name = $file->getRandomName();
            $file->move($path, $name);

            \Config\Services::image()
                ->withFile($path . $name)
                ->fit(150, 150, 'center')
                ->save($path . $name);

            $data['avatar'] = $name;
        }

        $model->update($id, $data);

        return redirect()->to('/users')
            ->with('success', 'Staff account updated successfully.');
    }

    public function delete($id)
    {
        $model = new UserModel();

        if (! $model->find($id)) {
            return redirect()->to('/users')
                ->with('error', 'Staff account not found.');
        }

        if ((int) session()->get('user_id') === (int) $id) {
            return redirect()->to('/users')
                ->with('error', 'You cannot delete your own account.');
        }

        $hasSales = db_connect()->table('sales')
            ->where('sold_by', $id)
            ->countAllResults();

        if ($hasSales > 0) {
            return redirect()->to('/users')
                ->with('error', 'Cannot delete staff with sales history.');
        }

        $model->delete($id);

        return redirect()->to('/users')
            ->with('success', 'Staff account deleted successfully.');
    }
}