<?php

class Users extends AbstractController{

    /**
     * Cette méthode affiche la liste des Users
     *
     * @return void
     */
    public function index(){
        // On instancie le modèle "User"
        $this->loadModel('User');

        // On stocke la liste des users dans $Users
        $users = $this->User->getAll();
        if(isset($_SESSION['message'])){
            $message = $_SESSION['message'];
        }else{
            $message = "";
        }

        // On envoie les données à la vue lire
        $this->twig->display('users/index.html.twig', compact('users','message'));
        }

        public function show($id){
            $this->loadModel('User');
            $user = $this->User->findByID($id);
            $this->twig->display('users/show.html.twig', compact('user'));
        }

        public function login(){
            $this->loadModel('User');
            $users = $this->User->getAll();
            $this->twig->display('users/login.html.twig', compact('users'));
        }

    
    // TODO controller non fonctionnel 
    public function new(){

        $message = "";

        if(isset($_POST['submit'])){
            $firstname = $_POST['firstname'];
            $lastname = $_POST['lastname'];
            $email = $_POST['email'];
            $password = password_hash($_POST['password'], PASSWORD_DEFAULT, ['cost' => 12]);

            $this->loadModel('user');
            $user = $this->user->create($firstname, $lastname, $email, $password);
            if($user !== false){
                $_SESSION['message'] = 'Votre compte à été créer';
            }
            header("Location: /login/log");    
        }else{
            $error = "Veuillez Remplir Tous Les Champs";

            $this->twig->display('users/new.html.twig', compact('message','error'));
        }
    }


        // TODO PROBLEME AFFICHAGE POST
        public function update($id){

            $message = "";

            if(isset($_SESSION['message'])){
                $message = $_SESSION['message'];
            }else{
                $message = "";
            }
            $this->loadModel('User');
            $user = $this->User->findById($id);
    
            if(isset($_POST['submit'])){
                $firstname = $_POST['firstname'];
                $lastname = $_POST['lastname'];
                $email = $_POST['email'];
                $password = $_POST['password'];
            $user = $this->User->update($firstname,$lastname,$email,$password,$id);   
            if($user !== false){
                $_SESSION['message'] = 'Modifier avec succès';
            }
            header("Location: /users/index");
     
            }else{
                $error = "Une erreur est survenue. Veuillez remplir tous les champs";
                $user = $this->User->findById($id);
                $this->twig->display('users/update.html.twig', compact('user','message','error'));   
    
            }              
    
        }


    public function delete($id){

        $message = "";
        $this->loadModel('user');
        $user = $this->user->deleteUser($id);
        if($user !== false){
            $_SESSION['message'] = 'Supprimer avec succès';
        }
        header("Location: /users/index");
    }
    
}