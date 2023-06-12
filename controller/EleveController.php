<?php

namespace Controller;

session_start();

use Model\EleveModel;

use Model\InscriptionModel;

use Model\NiveauModel;

use Model\ClasseModel;

use Model\AnneeModel;

class EleveController
{
    private $eleveModel;
    private $inscritModel;
    private $levelModel;
    private $classeModel;
    private $anModel;

    public function __construct()
    {
        $this->eleveModel = new EleveModel();
        $this->inscritModel = new InscriptionModel();
        $this->levelModel = new NiveauModel();
        $this->classeModel = new ClasseModel();
        $this->anModel = new AnneeModel();
    }
    public function getStudent()
    {
        $students = $this->eleveModel->all();
        $results = $this->levelModel->all();
        require_once('../vue/listeApprenant.html.php');
    }
    public function insertStudent()
    {
        $currentYear =  $this->anModel->getYearByStatus()[0]['idYear'];
        $this->eleveModel->insert([
            "nom" => $_POST["nom"],
            "prenom" => $_POST["prenom"],
            "date" => $_POST["date"],
            "lieu" => $_POST["lieu"],
            "numero" => $_POST["numero"],
            "sexe" => $_POST["sexe"],
            "type" => $_POST["type"],
            "phone" => $_POST["phone"],
            "classe" => $_SESSION["id"]
        ]);
        $curretstudent =  $this->eleveModel->getIdLastInsertid()[0]["LAST_INSERT_ID()"];

        $this->inscritModel->insertNewStudent([
            "idYear" => $currentYear,
            "idClasse" => $_SESSION["id"],
            "idStudent" => $curretstudent
        ]);

        $idclasse = $_SESSION["id"];
        $_SESSION['Message'] = "Eleve inscrit avec succes !!!";
        header("Location:" . LINK . "classe/student/$idclasse");
    }
    public function getStudentByClasse($id)
    {
        $_SESSION['id'] = $id;
        $eleve = $this->eleveModel->getStudent($id);
        require_once('../vue/lister.html.php');
    }
}
