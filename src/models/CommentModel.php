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
      

      public function showComment($id_post){

        $sql = "SELECT * FROM `comment` WHERE id_post = $id_post AND `statut`='Accept' ORDER BY `date` ASC ";
        $query = $this->_connexion->prepare($sql);
        $query->execute();
        return $query->fetchAll(PDO::FETCH_ASSOC);    
    } 
        
    public function AllByUser($id_user){
        //$sql = "SELECT * FROM `comment` WHERE id = $id AND id_post = $id_post ";
        $sql = "SELECT * FROM `comment` WHERE id_user = $id_user";
        $query = $this->_connexion->prepare($sql);
          $query->execute();
          return $query->fetch(PDO::FETCH_ASSOC);    
      } 
  
        // TODO test creation Post à réaliser
        public function create($content, $id_user, $id_post){

            $sql = "INSERT INTO `comment` (`content`, `date`, `statut`, `id_user`, `id_post`)
            VALUES (:content, NOW(), 'Waiting for validation', :id_user, :id_post)";
    
            try{
    
                $query = $this->_connexion->prepare($sql);
                $query->bindParam(':content', $content, PDO::PARAM_STR_CHAR);
                $query->bindParam(':id_user', $id_user, PDO::PARAM_INT);
                $query->bindParam(':id_post', $id_post, PDO::PARAM_INT);

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

                $sql = "UPDATE `comment` SET `content` = :content, `statut` = 'Waiting for validation' WHERE `id` = :id";
                $query = $this->_connexion->prepare($sql);
                $query->bindParam(':content', $content, PDO::PARAM_STR);
                $query->bindParam(':id', $id, PDO::PARAM_INT);

                $query->execute();
        
            }

            
            public function updateStatut($id){

                $sql = "UPDATE `comment` SET `statut`= 'Accept' WHERE `id`= :id";
                $query = $this->_connexion->prepare($sql);
                $query->bindParam(':id', $id, PDO::PARAM_INT);
                $query->execute();
        
            }

}