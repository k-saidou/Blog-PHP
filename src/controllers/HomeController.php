<?php 


class Home extends AbstractController{

    public function index(){
        $this->loadModel('Post');
        $posts = $this->Post->getLast();
        if(isset($_SESSION['message'])){
            $message = $_SESSION['message'];
            unset($_SESSION['message']);
        }else{
            $message = "";
        }
        $this->twig->display('home/index.html.twig', compact('posts', 'message'));

        if(isset($_POST['submit'])){
            $name = $_POST['name'];            
            $email = $_POST['email'];
            $phoneNumber = $_POST['phoneNumber'];
            $message = $_POST['message'];

            $this->loadModel('contact');
            $contact = $this->contact->create($name, $email, $phoneNumber, $message);
            header("Location: /");
    
            }

        }

    }