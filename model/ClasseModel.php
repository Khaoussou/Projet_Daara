<?php

namespace Model;

use Model\Database;

class ClasseModel
{
    private $idClasse;
    private $nomClasse;
    private $effectif;
    private $database;
    public function __construct()
    {
        $this->idClasse;
        $this->nomClasse;
        $this->effectif;
        $this->database = new Database();
    }
    public function getClasseByNiveau($idLevel)
    {
        $requette = "SELECT nomClasse, effectif FROM Niveau
                    JOIN Classe ON Classe.idClasseNiveau = Niveau.idNiveau
                    WHERE idNiveau = '$idLevel'";
        return $this->database->request($requette);
    }
    public function getClasseByGroupLevel($idLevelGroup)
    {
        $requette = " SELECT nomClasse, effectif, idClasse FROM Classe
                    JOIN Niveau ON Niveau.idNiveau = Classe.`idClasseNiveau`
                    JOIN GroupeNiveau ON GroupeNiveau.idGroupeNiveau = Niveau.idNiveauGroupe
                    WHERE idGroupeNiveau = '$idLevelGroup'
                    ORDER BY nomClasse ASC";
        return $this->database->request($requette);
    }
    public function insert($data)
    {
        $classeData = [$data['nom'], $data['effectif'], $data['idLevel']];
        $requette = "INSERT INTO Classe (nomClasse, effectif, idClasseNiveau) VALUES(?, ?, ?)";
        return $this->database->request($requette, $classeData);
    }
    public function getIdLevelBylibelle($level)
    {
        $requette = "SELECT idNiveau FROM Niveau WHERE nomNiveau LIKE '$level'";
        return $this->database->request($requette);
    }

}
