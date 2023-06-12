<?php 


class Home extends AbstractModel{

    public function __construct()
    {
        // Nous définissons les tables de ce modèle
        $this->table = "contact";
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

    /**
     * Méthode permettant d'obtenir tous les enregistrements de la table choisie
     *
     * @return void
     */
    public function getLast(){
        $sql = "SELECT * FROM .$this->table ORDER BY created_at DESC LIMIT 4";
        $query = $this->_connexion->prepare($sql);
        $query->execute();
        return $query->fetchAll();    
    }

    /**
     * Méthode create pour céer un nouveau Contact
     */
    public function create($name, $email,$phoneNumber, $message){
        $sql = "INSERT INTO `contact` ( `name`, `email`, `phoneNumber`, `message`)
        VALUES (:name, :email, :phoneNumber, :message)";
        try{
            $query = $this->_connexion->prepare($sql);
            $query->bindParam(':name', $name, PDO::PARAM_STR);
            $query->bindParam(':email', $email, PDO::PARAM_STR);
            $query->bindParam(':phoneNumber', $phoneNumber, PDO::PARAM_INT);
            $query->bindParam(':message', $message, PDO::PARAM_STR);
            $query->execute();

        }catch(PDOException $e){
            return $e;
            }
    }
}