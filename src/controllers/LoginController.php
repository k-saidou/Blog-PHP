<?php 


class Login extends AbstractController{

    public function log(){
        if(!isset($_SESSION['id'])){

        if(isset($_POST['submit'])){
            $email = $_POST['email'];
            $password = $_POST['password'];

            var_dump($_POST);
            
            $this->loadModel('Logins');
            $login = $this->Logins->connexion($email, $password);
            header("Location: /");               

            }else{
                $this->twig->display('login/connect.html.twig');
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