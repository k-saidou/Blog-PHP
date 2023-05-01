<?php 


class Home extends AbstractController{

    public function index(){
        $this->loadModel('Post');
        $posts = $this->Post->getLast();
        $this->twig->display('home/index.html.twig', compact('posts'));

        if(isset($_POST['submit'])){
            $name = $_POST['name'];            
            $email = $_POST['email'];
            $phoneNumber = $_POST['phoneNumber'];
            $message = $_POST['message'];
        }else{
            $this->twig->display('home/index.html.twig', compact('posts'));
            }
        $this->loadModel('contact');
        $contact = $this->contact->create($name, $email, $phoneNumber, $message);
        header("Location: /");

    }

}