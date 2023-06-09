<?php 


class Login extends AbstractController{

    public function log(){

        $message = "";

        if(isset($_SESSION['message'])){
            $message = $_SESSION['message'];
        }else{
            $message = "";
        }

        if(!isset($_SESSION['id']) && (!isset($_SESSION['role']))) {

        if(isset($_POST['submit'])){
            $email = $_POST['email'];
            $password = $_POST['password'];
            
            $this->loadModel('Logins');
            $login = $this->Logins->connexion($email, $password);
            if($login != false){
                $_SESSION['message'] = 'Connecté avec succès';
                header("Location: /");               
            }else{
                $error = "Email et/ou Mot De Passe incorrect";

                $this->twig->display('login/connect.html.twig', compact('message','error'));
            }

            }else{
                $this->twig->display('login/connect.html.twig', compact('message'));

                }         
            }else{
                header("Location: /");               

            } 
    }

    public function logout(){
        session_destroy();  
        header("Location: /");

    }

}