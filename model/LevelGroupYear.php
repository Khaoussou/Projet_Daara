<?php

namespace Model;

use Model\Database;

use Model\AnneeModel;

use Model\GroupeNiveauModel;

class LevelGroupYear
{
    private $database;
    private $anModel;
    private $levelGroup;
    public function __construct()
    {
        $this->database = new Database();
        $this->anModel = new AnneeModel();
        $this->levelGroup = new GroupeNiveauModel();
    }
    public function insert($data)
    {
        $dataArray = [$data['idan'], $data['idGroupLevel']];
        $requette = "INSERT INTO LevelGroupYear (idGroupLevel, idAnnee) VALUES (?, ?)";
        return $this->database->request($requette, $dataArray);
    }
}
