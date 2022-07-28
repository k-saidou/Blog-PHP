<?php 

class Home extends AbstractController{

    public function index(){
                // On instancie le modèle "Post"
                $this->loadModel('Post');

                // On stocke la liste des posts dans $posts
                $posts = $this->Post->getLast();
        
                $this->twig->display('home/index.html.twig', compact('posts'));
                }
 
}