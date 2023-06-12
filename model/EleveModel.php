<?php

namespace Model;

use Model\PersonneModel;

use Model\Database;

class EleveModel extends PersonneModel
{
    private $databse;
    public function __construct()
    {
        parent::__construct();
        $this->databse = new Database();
    }
    public function all()
    {
        return $this->databse->request('SELECT * FROM Student');
    }
    public function insert($data)
    {
        $sexe = $data['sexe'];
        $phone = $data['phone'];
        $type = $data['type'];
        $classe = $data['classe'];
        $dataArray = [$data['nom'], $data['prenom'], $data['date'], $data['lieu'], $data['numero'], $sexe, $type, $phone, $classe];
        $requette = 'INSERT INTO Student(nom, prenom, bornDay, placeDay, numero, sexe, type, phoneNumb, idClasseRoom)
                    VALUES(?, ?, ?, ?, ?, ?, ?, ?, ?)';
        return $this->databse->request($requette, $dataArray);
    }
    public function getStudent($id)
    {
        $requette = "SELECT nom, prenom, bornDay, sexe, type, photo, idClasseRoom FROM Student
                    JOIN Classe ON Classe.idClasse = Student.idClasseRoom
                    WHERE idClasse = $id";
        return $this->databse->request($requette);
    }
    public function getIdLastInsertid()
    {
        $requette = "SELECT LAST_INSERT_ID()";
        return $this->databse->request($requette);
    }
}
