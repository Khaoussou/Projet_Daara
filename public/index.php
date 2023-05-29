<?php

require_once('../vendor/autoload.php');

use Router\Route;

// use Controller\SessionController;

// $session = new SessionController();
// $session->startSession();

// if (!$_SESSION['login'] && !$_SESSION['password']) {
//     $session->destroySession();
// }

$router = new Route();
$router->addRoute('GET', '/', 'Controller\Controller', 'connect');
$router->addRoute('GET', '/connect', 'Controller\Controller', 'connect');
$router->addRoute('POST', '/login', 'Controller\Controller', 'connexion');
$router->addRoute('GET', '/save', 'Controller\Controller', 'save');
$router->addRoute('GET', '/addstudent', 'Controller\Controller', 'addstudent');
$router->addRoute('GET', '/lister', 'Controller\EleveController', 'getStudent');
$router->addRoute('GET', '/student', 'Controller\EleveController', 'getStudentByClasse');
$router->addRoute('POST', '/add', 'Controller\EleveController', 'insertStudent');
$router->addRoute('GET', '/level', 'Controller\GroupeNiveauController', 'getLevelGroup');
$router->addRoute('POST', '/insertlevelGroup', 'Controller\GroupeNiveauController', 'insertLevelGroup');
// $router->addRoute('GET', '/addlevel', 'Controller\Controller', 'addlevel');
$router->addRoute('POST', '/addLevel', 'Controller\NiveauController', 'insertLevel');
$router->addRoute('GET', '/listean', 'Controller\AnneeController', 'getYear');
$router->addRoute('POST', '/addan', 'Controller\AnneeController', 'insertYear');
$router->addRoute('GET', '/delete', 'Controller\AnneeController', 'deleteYear');
$router->addRoute('GET', '/modiff', 'Controller\Controller', 'update');
$router->addRoute('POST', '/update', 'Controller\AnneeController', 'updateYear');
$router->addRoute('GET', '/active', 'Controller\AnneeController', 'enableYear');
$router->addRoute('GET', '/classe', 'Controller\ClasseController', 'getClasse');
$router->addRoute('GET', '/form', 'Controller\Controller', 'formclasse');
$router->addRoute('POST', '/addClasse', 'Controller\ClasseController', 'insertClasse');
$router->treatRequest($_SERVER["REQUEST_METHOD"], explode('?', $_SERVER["REQUEST_URI"])[0]);


