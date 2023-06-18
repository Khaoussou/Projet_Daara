<?php

namespace Controller;

use Model\GroupeNiveauModel;

session_start();

use Model\NiveauModel;

class GroupeNiveauController
{
    private $groupeLevel;
    private $niveauModel;
    public function __construct()
    {
        $this->groupeLevel = new GroupeNiveauModel();
        $this->niveauModel = new NiveauModel();
    }
    public function getLevelGroup()
    {
        $level = $this->groupeLevel->all();
        require_once('../vue/levelGroupe.html.php');
    }
    public function insertLevelGroup()
    {
        $nom = $_POST['nomGroupeNiveau'];
        // $save = $_POST['save'];
        $nomExist = $this->groupeLevel->findGroup($nom);
        if (!$nomExist) {
            $this->groupeLevel->insert($nom);
            $currentLvelGroup =  $this->groupeLevel->getIdLastInsertid()[0]["LAST_INSERT_ID()"];
            $this->niveauModel->insert(["idGroupeNiveau" => $currentLvelGroup, "nomNiveau" => $nom]);
            header("Location:" . LINK . "niveau");
        } else {
            $_SESSION['groupExist'] = "Ce nivieau existe deja ! ";
            header("Location:" . LINK . "niveau");
        }
    }
}
