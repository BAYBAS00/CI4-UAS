<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function index()
    {
        if (!session()->get('username')) {
            return redirect()->route('Login::index');
        }

        $data = [
            'title' => 'Dashboard'
        ];
        return view('home', $data);
    }
}
