<?php

namespace Controller;

session_start();

use Model\GroupeNiveauModel;

use Model\EleveModel;

use Model\InscriptionModel;

use Model\NiveauModel;

use Model\ClasseModel;

use Model\AnneeModel;

use Model\DisciplineModel;

use Model\SemestreModel;

class EleveController
{
    private $eleveModel;
    private $inscritModel;
    private $levelModel;
    private $groupLevelModel;
    private $classeModel;
    private $anModel;
    private $discipModel;
    private $semes;

    public function __construct()
    {
        $this->eleveModel = new EleveModel();
        $this->inscritModel = new InscriptionModel();
        $this->levelModel = new NiveauModel();
        $this->groupLevelModel = new GroupeNiveauModel();
        $this->classeModel = new ClasseModel();
        $this->anModel = new AnneeModel();
        $this->discipModel = new DisciplineModel();
        $this->semes = new SemestreModel();
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
        $numb = $_POST["numero"];
        if ($numb == 0 || $numb == null || $numb == 'undefined' || $numb = "") {
            $numb = null;
        } else {
            $numb = $_POST["numero"];
        }
        $this->eleveModel->insert([
            "nom" => $_POST["nom"],
            "prenom" => $_POST["prenom"],
            "date" => $_POST["date"],
            "lieu" => $_POST["lieu"],
            "numero" => $numb,
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
        $idGroupe = null;
        $groupLevel = $this->groupLevelModel->all();
        $eleve = $this->eleveModel->getStudent($id);
        $discClass = $this->discipModel->getSubjectByClass($id);
        $semestre = $this->semes->all();
        $_SESSION['id'] = $id;
        $nom = $this->classeModel->getNameById($_SESSION["id"])[0]["nomClasse"];
        require_once('../vue/lister.html.php');
    }
    public function getNoteMax()
    {
        $data = file_get_contents('php://input');
        $dataDecode = json_decode($data, true);
        $idDissip = $dataDecode['idDissip'];
        $idClasse = $dataDecode['idClasse'];
        $note = $this->discipModel->getNote($idClasse, $idDissip);
        echo json_encode($note);
    }
}
