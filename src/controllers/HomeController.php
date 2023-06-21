<?php 


class Home extends AbstractController{

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

       // $info = "";

        // On verifie si il y a un message flash
        if(isset($_SESSION['info'])){
            // On affiche le message    
            $info = $_SESSION['info'];
            // On supprime le message si la page est actualisé
            unset($_SESSION['info']);
        }else{
            $info = "";
        }

        // On instancie le modèle "Post"
        $this->loadModel('Post');
        // On stocke la liste des 4 derniers Post dans $posts
        $posts = $this->Post->getLast();

        if(isset($this->POST['submit'], $this->POST['name'], $this->POST['email'], $this->POST['phoneNumber'], $this->POST['message'])){
            if(!empty($this->POST['name'])&& !empty($this->POST['email']) && !empty($this->POST['phoneNumber']) && !empty($this->POST['message'])){
        
                $name = $this->POST['name'];            
                $email = $this->POST['email'];
                $phoneNumber = $this->POST['phoneNumber'];
                $message = $this->POST['message'];

                $this->loadModel('contact');
                $contact = $this->contact->create($name, $email, $phoneNumber, $message);
                if($contact !== false){
                    $_SESSION['info'] = 'Votre message a bien été transmis';
                    header("location: /");
                }else{
                $error = "Une erreur est survenue, Veuillez réessayer ultérieurement.";
                $this->twig->display('home/index.html.twig', compact('posts','error','message','info'));
                }
            }else{
                // On envoie les données à la vue 
                $this->twig->display('home/index.html.twig', compact('posts', 'message','info'));
            }
        }else{
            // On envoie les données à la vue 
            $this->twig->display('home/index.html.twig', compact('posts', 'message','info'));
        }
    }
}