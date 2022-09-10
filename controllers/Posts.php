<?php 

class Posts extends AbstractController{

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

    
    // TODO controller non fonctionnel 
    public function new(){


        if(isset($_POST['submit'])){
            $titre = $_POST['titre'];
            $chapo = $_POST['chapo'];
            $contenu = $_POST['contenu'];
           /* $creationTime = $_POST['creationTime'];
            $updateTime = $_POST['updateTime'];
            $id_user = $_POST['iduser'];*/
        }else{
            $this->twig->display('posts/new.html.twig');
        }
        $this->loadModel('post');
        $post = $this->post->create($titre, $chapo, $contenu);
        return $this->twig->display('posts/new.html.twig');
    }
    
}