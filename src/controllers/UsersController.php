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

        public function read(){
            $this->loadModel('User');
            $users = $this->User->getAll();
            $this->twig->display('users/read.html.twig', compact('users'));
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
        header("Location: /users/read");

    }


    public function delete($id){
        $this->loadModel('user');
        $user = $this->user->deleteUser($id);
        header("Location: /users/read");
    }
    
}