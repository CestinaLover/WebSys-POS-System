<?php

namespace App\Controllers;

class Customers extends BaseController
{
    public function index()
    {
        $customers = [
            [
                'full_name' => 'Joshua Concepcion',
                'email' => 'joshuapagong@gmail.com',
                'phone' => '09171254567'
            ],
            [
                'full_name' => 'Gian Saba',
                'email' => 'Ginaloves@gmail.com',
                'phone' => '09181674567'
            ],
            [
                'full_name' => 'Jim Hernandez',
                'email' => 'Jimmy@gmail.com',
                'phone' => '09191226567'
            ],
            [
                'full_name' => 'Andrei Dulguime',
                'email' => 'Dulgyme@gmail.com',
                'phone' => '09201994567'
            ],
            [
                'full_name' => 'Daniella Haro',
                'email' => 'HaroHaro@gmail.com',
                'phone' => '09207234567'
            ]
        ];

        return view('Customers', [
            'customers' => $customers
        ]);
    }
}