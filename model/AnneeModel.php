<?php

namespace Model;

use Model\Database;

class AnneeModel
{
    private $idYear;
    private $libelle;
    private $status;
    private $database;
    public function __construct()
    {
        $this->idYear;
        $this->libelle;
        $this->status;
        $this->database = new Database();
    }
    public function all()
    {
        return $this->database->request('SELECT * FROM Year ORDER BY libelle ASC');
    }
    public function getYearByLibelle($lib)
    {
        return $this->database->request("SELECT * FROM Year WHERE libelle = '$lib'");
    }
    public function insert($an)
    {
        $annee = [$an];
        $requette = 'INSERT INTO Year (libelle) VALUES(?)';
        return $this->database->request($requette, $annee);
    }
    public function delete($id)
    {
        $requette = "DELETE FROM Year WHERE idYear = '$id'";
        return $this->database->request($requette);
    }
    public function update($libelle, $id)
    {
        $data = [$libelle, $id];
        $requette = "UPDATE Year SET libelle = ? WHERE idYear = ? ";
        return $this->database->request($requette, $data);
    }
    public function getYearById($id)
    {
        $requette = "SELECT libelle FROM Year WHERE idYear = '$id'";
        return $this->database->request($requette);
    }
    public function enable($id)
    {
        $requette = "UPDATE Year SET status = 'En cours' WHERE idYear = '$id'";
        return $this->database->request($requette);
    }
    public function disable()
    {
        $requette = "UPDATE Year SET status = 'Terminée'";
        return $this->database->request($requette);
    }
    public function getYearByStatus()
    {
        $requette = "SELECT idYear FROM Year WHERE status LIKE 'En cours'";
        return $this->database->request($requette);
    }
}
