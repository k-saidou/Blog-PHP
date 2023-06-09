<?php 


class Contact extends AbstractModel{

    public function __construct()
    {
        // Nous définissons la table par défaut de ce modèle
        $this->table = "contact";
    
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
          $sql = "SELECT * FROM `contact` WHERE id = $id ";
          $query = $this->_connexion->prepare($sql);
          $query->execute();
          return $query->fetch(PDO::FETCH_ASSOC);    
      }  

            public function deleteContact($id) {
                $req = $this->_connexion->prepare('DELETE FROM contact WHERE id = ?');
                $req->execute(array($id));
            }

            public function create($name, $email, $phoneNumber, $message){

                $sql = "INSERT INTO `contact` ( `name`, `email`, `phoneNumber`, `message`)
                VALUES (:name, :email, :phoneNumber, :message)";
        
                try{
        
                    $query = $this->_connexion->prepare($sql);
                    $query->bindParam(':name', $name, PDO::PARAM_STR);
                    $query->bindParam(':email', $email, PDO::PARAM_STR);
                    $query->bindParam(':phoneNumber', $phoneNumber, PDO::PARAM_INT);
                    $query->bindParam(':message', $message, PDO::PARAM_STR);
        
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

}