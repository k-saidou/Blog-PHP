<?php 


class Logins extends AbstractModel{

    public function __construct()
    {
        // Nous définissons la table par défaut de ce modèle
        $this->table = "users";
    
        // Nous ouvrons la connexion à la base de données
        $this->getConnection();
    }


        public function connexion($email, $password){

            $sql = "SELECT * FROM `users` WHERE email = '$email' AND password = '$password' ";
    
            try{
    
                $query = $this->_connexion->prepare($sql);
                $query->bindParam(':email', $email);
                $query->bindParam(':password', $password);
                $query->execute();
                $connect = $query->fetchAll();
                //$connect = $query->rowCount();
    
                if(count($connect)>0){
                    return $connect[0];
                }else{
                    echo "Erreur";
                }
    
                }catch(PDOException $e){
                    echo $e;
                }
            }

}