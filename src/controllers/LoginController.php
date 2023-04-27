<?php 


class Login extends AbstractController{

    public function log(){

        if(isset($_POST['submit'])){
            $email = $_POST['email'];
            $password = $_POST['password'];
            }else{
                $this->twig->display('login/connect.html.twig');
                }            
                var_dump($_POST);
                $_SESSION['email'] = $email;
                $_SESSION['password'] = $password;

                var_dump($_SESSION);
                $this->loadModel('Logins');
                $login = $this->Logins->connexion($email, $password);
              //  header("Location: /");               
    }

    public function logout(){
        session_destroy();  
        header("Location: /");

    }

}