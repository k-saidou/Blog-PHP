<?php 

class Posts extends Controller{

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
}