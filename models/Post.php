<?php 

class Post extends Model{

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
    public function findById(string $id){
        $sql = "SELECT * FROM ".$this->table." WHERE `id`='".$id."'";
        $query = $this->_connexion->prepare($sql);
        $query->execute();
        return $query->fetch(PDO::FETCH_ASSOC);    
    }


}