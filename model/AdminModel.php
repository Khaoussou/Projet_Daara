<?php

namespace Model;

use Model\PersonneModel;

use Model\Database;

class AdminModel extends PersonneModel
{
    private $database;
    public function __construct()
    {
        parent::__construct();
        $this->database = new Database();
    }
    public function all()
    {
        return $this->database->request('SELECT * FROM Personne WHERE type = "EleveInterne" OR type = "EleveExterne"');
    }
    public function insert($data)
    {
        $dataArray = [$data['nom'],$data['prenom'],$data['adresse'],$data['type']];
        $requette = 'INSERT INTO Personne(nom, prenom, adresse, type) VALUES(?, ?, ?, ?)';
        return $this->database->request($requette, $dataArray);
    }
    public function lastInsertStudent()
    {
        return $this->database->request('SELECT * FROM Personne WHERE idPersonne = LAST_INSERT_ID()');
    }
}
