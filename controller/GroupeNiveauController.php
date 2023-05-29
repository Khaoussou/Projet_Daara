<?php

namespace Controller;

use Model\GroupeNiveauModel;

class GroupeNiveauController
{
    private $groupeLevel;
    public function __construct()
    {
        $this->groupeLevel = new GroupeNiveauModel();
    }
    public function getLevelGroup()
    {
        $level = $this->groupeLevel->all();
        require_once('../vue/levelGroupe.html.php');
    }
    public function insertLevelGroup()
    {
        $nom = $_POST['nomGroupeNiveau'];
        $save = $_POST['save'];
        $this->groupeLevel->insert($nom);
        header("Location:http://localhost:8080/level");
    }
}

