<?php

namespace mineichen\Service\Login;

class LoginPdoService implements LoginServiceInterface
{
    /**
     * @var \PDO
     */
    private $pdo;
    public function __construct(\PDO $pdo)
    {
       $this->pdo = $pdo;   
    }

    public function authenticate($username, $password)
    {
  
        $stmt = $this->pdo->prepare("SELECT ID FROM user WHERE username=? AND password=?");
        $stmt->bindValue(1, $username);
        $stmt->bindValue(2, $password);
        $stmt->execute();
        
        $userID = $stmt->fetchColumn(0);
        
        var_dump($userID);
        
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
