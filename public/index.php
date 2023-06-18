<?php

require_once('../vendor/autoload.php');

use Router\Route;

define("LINK", "http://localhost:8080/");

$router = new Route();
$router->addRoute('GET', '/', 'Controller\Controller', 'connect');
$router->addRoute('GET', '/disconnect', 'Controller\Controller', 'disconnect');
$router->addRoute('POST', '/login', 'Controller\Controller', 'connexion');
$router->addRoute('GET', '/save', 'Controller\Controller', 'save');
$router->addRoute('GET', '/addstudent', 'Controller\Controller', 'addstudent');
// $router->addRoute('GET', '/coef', 'Controller\Controller', 'getCoefDissip');
$router->addRoute('GET', '/lister', 'Controller\EleveController', 'getStudent');
$router->addRoute('GET', '/classe/student/:id', 'Controller\EleveController', 'getStudentByClasse');
$router->addRoute('POST', '/classe/note', 'Controller\EleveController', 'getNoteMax');
$router->addRoute('POST', '/add', 'Controller\EleveController', 'insertStudent');
$router->addRoute('GET', '/niveau', 'Controller\GroupeNiveauController', 'getLevelGroup');
$router->addRoute('POST', '/insertlevelGroup', 'Controller\GroupeNiveauController', 'insertLevelGroup');
// $router->addRoute('GET', '/addlevel', 'Controller\Controller', 'addlevel');
$router->addRoute('POST', '/addLevel', 'Controller\NiveauController', 'insertLevel');
$router->addRoute('GET', '/listean', 'Controller\AnneeController', 'getYear');
$router->addRoute('POST', '/addan', 'Controller\AnneeController', 'insertYear');
$router->addRoute('GET', '/delete', 'Controller\AnneeController', 'deleteYear');
$router->addRoute('GET', '/modiff/:id', 'Controller\Controller', 'update');
$router->addRoute('POST', '/update/:id', 'Controller\AnneeController', 'updateYear');
$router->addRoute('GET', '/active/:id', 'Controller\AnneeController', 'enableYear');
$router->addRoute('GET', '/classe/:id', 'Controller\ClasseController', 'getClasse');
$router->addRoute('GET', '/niveau/classeroom/:id', 'Controller\ClasseController', 'findClass');
$router->addRoute('GET', '/form', 'Controller\Controller', 'formclasse');
$router->addRoute('POST', '/addClasse', 'Controller\ClasseController', 'insertClasse');
$router->addRoute('GET', '/discipline', 'Controller\DisciplineController', 'level');
$router->addRoute('GET', '/discip/:id', 'Controller\DisciplineController', 'getDiscipline');
$router->addRoute('POST', '/addDiscipline', 'Controller\DisciplineController', 'addDiscip');
$router->addRoute('POST', '/addGroupDiscipline', 'Controller\DisciplineController', 'addGroupDiscip');
$router->addRoute('POST', '/remove', 'Controller\DisciplineController', 'remove');
$router->addRoute('GET', '/coef/ponderation/:id', 'Controller\CoefController', 'getDissip');
$router->addRoute('GET', '/supp/:id', 'Controller\CoefController', 'delete');
$router->addRoute('POST', '/updateNote', 'Controller\CoefController', 'updateNote');
$router->treatRequest($_SERVER["REQUEST_METHOD"], $_SERVER['REQUEST_URI']);
