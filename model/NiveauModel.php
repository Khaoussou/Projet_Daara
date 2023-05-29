<?php

namespace Model;

use Model\Database;

class NiveauModel
{
    private $idNiveau;
    private $nomNiveau;
    private $database;
    public function __construct()
    {
        $this->idNiveau;
        $this->nomNiveau;
        $this->database = new Database();
    }
    public function all()
    {
        return $this->database->request("SELECT * FROM Niveau");
    }
    public function getNiveauByName($name)
    {
        return $this->database->request("SELECT * FROM Niveau WHERE nomNiveau like '$name'");
    }
    public function insert($level)
    {
        $dataArray = [$level["idGroupeNiveau"], $level["nomNiveau"]];
        $requette = 'INSERT INTO Niveau(idNiveauGroupe, nomNiveau) VALUES(?, ?)';
        return $this->database->request($requette, $dataArray);
    }
}
