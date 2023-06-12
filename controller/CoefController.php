<?php

namespace Controller;

session_start();

use Model\DisciplineModel;

class CoefController
{
    private $model;
    public function __construct()
    {
        $this->model = new DisciplineModel();
    }
    public function getDissip($id)
    {
        $_SESSION['coeffid'] = $id;
        $subject = $this->model->getSubjectByClass($id);
        require_once('../vue/dissipCoef.html.php');
    }
    public function delete($id)
    {
        $idClasse = $_SESSION['coeffid'];
        $this->model->deleteSubject($idClasse, $id);
        header("Location:" . LINK . "discipline/coef/$idClasse");
    }
    public function update($id)
    {
        $nRess = $_POST['nRess'];
        $nExam = $_POST['nExam'];
        $idClasse = $_SESSION['coeffid'];
        $this->model->updateNote($id, $idClasse, $nRess, $nExam);
        header("Location:" . LINK . "discipline/coef/$idClasse");
    }
}
