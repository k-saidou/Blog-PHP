<?php 


class Posts extends AbstractController{

    /**
     * Cette méthode affiche tout les posts
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
     * Cette méthode affiche la liste des posts
     *
     * @return void
     */
    public function read(){

        // On verifie si il y a un message flash
        if(isset($_SESSION['message'])){
            // On affiche le message    
                $message = $_SESSION['message'];
            // On supprime le message si la page est actualisé
                unset($_SESSION['message']);
            }else{
                $message = "";
            }
            
        $this->loadModel('Post');
        if($_SESSION['role'] == 'ADMIN'){
            $posts = $this->Post->getAll();
        }else{
            $id_user = $_SESSION['id'];
            $posts = $this->Post->AllByUser($id_user);
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

        $message = "";
        // On verifie si il y a un message flash
        if(isset($_SESSION['message'])){
            // On affiche le message    
                $message = $_SESSION['message'];
            // On supprime le message si la page est actualisé
                unset($_SESSION['message']);
            }else{
                $message = "";
            }        
            
        $this->loadModel('Post');
        $post = $this->Post->findById($id);
        $this->loadModel('Comment');
        $comments = $this->Comment->showComment($id);

        if(isset($this->POST['submit'], $this->POST['content'])){
            if(!empty($this->POST['content'])){
                $content = $this->POST['content'];
                $id_user = $_SESSION['id']; 
                $id_post = $id;      
                
                $this->loadModel('comment');
                $comment = $this->comment->create($content, $id_user, $id_post);
                if($comment !== false){
                    $_SESSION['message'] = 'Votre Commentaire a bien été transmis, un admin le validera prochainement';
                    $this->twig->display('posts/show.html.twig', compact('post','comments','message'));
                }else{
                    $error = "Une erreur est survenue, veuillez reessayer.";
                    $this->twig->display('posts/show.html.twig', compact('post','comments','error'));
                    }   
            }else{
                $this->twig->display('posts/show.html.twig', compact('post','comments','message'));
            }
        }else{
            $this->twig->display('posts/show.html.twig', compact('post','comments'));
        }
    }

    /**
     * Cette méthode permet de modifier un post
     *
     * @return void
     */
    public function update($id){
        $message = "";
        if(isset($_SESSION['id']) && $_SESSION['id'] != NULL){

            $this->loadModel('Post');
            $post = $this->Post->findById($id);

            if(isset($this->POST['submit'])){
                $titre = $this->POST['titre'];
                $chapo = $this->POST['chapo'];
                $contenu = $this->POST['content'];
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


    
    /**
     * Cette méthode permet de créer un post
     *
     * @return void
     */
    public function new(){

        $message = "";
        if(isset($_SESSION['id']) && $_SESSION['id'] != NULL){

            if(isset($this->POST['submit'])){
            $titre = $this->POST['titre'];
            $chapo = $this->POST['chapo'];
            $contenu = $this->POST['contenu'];
            $id_user = $_SESSION['id'];
            
            $this->loadModel('Post');
            $post = $this->Post->create($titre, $chapo, $contenu, $id_user);
                if($post !== false){
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
  
    
    /**
     * Cette méthode permet de supprimer un post
     *
     * @return void
     */   
    public function delete($id){
        $this->loadModel('Post');
        $post = $this->Post->deletePost($id);
        if($post !== false){
            $_SESSION['message'] = 'Votre Post a bien été supprimer';
        }
        header("Location: /posts/read");
    }
}