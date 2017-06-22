<?php

namespace mineichen\Controller;

use mineichen\SimpleTemplateEngine;
use mineichen\Service\Login\LoginServiceInterface;

class LoginController 
{
  /**
   * @var ihrname\SimpleTemplateEngine Template engines to render output
   */
  private $template;
  
  /**
   * @var \PDO Database connection
   */
  private $pdo;
 
  private $loginService;
 
  /**
   * @param ihrname\SimpleTemplateEngine
   */
  public function __construct(SimpleTemplateEngine $template, LoginServiceInterface $loginService)
  {
     $this->template = $template;
     $this->loginService = $loginService;  
  }
  
  public function showLogin()
  {
  	echo $this->template->render("login.html.php");
  }
  public function showLogout()
  {
  	echo $this->template->render("logout.html.php");
  }
  
  public function login(array $data)
  {
  	if(!array_key_exists("txtbx_reg_usr", $data) OR !array_key_exists("txtbx_reg_pas", $data)) {
  		echo $this->template->render("login.html.php");
  	} else {
  		if($this->loginService->authenticate($data["txtbx_reg_usr"], $data["txtbx_reg_pas"])) {
  			$_SESSION["sess_user"] = $data["txtbx_reg_usr"];
  			//header('Location: /');
            echo $this->template->render("home.html.php");
  		} else {
  			echo $this->template->render("login.html.php", ["email" => $data["txtbx_reg_usr"]]);
  		}
  	}
  }
}
