<?php 

namespace Src\models;

use App\AbstractModel;
use Src\Entity\Post;

class PostModel extends AbstractModel{

    public function __construct()
    {
        // Nous définissons la table par défaut de ce modèle
        $this->table = "post";
    
        // Nous ouvrons la connexion à la base de données
        $this->getConnection();
    }
    

    public function deletePost($id) {
        $req = $this->_connexion->prepare('DELETE FROM post WHERE id = ?');
        $req->execute(array($id));
    }

    public function create($titre,$chapo,$contenu){
       
        if(isset($_POST)){

            if(!empty($_POST['titre'])and !empty($_POST['chapo'])and !empty($_POST['contenu'])){
                $titre=htmlspecialchars($_POST['titre']);
                $chapo=htmlspecialchars($_POST['chapo']);
                $contenu=htmlspecialchars($_POST['contenu']);
            }
      
        $req =$this->_connexion->prepare('INSERT INTO post(id, titre, chapo, contenu, creationTime, updateTime, id_user) 
        VALUES(null, ?, ?, ?, NULL, null, null)');
        $req->execute(array([$titre,$chapo,$contenu]));
         }
    }

    public function update($id){
        $req = $this->_connexion->prepare('UPDATE post SET titre = :titre, chapo = :chapo, contenu = :contenu WHERE id = :id');
        $req->execute();
    }
}