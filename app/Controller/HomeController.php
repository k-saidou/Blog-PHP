<?php

namespace App\Controller;

use Core\Controller\Controller;

class HomeController extends AppController{

    public function __construct(){
        parent::__construct();
        $this->loadModel('Post');

    }

    public function home(){
        $posts = $this->Post->all();
        $this->render('home.index', compact('posts'));
    }

}