<?php

namespace Model;

use Model\Database;

class InscriptionModel
{
    private $database;
    private $idInscription;
    private $idClasse;
    private $idYear;
    private $idStudent;
    public function __construct()
    {
        $this->database = new Database();
        $this->idInscription;
        $this->idClasse;
        $this->idYear;
        $this->idStudent;
    }
    public function all()
    {
        # code...
    }
    public function insertNewStudent($data)
    {
        $studentData = [$data["idYear"], $data["idClasse"], $data["idStudent"]];
        $requette = "INSERT INTO Inscription (idCurrentYear, idStudentClasse, idStudent) VALUES (?, ?, ?)";
        return $this->database->request($requette, $studentData);
    }
}
