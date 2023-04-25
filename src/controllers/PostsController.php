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

        // TODO FONCTIONNEL
    public function read(){
        $this->loadModel('Post');
        $posts = $this->Post->getAll();
        $this->twig->display('posts/read.html.twig', compact('posts'));
    }

    /**
     * Méthode permettant d'afficher un post à partir de son id
     *
     * @param int $id
     * @return void
     */
    public function show($id){

        $this->loadModel('Post');
        $post = $this->Post->findById($id);
        $this->twig->display('posts/show.html.twig', compact('post'));

    }

    
    // TODO PROBLEME AFFICHAGE POST
    public function update($id){
        $this->loadModel('Post');
        $post = $this->Post->findById($id);

        if(isset($_POST['submit'])){
            $titre = $_POST['titre'];
            $chapo = $_POST['chapo'];
            $contenu = $_POST['content'];
        $post = $this->Post->update($titre,$chapo,$contenu,$id);   
        header("Location: /posts/read");
 
        }else{
            $post = $this->Post->findById($id);
            $this->twig->display('posts/update.html.twig', compact('post'));   

        }              

    }


    
    // TODO fonctionnel, MANQUE DATE ET ID
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
        $this->loadModel('Post');
        $post = $this->Post->create($titre, $chapo, $contenu);
        header("Location: /posts/read");

       // return $this->twig->display('posts/new.html.twig');
    }
  
    
    // FONCTIONNEL 
    public function delete($id){
        $this->loadModel('Post');
        $post = $this->Post->deletePost($id);
        header("Location: /posts/read");
    }
    
}