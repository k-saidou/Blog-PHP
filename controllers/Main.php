<?php 

class Main extends Controller{
    public function index(){
                // On instancie le modèle "Article"
                $this->loadModel('Post');

                // On stocke la liste des articles dans $articles
                $posts = $this->Post->getAll();
        
                $this->twig->display('main/index.html.twig', compact('posts'));
                }
 
}