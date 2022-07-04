<?php

namespace App\Controller;

use Core\Controller\Controller;

class CommentsController extends AppController{

    public function __construct(){
        parent::__construct();
        $this->loadModel('Comment');

    }

    public function index(){
        $comments = $this->Comment->all();
        $this->render('comments.index', compact('comments'));
    }
}