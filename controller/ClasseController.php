<?php

namespace Controller;

use Model\ClasseModel;

use Model\NiveauModel;

class ClasseController
{
    private $classeModel;
    private $levelModel;
    public function __construct()
    {
        $this->classeModel = new ClasseModel();
        $this->levelModel = new NiveauModel();
    }
    public function getClasse()
    {
        $id = $_GET['id'];
        $classes = $this->classeModel->getClasseByGroupLevel($id);
        require_once('../vue/classe.html.php');
    }
    public function insertClasse()
    {
        $nomClasse = $_POST['nom'];
        $nom = explode(" ", $nomClasse);
        $effectif = $_POST['effectif'];
        // echo($nom[0]);
        $idLevel = $this->classeModel->getIdLevelBylibelle($nom[0]);
        $level = ($idLevel[0]["idNiveau"]);
        // array(1) {
        //     ["idNiveau"]=>
        //     int(26)
        //   }

        $this->classeModel->insert([
            "nom" => $nomClasse,
            "effectif" => $effectif,
            "idLevel" => $level
        ]);
        header("Location:http://localhost:8080/classe");
    }
}














