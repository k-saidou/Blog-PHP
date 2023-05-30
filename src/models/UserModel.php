<?php 


class User extends AbstractModel{

    public function __construct()
    {
        // Nous définissons la table par défaut de ce modèle
        $this->table = "users";
    
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
          $sql = "SELECT * FROM `users` WHERE id = $id ";
          $query = $this->_connexion->prepare($sql);
          $query->execute();
          return $query->fetch(PDO::FETCH_ASSOC);    
      }  


        // TODO test creation user à réaliser
        public function create($firstname, $lastname, $email,$password){

            $sql = "INSERT INTO `users` ( `firstname`, `lastname`, `email`, `password`)
            VALUES (:firstname, :lastname, :email, :password)";
    
            try{
    
                $query = $this->_connexion->prepare($sql);
                $query->bindParam(':firstname', $firstname, PDO::PARAM_STR);
                $query->bindParam(':lastname', $lastname, PDO::PARAM_STR);
                $query->bindParam(':email', $email, PDO::PARAM_STR);
                $query->bindParam(':password', $password, PDO::PARAM_STR);

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

            public function update($firstname, $lastname, $email, $password, $id){

                $sql = "UPDATE `users` SET `firstname` = :firstname, `lastname` = :lastname, `email` = :email, `password` = :password WHERE `id` = :id";
                $query = $this->_connexion->prepare($sql);
                $query->bindParam(':firstname', $firstname, PDO::PARAM_STR);
                $query->bindParam(':lastname', $lastname, PDO::PARAM_STR);
                $query->bindParam(':email', $email, PDO::PARAM_STR);
                $query->bindParam(':password', $password, PDO::PARAM_STR);
                $query->bindParam(':id', $id, PDO::PARAM_INT);
                $query->execute();
        
            }

            public function deleteUser($id) {
                $req = $this->_connexion->prepare('DELETE FROM users WHERE id = ?');
                $req->execute(array($id));
            }


}