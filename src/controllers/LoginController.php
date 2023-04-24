<?php 


class Login extends AbstractController{

    public function log(){



        if(isset($_POST['submit'])){
            $email = $_POST['Email'];
            $password = $_POST['Password'];
            var_dump($_POST);

            $this->loadModel('Logins');
            $user = $this->Logins->connexion($email, $password);
            if(is_array($user)){
                $_SESSION["userId"]=$user["id"];
                header("Location: /");               
    
            }else{
                $this->twig->display('login/connect.html.twig');

            }

        }
        else{
            $this->twig->display('login/connect.html.twig');

        }
     }
 
}