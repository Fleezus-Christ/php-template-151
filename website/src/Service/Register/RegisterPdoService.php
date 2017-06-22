<?php

namespace mineichen\Service\Register;

class RegisterPdoService implements RegisterServiceInterface
{
    /**
     * @var \PDO
     */
    private $pdo;
    public function __construct(\PDO $pdo)
    {
       $this->pdo = $pdo;   
    }

    public function register($username, $email, $password)
    {
//                echo($username);
//        echo($password);
                
        
                $stmt = $this->pdo->prepare("SELECT * FROM user WHERE email=? AND password=? AND username=?");
                $stmt->bindValue(1, $email);
                $stmt->bindValue(2, $password);
                $stmt->bindValue(3, $username);
                $stmt->execute();

                if($stmt->rowCount() >= 1) 
                {
                    return false;                    
                } 
                else 
                {
                    
                    $date = date("Y-m-d");
                    
                    $stmt = $this->pdo->prepare("INSERT INTO user (Username, Email, Password, Member_since) VALUES ('$username', '$email', '$password', '$date')");
                    $stmt->execute();
                    
                    return $this->authenticate($username, $password);
                    
                    // $_SESSION["sess_user"] = $username;
                    // return true;
                }
    }
    
    // THIS METHOD OS COPIED FROM LOGINDPOSERVICE BECAUSE I DONT KNOW HOW TO CALL IT
    public function authenticate($username, $password)
    {
  
        $stmt = $this->pdo->prepare("SELECT ID FROM user WHERE username=? AND password=?");
        $stmt->bindValue(1, $username);
        $stmt->bindValue(2, $password);
        $stmt->execute();
        
        $userID = $stmt->fetchColumn(0);
        
        if($userID > 0)
        {
            $_SESSION["sess_user"] = $username;
            $_SESSION["sess_userID"] = $userID;
            return true;
        }
        else 
        {
            return false;
        }
        
    }
}
