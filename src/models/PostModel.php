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


            

    public function supprime($id){
        $sql = "DELETE FROM `post` WHERE `id`=:id;";
        $query = $this->_connexion->prepare($sql);
        $query->execute();
        return $query->fetch();    
    }    

    public function deletePost($id) {
        $req = $this->_connexion->prepare('DELETE FROM post WHERE id = ?');
        $req->execute(array($id));
    }

}