<?php 


class Home extends AbstractController{

    public function index(){
        $info = "";

        // On verifie si il y a un message flash
        if(isset($_SESSION['message'])){
            // On affiche le message    
            $message = $_SESSION['message'];
            // On supprime le message si la page est actualisé
            unset($_SESSION['message']);
        }else{
            $message = "";
        }
        if(isset($_SESSION['info'])){
            $info = $_SESSION['info'];
            unset($_SESSION['info']);
        }else{
            $info = "";
        }
        // On instancie le modèle "Post"
        $this->loadModel('Post');
        // On stocke la liste des 4 derniers Post dans $posts
        $posts = $this->Post->getLast();

        // On envoie les données à la vue 
        $this->twig->display('home/index.html.twig', compact('posts', 'message','info'));

        if(isset($_POST['submit'], $_POST['name'], $_POST['email'], $_POST['phoneNumber'], $_POST['message'])){
            if(!empty($_POST['name'])&& !empty($_POST['email']) && !empty($_POST['phoneNumber']) && !empty($_POST['message'])){
        
                $name = $_POST['name'];            
                $email = $_POST['email'];
                $phoneNumber = $_POST['phoneNumber'];
                $message = $_POST['message'];

                $this->loadModel('contact');
                $contact = $this->contact->create($name, $email, $phoneNumber, $message);
                if($contact !== false){
                    $_SESSION['info'] = 'Votre message a bien été transmis';
                }
            }else{
                $error = "Une erreur est survenue, Veuillez réessayer ultérieurement.";
                $this->twig->display('home/index.html.twig', compact('posts','error'));
            }
        }
    }
}