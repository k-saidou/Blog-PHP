<?php 

class Posts extends Controller{

/**
 * Cette méthode affiche la liste des articles
 *
 * @return void
 */
public function index(){
    // On instancie le modèle "Article"
    $this->loadModel('Post');

    // On stocke la liste des articles dans $articles
    $posts = $this->Post->getAll();

    $this->render('index', compact('posts'));
}
}