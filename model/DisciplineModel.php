<?php

namespace Model;

use Model\Database;

class DisciplineModel
{
    private $database;
    public function __construct()
    {
        $this->database = new Database();
    }
    public function getSubjectByClass($idclasse)
    {
        $requette = "SELECT * FROM Discipline
                    JOIN ClasseDiscip ON ClasseDiscip.idDissip = Discipline.idDiscipline
                    WHERE idClassDissip = '$idclasse' ORDER BY libelleDiscipline ASC";
        return $this->database->request($requette);
    }
    public function insertDiscip($data)
    {
        $dataArray = [$data['nomDiscip'], $data['code'], $data['iddiscip']];
        $requette = "INSERT INTO Discipline (libelleDiscipline, code, idDiscipGroup) VALUES (?,?,?)";
        return $this->database->request($requette, $dataArray);
    }
    public function insertClassDiscip($data)
    {
        $dataArray = [$data['idClass'], $data['idDissip']];
        $requette = "INSERT INTO ClasseDiscip (idClassDissip, idDissip) VALUES (?,?)";
        return $this->database->request($requette, $dataArray);
    }
    public function getIdLastInsertid()
    {
        $requette = "SELECT LAST_INSERT_ID()";
        return $this->database->request($requette);
    }
    public function findByLibele($libele)
    {
        $requette = "SELECT libelleDiscipline FROM Discipline WHERE libelleDiscipline like '$libele'";
        return $this->database->request($requette);
    }
    public function getIdByLibele($libele)
    {
        $requette = "SELECT idDiscipline FROM Discipline WHERE libelleDiscipline like '$libele'";
        return $this->database->request($requette);
    }
    public function findDissipClass($idClasse, $idDiss)
    {
        $requette = "SELECT * FROM ClasseDiscip WHERE idClassDissip like '$idClasse' AND idDissip like '$idDiss'";
        return $this->database->request($requette);
    }
    public function deleteSubject($idClasse, $idDiss)
    {
        $requette = "DELETE FROM ClasseDiscip WHERE idClassDissip like '$idClasse' AND idDissip like '$idDiss'";
        return $this->database->request($requette);
    }
    public function getCodeByCode($code)
    {
        $requette = "SELECT code FROM Discipline WHERE code like ?";
        return $this->database->request($requette, [$code]);
    }
    public function updateNote($valueR, $valueE, $idClasse, $idDissip)
    {
        $data = [$valueR, $valueE,  $idClasse, $idDissip];
        $requette = "UPDATE ClasseDiscip SET Ressource = ?, Examen = ? WHERE idClassDissip = ? AND idDissip = ?";
        return $this->database->request($requette, $data);
    }
    public function getNoteR($idClasse, $idDissip)
    {
        $data = [$idClasse, $idDissip];
        $requette = "SELECT Ressource FROM ClasseDiscip WHERE idClassDissip = ? AND idDissip = ?";
        return $this->database->request($requette, $data);
    }
    public function getNoteE($idClasse, $idDissip)
    {
        $data = [$idClasse, $idDissip];
        $requette = "SELECT Examen FROM ClasseDiscip WHERE idClassDissip = ? AND idDissip = ?";
        return $this->database->request($requette, $data);
    }
    public function getNote($idClasse, $idDissip)
    {
        $data = [$idClasse, $idDissip];
        $requette = "SELECT * FROM ClasseDiscip WHERE idClassDissip = ? AND idDissip = ?";
        return $this->database->request($requette, $data);
    }
}
