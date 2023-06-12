<?php

namespace Controller;

session_start();

use Model\Database;

use Model\Model;

use Model\AnneeModel;

use Controller\SessionController;

class Controller
{
    private $database;
    private $model;
    private $anModel;
    public function __construct()
    {
        $this->database = new Database();
        $this->model = new Model();
        $this->anModel = new AnneeModel();
    }
    public function connect()
    {
        require_once('../vue/connexion.html.php');
    }
    public function formclasse()
    {
        require_once('../vue/addclasse.html.php');
    }
    public function save()
    {
        require_once('../vue/save.html.php');
    }
    public function addstudent()
    {
        require_once('../vue/addstudent.html.php');
    }
    public function update($id)
    {
        $libs = $this->anModel->getYearById($id);
        require_once('../vue/updateyear.html.php');
    }
    public function connexion()
    {
        $numb = $_POST["numb"];
        $password = $_POST["password"];
        $autoriser = $_POST["autoriser"];
        if (isset($autoriser)) {
            if ($this->model->correctLogin($numb, $password)) {
                $_SESSION["username"] = $numb;
                header("Location:" . LINK . "niveau");
            } else {
                header("Location:" . LINK);
            }
        }
    }
    public function disconnect()
    {
        SessionController::destroySession();
        header("Location:" . LINK);
    }
}
