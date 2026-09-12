<?php

namespace App\Controllers;

class Users extends BaseController
{
    public function index()
    {
        $users = [
            [
                'username' => 'JoshuaTurtle',
                'full_name' => 'Joshua Concepcion',
                'role' => 'Administrator'
            ],
            [
                'username' => 'GinaStick',
                'full_name' => 'Gian Saba',
                'role' => 'Cashier'
            ],
            [
                'username' => 'JimmyHenny',
                'full_name' => 'Jim Hernandez',
                'role' => 'Cashier'
            ],
            [
                'username' => 'Andwei',
                'full_name' => 'Andrei Dulguime',
                'role' => 'Manager'
            ],
            [
                'username' => 'Nyellies',
                'full_name' => 'Daniella Haro',
                'role' => 'Staff'
            ]
        ];

        return view('Users', [
            'users' => $users
        ]);
    }
}