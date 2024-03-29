<?php 


class Login extends AbstractController{


    /**
     * Cette méthode permet de se connecter
     *
     * @return void
     */
    public function log(){

        $message = "";

        if(isset($_SESSION['message'])){
            $message = $_SESSION['message'];
            unset($_SESSION['message']);
        }else{
            $message = "";
        }

        if(!isset($_SESSION['id']) && (!isset($_SESSION['role']))) {

            if(isset($this->POST['submit'])){
                $email = $this->POST['email'];
                $password = $this->POST['password'];
                
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
    
    /**
     * Cette méthode permet la déconnexion
     *
     * @return void
     */
    public function logout(){
        session_destroy();  
        header("Location: /");
    }
}