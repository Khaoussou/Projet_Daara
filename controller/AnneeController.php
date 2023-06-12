<?php

namespace Controller;

use Model\AnneeModel;

session_start();

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
        $annee = explode('-', $lib);
        $existLibelle = $this->anModel->getYearByLibelle($lib);
        if (strlen($annee[0]) === 4 && strlen($annee[1]) === 4 && ((intval($annee[1]) - intval($annee[0])) == 1)) {
            if (!$existLibelle) {
                $this->anModel->insert($lib);
            } else {
                $_SESSION['error'] = "Veuillez revoir l'année svp !";
            }
        }

        header("Location:" . LINK . "listean");
    }
    public function deleteYear($an)
    {
        if (isset($an)) {
            $this->anModel->delete($an);
        }

        header("Location:" . LINK . "listean");
    }
    public function updateYear()
    {
        $an = $_POST['an'];
        $id = $_POST['id'];
        if (isset($an)) {
            $this->anModel->update($an, $id);
        }

        header("Location:" . LINK . "listean");
    }
    public function enableYear($id)
    {
        if (isset($id)) {
            $this->anModel->disable();
            $this->anModel->enable($id);
        }
        session_start();
        $_SESSION['year'] = $this->anModel->getYearById($id);
        header("Location:" . LINK . "listean");
        require_once('../vue/home.html.php');
    }
}
