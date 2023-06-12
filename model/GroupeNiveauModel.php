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
    public function findGroup($nom)
    {
        return $this->database->request("SELECT libelle FROM GroupeNiveau WHERE libelle like '$nom'");
    }
    public function insert($data)
    {
        $dataArray = [$data];
        $requette = "INSERT INTO GroupeNiveau (libelle) VALUES(?)";
        return $this->database->request($requette, $dataArray);
    }
    public function getIdLastInsertid()
    {
        $requette = "SELECT LAST_INSERT_ID()";
        return $this->database->request($requette);
    }
}
