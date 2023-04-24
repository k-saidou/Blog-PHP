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
    public function findById(string $id){
        //  $sql = "SELECT * FROM ".$this->table." WHERE `id`='".$id."'";
          $sql = "SELECT * FROM `comment` WHERE comment.id_post = :id";
          $query = $this->_connexion->prepare($sql);
          $query->bindParam(':id', $id, PDO::PARAM_INT);
          $query->execute();
          return $query->fetch(PDO::FETCH_ASSOC);    
      }
  
        // TODO test creation Post à réaliser
        public function create($content){

            $sql = "INSERT INTO `comment` (`content`, `date`, `statut`, `id_user`, `id_post`)
            VALUES (:content, NOW(), NULL, NULL, NULL)";
    
            try{
    
                $query = $this->_connexion->prepare($sql);
                $query->bindParam(':content', $content, PDO::PARAM_STR);

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
            public function deletePost($id) {
                $req = $this->_connexion->prepare('DELETE FROM post WHERE id = ?');
                $req->execute(array($id));
            }


            public function update($content, $date, $contenu){
                $sql = "UPDATE post SET content = :content, date = :date, contenu = :contenu WHERE id = :id";
                $query = $this->_connexion->prepare($sql);
                $query->bindParam(':content', $content, PDO::PARAM_STR);
                $query->bindParam(':date', $date, PDO::PARAM_STR);
                $query->bindParam(':contenu', $contenu, PDO::PARAM_STR);
                $query->execute();
        
            }

}