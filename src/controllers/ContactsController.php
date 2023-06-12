<?php

class Contacts extends AbstractController{

    /**
     * Cette méthode affiche la liste des contacts
     *
     * @return void
     */
    public function index(){

        // On verifie si il y a un message flash
        if(isset($_SESSION['message'])){
            // On affiche le message    
            $message = $_SESSION['message'];
            // On supprime le message si la page est actualisé
            unset($_SESSION['message']);
        }else{
            $message = "";
        }
        // On instancie le modèle "contact"
        $this->loadModel('Contact');
        // On stocke la liste des contacts dans $contacts
        $contacts = $this->Contact->getAll();
        // On envoie les données à la vue 
        $this->twig->display('contact/index.html.twig', compact('contacts','message'));
    }

    /**
     * Cette méthode permet d'afficher le message du contact
     *
     * @return void
     */
    public function show($id){
        $this->loadModel('Contact');
        $contact = $this->Contact->findByID($id);
        $this->twig->display('contact/show.html.twig', compact('contact'));
    }

    /**
     * Cette méthode supprime le contact
     *
     * @return void
     */
    public function delete($id){
        $this->loadModel('contact');
        $contact = $this->contact->deleteContact($id);
        if($contact !== false){
            $_SESSION['message'] = "Contact supprimé";
            header("Location: /contacts/index");
        }else{
            $error = "Une erreur est survenue";
            $this->twig->display('contact/index.html.twig', compact('contact','error'));
        }
    }
}