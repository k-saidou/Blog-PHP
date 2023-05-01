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

        // On envoie les données à la vue lire
        $this->twig->display('users/index.html.twig', compact('users'));
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


        if(isset($_POST['submit'])){
            $firstname = $_POST['firstname'];
            $lastname = $_POST['lastname'];
            $email = $_POST['email'];
            $password = $_POST['password'];
         
        }else{
            $this->twig->display('users/new.html.twig');
        }
        $this->loadModel('user');
        $user = $this->user->create($firstname, $lastname, $email, $password);
        header("Location: /login/connect");

    }

        // TODO PROBLEME AFFICHAGE POST
        public function update($id){
            $this->loadModel('User');
            $user = $this->User->findById($id);
    
            if(isset($_POST['submit'])){
                $firstname = $_POST['firstname'];
                $lastname = $_POST['lastname'];
                $email = $_POST['email'];
                $password = $_POST['password'];
            $user = $this->User->update($firstname,$lastname,$email,$password,$id);   
            header("Location: /users/index");
     
            }else{
                $user = $this->User->findById($id);
                $this->twig->display('users/update.html.twig', compact('user'));   
    
            }              
    
        }


    public function delete($id){
        $this->loadModel('user');
        $user = $this->user->deleteUser($id);
        header("Location: /users/read");
    }
    
}