<?php

namespace Controller;

use Model\AnneeModel;

class AnneeController
{
    private $anModel;

    public function __construct()
    {
        $this->anModel = new AnneeModel();
    }
    public function getYear()
    {
        $results = $this->anModel->all();
        require_once('../vue/annee.html.php');
    }
    public function insertYear()
    {
        $lib = $_POST["libelle"];
        echo $lib;
        $annee = explode('-', $lib);
        $existLibelle = $this->anModel->getYearByLibelle($lib);
        if (strlen($annee[0]) === 4 && strlen($annee[1]) === 4 && ((intval($annee[1]) - intval($annee[0])) == 1)) {
            if (!$existLibelle) {
                $this->anModel->insert($lib);
            }
        }else {

            $_SESSION['Verififier les informations'];
        }

        header("Location:http://localhost:8080/listean");
    }
    public function deleteYear()
    {
        $an = $_GET['id'];
        if (isset($an)) {
            $this->anModel->delete($an);
        }

        header("Location:http://localhost:8080/listean");
    }
    public function updateYear()
    {
        $an = $_POST['an'];
        $id = $_POST['id'];
        if (isset($an)) {
            $this->anModel->update($an, $id);
        }

        header("Location:http://localhost:8080/listean");
    }
    public function enableYear()
    {
        $id = $_GET['id'];
        if (isset($id)) {
            $this->anModel->disable();
            $this->anModel->enable($id);
            
        }
        session_start();
        $_SESSION['year'] = $this->anModel->getYearById($id);
        header("Location:http://localhost:8080/listean");
        require_once('../vue/home.html.php');
    }
}
