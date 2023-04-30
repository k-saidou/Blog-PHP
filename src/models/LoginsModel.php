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

            $sql = "SELECT `id` FROM `users` WHERE email = '$email' AND password = '$password'";
            try{
    
                $query = $this->_connexion->prepare($sql);
                $query->bindParam(':email', $email, PDO::PARAM_STR);
                $query->bindParam(':password', $password, PDO::PARAM_STR);
               // $query->bindParam(':id', $id, PDO::PARAM_INT);
                $query->execute();
                $connect = $query->fetchAll();
                //$connect = $query->rowCount();
    
                if(count($connect)>0){           
                    var_dump($connect);
                    $_SESSION['id'] = $connect[0]['id'];         

                    echo $_SESSION['id'];


                    return $connect[0];
                }else{
                    echo "Erreur de connexion";
                }
    
                }catch(PDOException $e){
                    echo $e;
                }
            }

}