<?php

namespace Controller;

use Model\NiveauModel;

class NiveauController
{
    private $niveauModel;

    public function __construct()
    {
        $this->niveauModel = new NiveauModel();
    }
    public function getLevel()
    {
        $results =  $this->niveauModel->all();
        require_once('../vue/level.html.php');
    }
    public function insertLevel()
    {
        $nom = $_POST["nom"];
        $check = $this->niveauModel->getNiveauByName($nom);
        if (!empty($nom) && !$check) {
            $this->niveauModel->insert([
                "idGroupeNiveau" => $_POST["groupe"],
                "nomNiveau" => $nom
            ]);
        }
        header("Location:" . LINK . "level");
    }
}
