<?php 
namespace App\controllers;

use Core\AbstractController;

class CommentsController extends AbstractController{

    /**
     * Cette méthode affiche la liste des comments
     *
     * @return void
     */
    public function index(){
        // On instancie le modèle "comment"
        $this->loadModel('Comment');

        // On stocke la liste des comments dans $comments
        $comments = $this->Comment->getAll();

        // On envoie les données à la vue lire
        $this->twig->display('comment/index.html.twig', compact('comments'));
        }

    /**
     * Méthode permettant d'afficher un commentaire à partir de son id
     *
     * @param int $id
     * @return void
     */
    public function show(string $id){

        $this->loadModel('Comment');
        $comment = $this->comment->findById($id);
        $this->twig->display('comment/show.html.twig', compact('comment'));
    }

    public function delete($id){
        $this->loadModel('Comment');
        $comment = $this->comment->deleteComment($id);
        $this->twig->display('comment/index.html.twig');
    }

    // TODO controller non fonctionnel 
    public function new(){


        if(isset($_comment['submit'])){
            $content = $_comment['content'];
        }else{
            $this->twig->display('comment/new.html.twig');
        }
        $this->loadModel('Comment');
        $comment = $this->comment->create($content);
        return $this->twig->display('comment/read.html.twig');
    }
    
/*
    public function update($id){
        $this->loadModel('comment');
        $comment = $this->comment->update($id);                  
        $this->twig->display('comment/update.html.twig');

    }*/


}
