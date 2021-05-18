<?php

namespace App\Controllers;

class HomeController
{
    public function index()
    {
        echo "hello from index";
    }

    public function profile()
    {
        echo "Hello from profile page";
    }

    public function user($name)
    {
        echo "Hola {$name}";
    }
}