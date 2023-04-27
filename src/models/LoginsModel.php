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

            $sql = "SELECT * FROM `users` WHERE email = '$email' AND password = '$password'";
            try{
    
                $query = $this->_connexion->prepare($sql);
                $query->bindParam(':email', $email, PDO::PARAM_STR);
                $query->bindParam(':password', $password, PDO::PARAM_STR);
                $query->execute();
                $connect = $query->fetchAll();
                //$connect = $query->rowCount();
    
                if(count($connect)>0){                    

                    echo $_SESSION['email'];
                    echo $_SESSION['password'];

                    return $connect[0];
                }else{
                    echo "Erreur de connexion";
                }
    
                }catch(PDOException $e){
                    echo $e;
                }
            }

}