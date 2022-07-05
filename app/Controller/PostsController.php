<?php

namespace App\Controller;

use Core\Controller\Controller;

class PostsController extends AppController{

    public function __construct(){
        parent::__construct();
        $this->loadModel('Post');

    }

    public function index(){
        $posts = $this->Post->all();
        $this->render('posts.index', compact('posts'));
    }

    public function show(){
        $posts = $this->Post->all();
        $this->render('posts.show', compact('posts'));
    }

}