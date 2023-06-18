<?php

namespace Controller;

session_start();

use Model\ClasseModel;
use Model\DisciplineModel;

class CoefController
{
    private $model;
    private $classe;
    public function __construct()
    {
        $this->model = new DisciplineModel();
        $this->classe = new ClasseModel();
    }
    public function getDissip($id)
    {
        $_SESSION['coeffid'] = $id;
        $idClasse = $id;
        $subject = $this->model->getSubjectByClass($id);
        $nom = $this->classe->getNameById($id)[0]["nomClasse"];
        require_once('../vue/dissipCoef.html.php');
    }
    public function delete($id)
    {
        $idClasse = $_SESSION['coeffid'];
        $this->model->deleteSubject($idClasse, $id);
        header("Location:" . LINK . "coef/ponderation/$idClasse");
    }
    public function updateNote()
    {
        $data = file_get_contents('php://input');
        $dataDecode = json_decode($data);
        $idClasse = $dataDecode->idClasse;
        $idDisip = $dataDecode->idDissip;
        $nResExist = $this->model->getNoteR($idClasse, $idDisip)[0]["Ressource"];
        $nExamExist = $this->model->getNoteE($idClasse, $idDisip)[0]["Examen"];
        $nRess = $dataDecode->valueR ?? $nResExist;
        $nExam = $dataDecode->valueE ?? $nExamExist;
        $this->model->updateNote($nRess, $nExam, $idClasse, $idDisip);
    }
}
