<?php

namespace Model;

use Model\Database;

class GroupeNiveauModel
{
    private $idGroupeNiveau;
    private $type;
    private $database;
    public function __construct()
    {
        $this->idGroupeNiveau;
        $this->type;
        $this->database = new Database();
    }
    public function getGroupeNiveauById($id)
    {
        return $this->database->request("SELECT * FROM GroupeNiveau WHERE idGroupeNiveau = $id");
    }
    public function all()
    {
        return $this->database->request("SELECT * FROM GroupeNiveau");
    }
    public function insert($data)
    {
        $dataArray = [$data];
        $requette = "INSERT INTO GroupeNiveau (libelle) VALUES(?)";
        return $this->database->request($requette, $dataArray);
    }
}
