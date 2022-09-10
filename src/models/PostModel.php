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


    // TODO test creation Post à réaliser
    public function create($titre, $chapo, $contenu){

        $sql = "INSERT INTO `post` (`titre`, `chapo`, `contenu`, `creationTime`, `updateTime`, `id_user`)
        VALUES (:titre, :chapo, :contenu, NOW(), NULL, NULL)";

        try{

            $query = $this->_connexion->prepare($sql);
            $query->bindParam(':titre', $titre, PDO::PARAM_STR);
            $query->bindParam(':chapo', $chapo, PDO::PARAM_STR);
            $query->bindParam(':contenu', $contenu, PDO::PARAM_STR);
        /*  $query->bindParam(':creationTime', $creationTime, PDO::PARAM_STR);
            $query->bindParam(':updateTime', $updateTime, PDO::PARAM_STR);
            $query->bindParam(':id_user', $id_user, PDO::PARAM_INT);*/
            $query->execute();
            $contar = $query->rowCount();

            if($contar>0){
                echo 'Ajouté avec succes';
            }else{
                echo "Erreur";
            }

            }catch(PDOException $e){
                echo $e;
            }
    }
         
    public function update($titre, $chapo, $contenu){
        $sql = "UPDATE post SET titre = :titre, chapo = :chapo, contenu = :contenu WHERE id = :id";
        $query = $this->_connexion->prepare($sql);
        $query->bindParam(':titre', $titre, PDO::PARAM_STR);
        $query->bindParam(':chapo', $chapo, PDO::PARAM_STR);
        $query->bindParam(':contenu', $contenu, PDO::PARAM_STR);
        $query->execute();

    }

   
      
}