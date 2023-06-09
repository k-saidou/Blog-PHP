<?php

class Contacts extends AbstractController{

    /**
     * Cette méthode affiche la liste des contacts
     *
     * @return void
     */
    public function index(){
        $this->loadModel('Contact');
        $contacts = $this->Contact->getAll();
        $this->twig->display('contact/index.html.twig', compact('contacts'));
    }

    public function show($id){
        $this->loadModel('Contact');
        $contact = $this->Contact->findByID($id);
        $this->twig->display('contact/show.html.twig', compact('contact'));
    }

    public function delete($id){
        $this->loadModel('contact');
        $contact = $this->contact->deleteContact($id);
        header("Location: /contacts/index");
    }
    
}