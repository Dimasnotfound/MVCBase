<?php

namespace App\Controllers;

class HomeController
{
    public function index()
    {
        return view('home', ['name' => 'MVC Base']);
    }

    public function about()
    {
        return view('about', ['company' => 'MVC Base Framework']);
    }
}
