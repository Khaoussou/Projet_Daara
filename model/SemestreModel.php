<?php

namespace Model;

use Model\Database;

class SemestreModel
{
    private $database;
    public function __construct()
    {
        $this->database = new Database();
    }
    public function all()
    {
        return $this->database->request("SELECT * FROM Semestre");
    }
}
