<?php

namespace App\Controllers;

class Controller
{

    public function index()
    {
        echo 'je suis la homepage';
    }

    public function show(int $id)
    {
        echo 'je suis le post' . $id;
    }
}