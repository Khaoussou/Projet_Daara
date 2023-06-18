<?php

namespace Controller;

session_start();

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
    public function getClasse($id)
    {
        $classes = $this->classeModel->getClasseByGroupLevel($id);
        $req = json_encode($classes);
        echo $req;
    }
    public function findClass($id)
    {
        $_SESSION['idlevelgroup'] = $id;
        $classes = $this->classeModel->getClasseByGroupLevel($id);
        require_once('../vue/classe.html.php');
    }
    public function insertClasse()
    {
        $nomClasse = $_POST['nom'];
        $nom = explode(" ", $nomClasse);
        $effectif = $_POST['effectif'];
        $idLevel = $this->classeModel->getIdLevelBylibelle($nom[0]);
        $level = ($idLevel[0]["idNiveau"]);
        $classExist = $this->classeModel->findClasse($nomClasse);
        if (!$classExist) {
            $this->classeModel->insert([
                "nom" => $nomClasse,
                "effectif" => $effectif,
                "idLevel" => $level
            ]);
            $_SESSION['idgrouplevel'] = $this->levelModel->getIdbGroupLevel($level)[0]['idNiveauGroupe'];
            $idgrouplevel = $_SESSION['idgrouplevel'];
            header("Location:" . LINK . "niveau/classeroom/$idgrouplevel");
        } else {
            $_SESSION['ClasseExist'] = 'Cette classe existe deja !';
            header("Location:" . LINK . "form");
        }
    }
}
