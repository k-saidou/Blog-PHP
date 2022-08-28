<?php 

namespace App\models;

use PDO;
use PDOException;
use Core\AbstractModel;

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

    /*
    // TODO non termine 
    public function create($titre, $chapo, $contenu, $creationTime, $updateTime, $id_user){

        $sql = 'INSERT INTO post(titre, chapo, contenu, creationTime, updateTime, id_user) 
        VALUES(:titre, :chapo, :contenu, :creationTime, :updateTime, :id_user)';
        $stmt = $this->_connexion->prepare($sql);
        $stmt->bindValue(':titre', $titre, PDO::PARAM_STR);
        $stmt->bindValue(':chapo', $chapo, PDO::PARAM_STR);
        $stmt->bindValue(':contenu', $contenu, PDO::PARAM_STR);
        $stmt->bindValue(':creationTime', $creationTime, PDO::PARAM_STR);
        $stmt->bindValue(':updateTime', $updateTime, PDO::PARAM_STR);
        $stmt->bindValue(':id_user', $id_user, PDO::PARAM_STR);
        $stmt->execute(array($titre, $chapo, $contenu, $creationTime, $updateTime, $id_user));
    }
    */


    // TODO test creation Post à réaliser
    public function create(){



                $query = $this->_connexion->prepare("INSERT INTO `post` (`titre`, `chapo`, `contenu`, `creationTime`, `updateTime`, `id_user`)
                VALUES (:titre, :chapo, :contenu, NULL, NULL, NULL)");
                $statement = $this->_connexion->prepare($query);
                $statement->execute();
        }

    public function update($id){
        $req = $this->_connexion->prepare('UPDATE post SET titre = :titre, chapo = :chapo, contenu = :contenu WHERE id = :id');
        $req->execute();
    }
}