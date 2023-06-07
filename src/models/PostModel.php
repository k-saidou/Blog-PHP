<?php 

class Post extends AbstractModel{

    public function __construct()
    {
        // Nous définissons la table par défaut de ce modèle
        $this->table = "post";
    
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
        $sql = "SELECT * FROM `post` WHERE id = $id ";
        $query = $this->_connexion->prepare($sql);
        $query->execute();
        return $query->fetch(PDO::FETCH_ASSOC);    
    }  

    /**
     * Retourne les post d'un user en fonction de son id
     *
     * @param int $id
     * @return void
     */

    public function AllByUser($id_user){
        $sql = "SELECT * FROM `post` WHERE id_user = $id_user";
        $query = $this->_connexion->prepare($sql);
        $query->execute();
        return $query->fetchAll(PDO::FETCH_ASSOC);    
    }
    
    /**
     * Méthode create pour céer un nouveau Post
     */
    public function create($titre, $chapo, $contenu, $id_user){
        $sql = "INSERT INTO `post` (`titre`, `chapo`, `contenu`, `creationTime`, `updateTime`, `id_user`)
        VALUES (:titre, :chapo, :contenu, NOW(), NULL, :id_user)";   
        try{   
            $query = $this->_connexion->prepare($sql);
            $query->bindParam(':titre', $titre, PDO::PARAM_STR);
            $query->bindParam(':chapo', $chapo, PDO::PARAM_STR);
            $query->bindParam(':contenu', $contenu, PDO::PARAM_STR);
            $query->bindParam(':id_user', $id_user, PDO::PARAM_INT);
            $query->execute();
            $contar = $query->rowCount();
    
        }catch(PDOException $e){
            echo $e;
            }
    }

    /**
     * Supprime un post en fonction de son id
     *
     * @param int $id
     */
    public function deletePost($id) {
        $req = $this->_connexion->prepare('DELETE FROM post WHERE id = ?');
        $req->execute(array($id));
    }
    
    /**
     * Méthode update pour modifier un Post
     */
    public function update($titre, $chapo, $contenu, $id){
        $sql = "UPDATE `post` SET `titre` = :titre, `chapo` = :chapo, `contenu` = :contenu, `updateTime` = NOW() WHERE `id` = :id";
        $query = $this->_connexion->prepare($sql);
        $query->bindParam(':titre', $titre, PDO::PARAM_STR);
        $query->bindParam(':chapo', $chapo, PDO::PARAM_STR);
        $query->bindParam(':contenu', $contenu, PDO::PARAM_STR);
        $query->bindParam(':id', $id, PDO::PARAM_INT);
        $query->execute();
    }
}