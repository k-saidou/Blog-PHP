<?php 

class Comment extends AbstractModel{

    public function __construct()
    {
        // Nous définissons la table par défaut de ce modèle
        $this->table = "comment";
    
        // Nous ouvrons la connexion à la base de données
        $this->getConnection();
    }

        /**
     * Retourne un post en fonction de son id
     *
     * @param int $id
     * @return void
     */
    public function findById($id){
        //$sql = "SELECT * FROM `comment` WHERE id = $id AND id_post = $id_post ";
        $sql = "SELECT * FROM `comment` WHERE id = $id";
        $query = $this->_connexion->prepare($sql);
          $query->execute();
          return $query->fetch(PDO::FETCH_ASSOC);    
      }  
        

  
        // TODO test creation Post à réaliser
        public function create($content){

            $sql = "INSERT INTO `comment` (`content`, `date`, `statut`, `id_user`, `id_post`)
            VALUES (:content, NOW(), NULL, NULL, NULL)";
    
            try{
    
                $query = $this->_connexion->prepare($sql);
                $query->bindParam(':content', $content, PDO::PARAM_STR_CHAR);

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

            public function deleteCom($id) {
                $req = $this->_connexion->prepare('DELETE FROM comment WHERE id = ?');
                $req->execute(array($id));
            }


            public function update($content, $id){

                $sql = "UPDATE `comment` SET `content` = :content WHERE `id` = :id";
                //$sql = "UPDATE `comment` SET `content` = :content WHERE `id` = :id AND `id_post` = :id_post";
                $query = $this->_connexion->prepare($sql);
                $query->bindParam(':content', $content, PDO::PARAM_STR);
                $query->bindParam(':id', $id, PDO::PARAM_INT);
                //$query->bindParam(':id_post', $id_post, PDO::PARAM_INT);

                $query->execute();
        
            }

            
/*
            public function update($titre, $chapo, $contenu, $id){

                $sql = "UPDATE `post` SET `titre` = :titre, `chapo` = :chapo, `contenu` = :contenu WHERE `id` = :id";
                $query = $this->_connexion->prepare($sql);
                $query->bindParam(':titre', $titre, PDO::PARAM_STR);
                $query->bindParam(':chapo', $chapo, PDO::PARAM_STR);
                $query->bindParam(':contenu', $contenu, PDO::PARAM_STR);
                $query->bindParam(':id', $id, PDO::PARAM_INT);
                $query->execute();
        
            }
*/
}