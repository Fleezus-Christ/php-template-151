<?php

error_reporting(E_ALL);
session_start();

require_once("../vendor/autoload.php");
$tmpl = new mineichen\SimpleTemplateEngine(__DIR__ . "/../templates/");
$pdo = new \PDO(
	"mysql:host=mariadb;dbname=app;charset=utf8",
	"root",
	"my-secret-pw",
	[PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]
);
$loginService = new mineichen\Service\Login\LoginPdoService($pdo);
$registerService = new mineichen\Service\Register\RegisterPdoService($pdo);
$forumService = new mineichen\Service\Forum\ForumPdoService($pdo);

switch($_SERVER["REQUEST_URI"]) {
	case "/":
		(new mineichen\Controller\IndexController($tmpl))->homepage();
		break;
	case "/testroute":
		echo "Test";
		break;
    case "/home":
		$ctr = new mineichen\Controller\ForumController($tmpl, $forumService);
		if($_SERVER["REQUEST_METHOD"] == "GET") {
			$ctr->showHome(array());
		} else {
			$ctr->showHome($_POST); // do i need this
		}		
		break;
	case "/login":
		$ctr = new mineichen\Controller\LoginController($tmpl, $loginService);
		if($_SERVER["REQUEST_METHOD"] == "GET") {
			$ctr->showLogin();
		} else {
			$ctr->login($_POST);
		}		
		break;
    case "/register":
        $ctr = new mineichen\Controller\RegisterController($tmpl, $registerService);
		if($_SERVER["REQUEST_METHOD"] == "GET") {
			$ctr->showRegister();
		} else {
			$ctr->register($_POST);
		}		
		break;
    case "/logout":
        $ctr = new mineichen\Controller\LoginController($tmpl, $loginService);
		if($_SERVER["REQUEST_METHOD"] == "GET") {
			$ctr->showLogout();
		} else {
			$ctr->logout($_POST);
		}		
		break;
    case "/createTopic":
        $ctr = new mineichen\Controller\ForumController($tmpl, $forumService);
		if($_SERVER["REQUEST_METHOD"] == "GET") {
			$ctr->showCreateTopic();
		} else {
			$ctr->postTopic($_POST); // do i need this
		}		
		break;
	default:
		$matches = [];
		if(preg_match("|^/hello/(.+)$|", $_SERVER["REQUEST_URI"], $matches)) {
			(new mineichen\Controller\IndexController($tmpl))->greet($matches[1]);
			break;
		}
		echo "Not Found";
}

