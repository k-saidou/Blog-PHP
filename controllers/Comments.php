<?php 

class Comments extends AbstractController{

    /**
     * Cette méthode affiche la liste des posts
     *
     * @return void
     */
    public function index(){
        // On instancie le modèle "Comment"
        $this->loadModel('Comment');

        // On stocke la liste des Comment dans $comments
        $comments = $this->Post->getAll();

        // On envoie les données à la vue lire
        $this->twig->display('comments/index.html.twig', compact('comments'));
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

    public function update($id){
        $this->loadModel('post');
        $post = $this->post->update($id);                  
        $this->twig->display('posts/update.html.twig');

    }
    
}