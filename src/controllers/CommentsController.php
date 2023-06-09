<?php 

class Comments extends AbstractController{

    /**
     * Cette méthode affiche la liste des comments
     *
     * @return void
     */
    public function index(){

        if(isset($_SESSION['message'])){
            $message = $_SESSION['message'];
        }else{
            $message = "";
        }
        if(isset($_SESSION['info'])){
            $info = $_SESSION['info'];
        }else{
            $info = "";
        }
        
        // On instancie le modèle "Comment"
        $this->loadModel('Comment');

        if($_SESSION['role'] == 'ADMIN'){
            $comments = $this->Comment->getAll();
        }else{
            $id_user = $_SESSION['id'];
            $comments[] = $this->Comment->AllByUser($id_user);
        }

        // On stocke la liste des Comment dans $comments

        // On envoie les données à la vue lire
        $this->twig->display('comments/index.html.twig', compact('comments','message','info'));
        
        } 


    /**
     * Méthode permettant d'afficher un post à partir de son id
     *
     * @param int $id
     * @return void
     */
    public function show($id){

        $this->loadModel('Comment');
        $comment = $this->Comment->findById($id);
        $this->twig->display('comments/show.html.twig', compact('comment'));

    }

    public function delete($id){
        $message = "";
        $this->loadModel('comment');
        $comment = $this->comment->deleteCom($id);
        if($comment !== false){
            $_SESSION['message'] = 'Votre commentaire a bien été supprimer';
        }
        header("Location: /comments/index");
    }


        public function update($id){

            $info = "";

            if(isset($_SESSION['id']) && $_SESSION['id'] != NULL){

            $this->loadModel('Comment');
            $comment = $this->Comment->findById($id);

            if(isset($_POST['submit'])){
                $content = $_POST['content'];
                $comment = $this->Comment->update($content,$id); 
                if($post !== false){
                    $_SESSION['info'] = 'Votre Commentaire a bien été Modifié, un admin le validera prochainement';
                }          
                header("Location: /comments/index");
            }else{
                $error = "Une erreur est survenue";
                $this->twig->display('comments/update.html.twig', compact('comment','info','error'));   
    
            }             
        }else{
            header("Location: /login/log");
    
        } 
    
        }   

        public function updateCom($id){

            if(isset($_SESSION['id']) && $_SESSION['id'] != NULL){

                $this->loadModel('Comment');
                $comment = $this->Comment->findById($id);

                if($comment != false){
                    $comment = $this->Comment->updateStatut($id);

                }

                    header("Location: /comments/index");
               
            }else{
                header("Location: /comments/index");
    
            }         
        }
}