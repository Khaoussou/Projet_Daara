<?php

namespace Model;

use Model\Database;

class GroupeDisciplineModel
{
    private $database;
    public function __construct()
    {
        $this->database = new Database();
    }
    public function getDiscpGroup()
    {
        $requette = "SELECT * FROM GroupeDiscipline";
        return $this->database->request($requette);
    }
    public function insert($data)
    {
        $dataArray = [$data];
        $requette = "INSERT INTO GroupeDiscipline (libelleGroupe) VALUE(?)";
        return $this->database->request($requette, $dataArray);
    }
    public function findDissipGroup($lib)
    {
        $requette = "SELECT * FROM GroupeDiscipline WHERE libelleGroupe like ? ";
        return $this->database->request($requette, [$lib]);
    }
}
