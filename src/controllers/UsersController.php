<?php


class Users extends AbstractController{
    

    /**
     * Cette méthode affiche la liste des Users
     *
     * @return void
     */
    public function index(){
        // On verifie si il y a un message flash
        if(isset($_SESSION['message'])){
        // On affiche le message    
            $message = ['message'];
        // On supprime le message si la page est actualisé
            unset($_SESSION['message']);
        }else{
            $message = "";
        }
        // On instancie le modèle "User"
        $this->loadModel('User');
        
        if($_SESSION['role'] == 'ADMIN'){
            // On stocke la liste des users dans $Users
            $users = $this->User->getAll();
        }else{
            $id = $_SESSION['id'];
            $users[] = $this->User->findById($id);
        }
        // On envoie les données à la vue 
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

    public function new(){

        $message = "";
        if(isset($this->POST['submit'], $this->POST['firstname'], $this->POST['lastname'], $this->POST['email'], $this->POST['password'])){
            if(!empty($this->POST['firstname']) && !empty($this->POST['lastname']) && !empty($this->POST['email']) && !empty($this->POST['password'])){
                        $firstname = $this->POST['firstname'];
                $lastname = $this->POST['lastname'];
                $email = $this->POST['email'];
                $password = password_hash($this->POST['password'], PASSWORD_DEFAULT, ['cost' => 12]);

                $this->loadModel('user');
                $user = $this->user->create($firstname, $lastname, $email, $password);
                if($user != false){
                    $_SESSION['message'] = 'Votre compte à été créer';
                }
                header("Location: /login/log");    
            }else{
                $error = "Veuillez Remplir Tous Les Champs";
                $this->twig->display('users/new.html.twig', compact('message','error'));
                }
        }else{
            $this->twig->display('users/new.html.twig', compact('message'));
            }
    }

    public function update($id){

        $message = "";
        if(isset($_SESSION['message'])){
            $message = $_SESSION['message'];
        }else{
            $message = "";
            }

        $this->loadModel('User');
        $user = $this->User->findById($id);

        if(isset($this->POST['submit'])){
            $firstname = $this->POST['firstname'];
            $lastname = $this->POST['lastname'];
            $email = $this->POST['email'];
            $password = password_hash($this->POST['password'], PASSWORD_DEFAULT, ['cost' => 12]);
            $user = $this->User->update($firstname,$lastname,$email,$password,$id);  

            if($user != true){
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

        $this->loadModel('user');
        $user = $this->user->deleteUser($id);
        if($user !== false){
            $_SESSION['message'] = 'Supprimer avec succès';
        }
        header("Location: /users/index");
    }
}