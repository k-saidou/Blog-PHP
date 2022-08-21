<?php 

namespace Src\models;

use PDO;
use PDOException;
use Src\Entity\Post;
use App\AbstractModel;

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


        if(isset($_POST['submit'])){

            $titre = $_POST['titre'];
            $chapo = $_POST['chapo'];
            $contenu = $_POST['contenu'];

            try {

                var_dump($_POST);

                $query = $this->_connexion->prepare("INSERT INTO `post` (`titre`, `chapo`, `contenu`, `creationTime`, `updateTime`, `id_user`)
                VALUES (:titre, :chapo, :contenu, NULL, NULL, NULL)");
                $statement = $this->_connexion->prepare($query);
                $statement->bindParam(1, $titre);
                $statement->bindParam(2, $chapo);
                $statement->bindParam(3, $contenu);
                $query_execute = $statement->execute();

                if($query_execute){
                    $_SESSION['message'] = "Post Ajouté";
                    header('Location: read.html.twig');
                    exit(0);
                } else{
                    $_SESSION['message'] = "Post Non Ajouté";
                    header('Location: read.html.twig');
                    exit(0);
                }


            } catch (PDOException $e) {
                echo "My Error Type:". $e->getMessage();
            }
        }


                
            
    }

    public function update($id){
        $req = $this->_connexion->prepare('UPDATE post SET titre = :titre, chapo = :chapo, contenu = :contenu WHERE id = :id');
        $req->execute();
    }
}