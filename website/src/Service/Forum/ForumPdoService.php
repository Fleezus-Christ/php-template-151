<?php

namespace mineichen\Service\Forum;

class ForumPdoService implements ForumServiceInterface
{
    /**
     * @var \PDO
     */
    private $pdo;
    public function __construct(\PDO $pdo)
    {
       $this->pdo = $pdo;   
    }
    
    public function getCategories()
    {
        
        $stmt = $this->pdo->prepare("SELECT Id, Name FROM category");
        $stmt->execute();
                
        $categories = [];
        
        foreach ($stmt->fetchAll() as $categorie) {
            array_push($categories,["id" => $categorie["Id"], "name" => $categorie["Name"]]);    
        }

        return $categories;
    }
    
    
    public function getTopics($categorieID, $sortOrder)
    {
        // prepare sql statement
        $sql="SELECT A.ID, A.Title, A.Date_created, B.Username, (SELECT COUNT(*) FROM comment C WHERE A.ID = C.Topic_Id) AS CommentCount FROM topic A, user B WHERE A.User_Id = B.Id ";
                  
        if($categorieID != 0)
        {                
            $sql.= "AND A.category_Id = " . $categorieID;                 
        }        
        $sql.= " ORDER BY A.Date_created " . $sortOrder;            
        
        var_dump($sql);
        
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute();
        
        // create topics array
        $topics = [];
        
        foreach ($stmt->fetchAll() as $topic) 
        {
            array_push($topics,[
                                "id" => $topic["ID"],
                                "title" => $topic["Title"],
                                "username" => $topic["Username"],
                                "commentCount" => $topic["CommentCount"],
                                "dateCreated" => $topic["Date_created"],
                               ]);    
        }
        return $topics;    
        
    }

    public function newTopic($title, $content, $categoryID, $anonymous)
    {
        $date = date("Y-m-d");

        $stmt = $this->pdo->prepare("INSERT INTO topic (title, content, user_id, Date_created, Anonymous, category_Id) VALUES ('$title', '$content', {$_SESSION["sess_userID"]}, '$date', '$anonymous', '$categoryID')");

        $stmt->execute();
        $topicId = $this->pdo->lastInsertId();
        return $topicId;
    }
}