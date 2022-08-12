<?php 
namespace Src\controllers;

use App\AbstractController;
use Src\Entity\Post;

class PostsController extends AbstractController{

    /**
     * Cette méthode affiche la liste des posts
     *
     * @return void
     */
    public function index(){
        // On instancie le modèle "Post"
        $this->loadModel('Post');

        // On stocke la liste des posts dans $posts
        $posts = $this->Post->getAll();

        // On envoie les données à la vue lire
        $this->twig->display('posts/index.html.twig', compact('posts'));
        }

    /**
     * Méthode permettant d'afficher un post à partir de son id
     *
     * @param int $id
     * @return void
     */
    public function show(string $id){

        $this->loadModel('Post');
        $post = $this->Post->findById($id);
        $this->twig->display('posts/show.html.twig', compact('post'));
    }

    public function read(){
        $this->loadModel('Post');
        $posts = $this->Post->getAll();
        $this->twig->display('posts/read.html.twig', compact('posts'));
    }

    public function delete($id){
        $this->loadModel('post');
        $post = $this->post->deletePost($id);
        $this->twig->display('posts/index.html.twig');
    }

    public function new($titre, $chapo, $contenu){
        $this->loadModel('post');
        $post = $this->post->create($titre, $chapo, $contenu);                  
        return $this->twig->display('posts/new.html.twig', compact('post'));

    }

    public function update($id){
        $this->loadModel('post');
        $post = $this->post->update($id);                  
        $this->twig->display('posts/update.html.twig');

    }

}
