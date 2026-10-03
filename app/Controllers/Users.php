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
            'username'  => 'required|is_unique[users.username]',
            'full_name' => 'required'
        ];

        if (! $this->validate($rules)) {
            return redirect()->back()
                ->withInput()
                ->with('errors', $this->validator->getErrors());
        }

        $model = new UserModel();

        $model->insert([
            'username'   => $this->request->getPost('username'),
            'full_name'  => $this->request->getPost('full_name'),
            'created_at' => date('Y-m-d H:i:s')
        ]);

        return redirect()->to('/users');
    }

    public function edit($id)
    {
        $model = new UserModel();
        $user = $model->find($id);

        if (! $user) {
            return redirect()->to('/users');
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
            return redirect()->to('/users');
        }

        $rules = [
            'username'  => "required|is_unique[users.username,id,{$id}]",
            'full_name' => 'required'
        ];

        if (! $this->validate($rules)) {
            return redirect()->back()
                ->withInput()
                ->with('errors', $this->validator->getErrors());
        }

        $data = [
            'username'  => $this->request->getPost('username'),
            'full_name' => $this->request->getPost('full_name')
        ];

        $file = $this->request->getFile('avatar');

        if ($file && $file->isValid() && ! $file->hasMoved()) {
            $fileRules = [
                'avatar' => 'uploaded[avatar]|is_image[avatar]|mime_in[avatar,image/jpg,image/jpeg,image/png]|max_size[avatar,2048]'
            ];

            if (! $this->validate($fileRules)) {
                return redirect()->back()
                    ->withInput()
                    ->with('errors', $this->validator->getErrors());
            }

            $newName = $file->getRandomName();
            $uploadPath = FCPATH . 'uploads/avatars/';

            $file->move($uploadPath, $newName);

            \Config\Services::image()
                ->withFile($uploadPath . $newName)
                ->fit(150, 150, 'center')
                ->save($uploadPath . $newName);

            $data['avatar'] = $newName;
        }

        $model->update($id, $data);

        return redirect()->to('/users');
    }
}