<?php

namespace mineichen\Controller;

use mineichen\SimpleTemplateEngine;
use mineichen\Service\Register\RegisterServiceInterface;

class RegisterController 
{
  /**
   * @var ihrname\SimpleTemplateEngine Template engines to render output
   */
  private $template;
  
  /**
   * @var \PDO Database connection
   */
  private $pdo;
 
  private $registerService;
 
  /**
   * @param ihrname\SimpleTemplateEngine
   */
  public function __construct(SimpleTemplateEngine $template, RegisterServiceInterface $registerService)
  {
     $this->template = $template;
     $this->registerService = $registerService;  
  }
  
  public function showRegister()
  {
  	echo $this->template->render("register.html.php");
  }
  
  public function register(array $data)
  {

  	if(!array_key_exists("txtbx_reg_usr", $data) OR !array_key_exists("txtbx_reg_eml", $data) OR !array_key_exists("txtbx_reg_pas", $data)) {
  		echo $this->template->render("register.html.php");
  	} else {
  		if($this->registerService->register($data["txtbx_reg_usr"], $data["txtbx_reg_eml"], $data["txtbx_reg_pas"])) {
  			$_SESSION["sess_user"] = $data["txtbx_reg_usr"];
  			header('Location:home');
  		} else {
  			echo $this->template->render("register.html.php", ["email" => $data["txtbx_reg_usr"]]);
  		}
  	}
  }
}