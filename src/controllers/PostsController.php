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
        if(isset($_SESSION['message'])){
            $message = $_SESSION['message'];
        }else{
            $message = "";
        }
        $this->twig->display('posts/read.html.twig', compact('posts','message'));
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
        $this->loadModel('Comment');
        $comments = $this->Comment->showComment($id);


            if(isset($_POST['submit'])){
                $content = $_POST['content'];
                $id_user = $_SESSION['id']; 
                $id_post = $id;      
                
                $this->loadModel('comment');
                $comment = $this->comment->create($content, $id_user, $id_post);
               
            }
           
    
        $this->twig->display('posts/show.html.twig', compact('post','comments'));

    }

    // TODO PROBLEME AFFICHAGE POST
    public function update($id){
        $message = "";
        if(isset($_SESSION['id']) && $_SESSION['id'] != NULL){

        
        $this->loadModel('Post');
        $post = $this->Post->findById($id);

        if(isset($_POST['submit'])){
            $titre = $_POST['titre'];
            $chapo = $_POST['chapo'];
            $contenu = $_POST['content'];
        $post = $this->Post->update($titre,$chapo,$contenu,$id);  
        if($post !== false){
            $_SESSION['message'] = 'Votre Post a bien été Modifié';
        }
        header("Location: /posts/read");
 
        }else{
            $error = "Une erreur est survenue";
            $this->twig->display('posts/update.html.twig', compact('post','message','error'));   

        }              
    }else{
        header("Location: /login/log");

    }
    }


    
    // TODO fonctionnel, MANQUE DATE ET ID
    public function new(){
        $message = "";
        
        if(isset($_SESSION['id']) && $_SESSION['id'] != NULL){

            if(isset($_POST['submit'])){
            $titre = $_POST['titre'];
            $chapo = $_POST['chapo'];
            $contenu = $_POST['contenu'];
            $id_user = $_SESSION['id'];
            
            $this->loadModel('Post');
            $post = $this->Post->create($titre, $chapo, $contenu, $id_user);
                if($post != false){
                $_SESSION['message'] = 'Votre Post a bien été créer';
                header("Location: /posts/read");
                }else{
                $error = "Veuillez remplir tous les champs.";
                $this->twig->display('posts/new.html.twig', compact('message','error'));
                    }
                }else{
                    $this->twig->display('posts/new.html.twig');
                }
            }else{
            header("Location: /login/log");
                }
        }
  
    
    // FONCTIONNEL 
    public function delete($id){
        $this->loadModel('Post');
        $post = $this->Post->deletePost($id);
        if($post !== false){
            $_SESSION['message'] = 'Votre Post a bien été supprimer';
        }
        header("Location: /posts/read");
    }
    
}