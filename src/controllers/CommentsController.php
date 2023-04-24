<?php 

class Comments extends AbstractController{

    /**
     * Cette méthode affiche la liste des comments
     *
     * @return void
     */
    public function index(){
        // On instancie le modèle "Comment"
        $this->loadModel('Comment');

        // On stocke la liste des Comment dans $comments
        $comments = $this->Comment->getAll();

        // On envoie les données à la vue lire
        $this->twig->display('comments/index.html.twig', compact('comments'));
        }

    /**
     * Méthode permettant d'afficher un post à partir de son id
     *
     * @param int $id
     * @return void
     */
    public function show(string $id){

        $this->loadModel('Comment');
        $comment = $this->Comment->findById($id);
        $this->twig->display('comments/show.html.twig', compact('comment'));
    }

    
    // TODO controller non fonctionnel 
    public function new(){


        if(isset($_POST['submit'])){
            $content = $_POST['content'];
           /*
            $date = $_POST['date'];
            $statut = $_POST['statut'];
            $id_user = $_POST['iduser'];
            $id_post = $_POST['idpost'];
            */
        }else{
            $this->twig->display('comments/new.html.twig');
        }
        $this->loadModel('comment');
        $comment = $this->comment->create($content);
        return $this->twig->display('comments/new.html.twig');
    }

    // TODO FONCTIONNE
    public function delete($id){
        $this->loadModel('comment');
        $comment = $this->comment->deleteCom($id);
        header("Location: /comments/index");
    }

    
    public function update($id){
        $this->loadModel('comment');
        $post = $this->post->update($id);                  
        $this->twig->display('comments/update.html.twig');

    }
    
}