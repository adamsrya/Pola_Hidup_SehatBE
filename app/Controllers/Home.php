<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function index()
    {
        $data = [
            'title' => 'Dashboard'
        ];

        return view('dashboard', $data);
    }
    public function login()
    {
        $data = [
            'title' => 'Login',
            'validation' => \Config\Services::validation()
            

        ];
        

        return view('login', $data);
    }
   
}
