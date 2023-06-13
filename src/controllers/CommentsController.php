<?php 

class Comments extends AbstractController{

    /**
     * Cette méthode affiche la liste des comments
     *
     * @return void
     */
    public function index(){

        // On verifie si il y a un message flash
        if(isset($_SESSION['message'])){
            // On affiche le message    
            $message = $_SESSION['message'];
            // On supprime le message si la page est actualisé
            unset($_SESSION['message']);
        }else{
            $message = "";
        }
        
        // On instancie le modèle "Comment"
        $this->loadModel('Comment');

        if($_SESSION['role'] == 'ADMIN'){
            // On stocke la liste des Comment dans $comments
            $comments = $this->Comment->getAll();
        }else{
            $id_user = $_SESSION['id'];
            $comments = $this->Comment->AllByUser($id_user);
        }
        // On envoie les données à la vue lire
        $this->twig->display('comments/index.html.twig', compact('comments','message'));
    } 


    /**
     * Méthode permettant d'afficher un commentaire à partir de son id
     *
     * @param int $id
     * @return void
     */
    public function show($id){

        $this->loadModel('Comment');
        $comment = $this->Comment->findById($id);
        $this->twig->display('comments/show.html.twig', compact('comment'));
    }

    /**
     * Méthode permettant de supprimer un commentaire à partir de son id
     *
     * @param int $id
     * @return void
     */
    public function delete($id){
        $this->loadModel('comment');
        $comment = $this->comment->deleteCom($id);
        if($comment !== false){
            $_SESSION['message'] = 'Votre commentaire a bien été supprimer';
        }
        header("Location: /comments/index");
    }

    /**
     * Méthode permettant de modifier un commentaire à partir de son id
     *
     * @param int $id
     * @return void
     */
    public function update($id){

        $message = "";

        if(isset($_SESSION['id']) && $_SESSION['id'] != NULL){
            $this->loadModel('Comment');
            $comment = $this->Comment->findById($id);

            if(isset($this->POST['submit'])){
                $content = $this->POST['content'];
                $comment = $this->Comment->update($content,$id); 
                if($comment !== false){
                    $_SESSION['message'] = 'Votre Commentaire a bien été Modifié, un admin le validera prochainement';
                }          
                header("Location: /comments/index");
            }else{
                $error = "Une erreur est survenue, veuillez réessayer ultérieurement.";
                $this->twig->display('comments/update.html.twig', compact('comment','message','error'));   
            }             
        }else{
            header("Location: /login/log");
        } 
    }   

    /**
     * Méthode permettant de modifier le statut d'un commentaire à partir de son id
     *
     * @param int $id
     * @return void
     */
    public function updateCom($id){


        if(isset($_SESSION['id']) && $_SESSION['id'] != NULL){
            $this->loadModel('Comment');
            $comment = $this->Comment->findById($id);
            if($comment != false){
                $comment = $this->Comment->updateStatut($id);
            }
            if($comment !== false){
                $_SESSION['message'] = 'Commentaire validé.';
            }          
            header("Location: /comments/index");   
        }else{
            header("Location: /comments/index");
        }         
    }
}