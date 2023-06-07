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
        $sql = "SELECT * FROM `comment` WHERE id = $id";
        $query = $this->_connexion->prepare($sql);
        $query->execute();
        return $query->fetch(PDO::FETCH_ASSOC);    
    }
      
    /**
     * Retourne un commentaire en fonction de son id
     *
     * @param int $id
     * @return void
     */
    public function showComment($id_post){
        $sql = "SELECT * FROM `comment` WHERE id_post = $id_post AND `statut`='Accept' ORDER BY `date` ASC ";
        $query = $this->_connexion->prepare($sql);
        $query->execute();
        return $query->fetchAll(PDO::FETCH_ASSOC);    
    } 

    /**
     * Retourne tout les commentaires d'un user en fonction de son id
     *
     * @param int $id
     * @return void
     */
    public function AllByUser($id_user){
        $sql = "SELECT * FROM `comment` WHERE id_user = $id_user";
        $query = $this->_connexion->prepare($sql);
        $query->execute();
        return $query->fetchAll(PDO::FETCH_ASSOC);    
    } 
  
    /**
     * Méthode create pour céer un nouveau utilisateur
     */
    public function create($content, $id_user, $id_post){
        $sql = "INSERT INTO `comment` (`content`, `date`, `statut`, `id_user`, `id_post`)
        VALUES (:content, NOW(), 'Waiting for validation', :id_user, :id_post)";

        try{
            $query = $this->_connexion->prepare($sql);
            $query->bindParam(':content', $content, PDO::PARAM_STR_CHAR);
            $query->bindParam(':id_user', $id_user, PDO::PARAM_INT);
            $query->bindParam(':id_post', $id_post, PDO::PARAM_INT);
            $query->execute();

        }catch(PDOException $e){
            echo $e;
            }
    }

    /**
     * Méthode update pour modifier un utilisateur
     */    
    public function deleteCom($id) {
        $req = $this->_connexion->prepare('DELETE FROM comment WHERE id = ?');
        $req->execute(array($id));
    }

    /**
     * Méthode update pour modifier un commentaire
     */
    public function update($content, $id){
        $sql = "UPDATE `comment` SET `content` = :content, `statut` = 'Waiting for validation' WHERE `id` = :id";
        $query = $this->_connexion->prepare($sql);
        $query->bindParam(':content', $content, PDO::PARAM_STR);
        $query->bindParam(':id', $id, PDO::PARAM_INT);
        $query->execute();

    }

    /**
     * Méthode update pour modifier le statut dèun commentaire
     */
    public function updateStatut($id){
        $sql = "UPDATE `comment` SET `statut`= 'Accept' WHERE `id`= :id";
        $query = $this->_connexion->prepare($sql);
        $query->bindParam(':id', $id, PDO::PARAM_INT);
        $query->execute();
    }

}