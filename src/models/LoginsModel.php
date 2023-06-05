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

        $sql = "SELECT * FROM `users` WHERE email = '$email'  ";
        try{
            $query = $this->_connexion->prepare($sql);
            $query->bindParam(':email', $email, PDO::PARAM_STR);
            $query->execute();
            $connect = $query->fetchAll();

            if(count($connect)>0){  
                 
                if(password_verify($password, $connect[0]['password'])){
                $_SESSION['id'] = $connect[0]['id']; 
                $_SESSION['firstname'] = $connect[0]['firstname'];        
                $_SESSION['role'] = $connect[0]['role'];         
                return $connect[0]; 
                } else{
                    return false;
                     }


                }else{
                   return false;
                    }
            }catch(PDOException $e){
                echo $e;
                }
        }

    }