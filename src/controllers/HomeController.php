<?php 


class Home extends AbstractController{

    public function index(){

                // On instancie le modèle "Article"
                $this->loadModel('Post');

                // On stocke la liste des articles dans $articles
                $posts = $this->Post->getLast();
        
                $this->twig->display('home/index.html.twig', compact('posts'));
                }
 
}