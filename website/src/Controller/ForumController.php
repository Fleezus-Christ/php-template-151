<?php

namespace mineichen\Controller;

use mineichen\SimpleTemplateEngine;
use mineichen\Service\Forum\ForumServiceInterface;

class ForumController 
{
  /**
   * @var ihrname\SimpleTemplateEngine Template engines to render output
   */
  private $template;
  
  /**
   * @var \PDO Database connection
   */
  private $pdo;
 
  private $forumService;
 
  /**
   * @param ihrname\SimpleTemplateEngine
   */
  public function __construct(SimpleTemplateEngine $template, ForumServiceInterface $forumService)
  {
     $this->template = $template;
     $this->forumService = $forumService;  
  }
    
    
  public function showHome(array $data)
 {
      
       // get categories for combox:
      $categories = $this->forumService->getCategories();
      // add to argument array
      $arguments =array(1 => $categories,);  
    
      // deafault filter
      $categorieID = 0;
      $sortOrder = "DESC";
      
      // if form submitted:
      if(count($data) > 0)
      {
          if(array_key_exists("categorie", $data))
          {
            $categorieID = $data["categorie"];    
          }
          
          $sortOrder = $data["sortOrder"];
      }
      
      var_dump($categorieID);
      var_dump($sortOrder);
      
      // get topics
      $topics = $this->forumService->getTopics($categorieID, $sortOrder);
      
      // add to argument array
      $arguments =array(2 => $topics,);  
      
      echo $this->template->render("home.html.php", $arguments);
  }
  
  public function showCreateTopic()
  {
      // get categories for combox:
      $categories = $this->forumService->getCategories();
      $arguments =array(1 => $categories,);  
  	  echo $this->template->render("createTopic.html.php", $arguments);
  }
    
 
    
  public function postTopic(array $data)
  {
    var_dump($data);
    
    $anonymousPost = 0;
    if(array_key_exists("anonymous", $data))
    {
        $anonymousPost = 1;
    }
      
      
  	if(!array_key_exists("title", $data) OR !array_key_exists("category", $data) OR !array_key_exists("content", $data)) 
    {
        echo("PLEASE FILL ALL THE FIELDS");
  		echo $this->template->render("createTopic.html.php");
  	}
    else 
    {
  		$topicID = $this->forumService->newTopic($data["title"], $data["content"], $data["category"], $anonymousPost);
        
        // show topic detail page
        $arguments = array(1 => $topicID);
        
        echo $this->template->render("topicDetail.html.php", $arguments);

    }   
  }
    
    
/*    public function getCategories()
    {
        return $this->forumService->getCategories();
    }*/
    
    public function getTopics($categorieID, $sortOrder)
    {
        return $this->forumService->getTopics($categorieID, $sortOrder);
    }  
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
}