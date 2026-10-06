<?php

namespace App\Controllers;

use App\Models\UserModel;

class Auth extends BaseController
{
    public function login()
    {
        if (session()->get('isLoggedIn')) {
            return redirect()->to('/customers');
        }

        return view('login');
    }

    public function attempt()
    {
        $username = $this->request->getPost('username');
        $password = $this->request->getPost('password');

        $model = new UserModel();

        $user = $model->where('username', $username)->first();

        if (!$user || !password_verify($password, $user['password'])) {
            return redirect()->back()
                ->withInput()
                ->with('error', 'Invalid username or password.');
        }

        session()->set([
            'user_id' => $user['id'],
            'username' => $user['username'],
            'isLoggedIn' => true
        ]);

        return redirect()->to('/customers');
    }

public function logout()
{
    session()->remove([
        'user_id',
        'username',
        'isLoggedIn'
    ]);

    return redirect()->to('/');
}
}