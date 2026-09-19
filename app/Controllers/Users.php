<?php

namespace App\Controllers;

use App\Models\UserModel;

class Users extends BaseController
{
    public function index()
    {
        $model = new UserModel();
        $users = $model->findAll();

        return view('users', [
            'users' => $users
        ]);
    }
}