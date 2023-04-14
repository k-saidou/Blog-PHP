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
    public function show(string $id){

        $this->loadModel('Post');
        $post = $this->Post->findById($id);
        $this->twig->display('posts/show.html.twig', compact('post'));

        if(isset($_POST['submit'])){
            $content = $_POST['content'];
           /* $chapo = $_POST['chapo'];
            $contenu = $_POST['contenu'];
            $creationTime = $_POST['creationTime'];
            $updateTime = $_POST['updateTime'];
            $id_user = $_POST['iduser'];*/        
            
            $this->loadModel('Comment');
            $comment = $this->comment->create($content);
        }else{
            $this->twig->display('comments/new.html.twig');
        }

    }

    public function showw(string $id){

        $this->loadModel('Comment');
        $comment = $this->Comment->findById($id);
        $this->twig->display('posts/show.html.twig', compact('comment'));
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
        $this->loadModel('Post');
        $post = $this->Post->create($titre, $chapo, $contenu);
        header("Location: /posts/read");

       // return $this->twig->display('posts/new.html.twig');
    }

    public function update($id){
        $this->loadModel('Post');
        var_dump($_POST);

        if(isset($_POST['submit'])){
            $titre = $_POST['titre'];
            $chapo = $_POST['chapo'];
            $contenu = $_POST['content'];
        $post = $this->Post->update($titre,$chapo,$contenu);   
        header("Location: /posts/read");
 
        }else{
            $post = $this->Post->findById($id);
            $this->twig->display('posts/update.html.twig', compact('post'));   

        }              

    }

    public function delete($id){
        $this->loadModel('Post');
        $post = $this->Post->deletePost($id);
        header("Location: /posts/read");
       // $this->twig->display('posts/read.html.twig');
    }
    
}