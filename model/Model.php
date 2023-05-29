<?php

namespace Model;

use Model\Database;

class Model
{
    private $databse;
    public function __construct()
    {
        $this->databse = new Database();
    }
    public function correctLogin($login, $password)
    {
        $dataUser = $this->databse->request("SELECT * FROM AdminConnexion WHERE login = '$login' AND password = '$password'");
        if (empty($dataUser)) {
            return false;
        }
        return true;
    }
}

