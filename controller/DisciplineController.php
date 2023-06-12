<?php

namespace Controller;

session_start();

use Model\DisciplineModel;

use Model\GroupeDisciplineModel;

use Model\GroupeNiveauModel;

class DisciplineController
{
    private $discipmodel;
    private $groupDiscip;
    private $groupeLevel;

    public function __construct()
    {
        $this->discipmodel = new DisciplineModel();
        $this->groupDiscip = new GroupeDisciplineModel();
        $this->groupeLevel = new GroupeNiveauModel();
    }
    public function level()
    {
        $level = $this->groupeLevel->all();
        $group = $this->groupDiscip->getDiscpGroup();
        require_once('../vue/disciplinesClasse.html.php');
    }
    public function getDiscipline($id)
    {
        $discipline = json_encode($this->discipmodel->getSubjectByClass($id));
        echo $discipline;
    }
    public function addDiscip()
    {
        $data = file_get_contents('php://input');
        $dataDecode = json_decode($data, true);
        $nom = $dataDecode['name'];
        $nomDissip = explode(" ", $nom);
        $id = $dataDecode['idGroup'];
        $idClasse = $dataDecode['idClasse'];
        $nomExist = $this->discipmodel->findByLibele($nom);
        $idDissip = $this->discipmodel->getIdByLibele($nom)[0]['idDiscipline'];
        $code = "";
        if (count($nomDissip) != 1) {
            foreach ($nomDissip as $name) {
                $code .= strtoupper(substr($name, 0, 1));
            }
            $codeExist = $this->discipmodel->getCodeByCode($code)[0]['code'];
        } else {
            $code = strtoupper(substr($nomDissip[0], 0, 3));
            $codeExist = $this->discipmodel->getCodeByCode($code)[0]['code'];
        }
        if (!$nomExist) {
            while ($codeExist === $code) {
                $code = $code . strtoupper(substr($nomDissip[count($nomDissip) - 1], strlen($codeExist), 1));
                $codeExist = $this->discipmodel->getCodeByCode($code)[0]['code'];
            }
            $this->discipmodel->insertDiscip([
                'nomDiscip' => $nom,
                'code' => $code,
                'iddiscip' => $id
            ]);
            $idDissip = $this->discipmodel->getIdLastInsertid()[0]["LAST_INSERT_ID()"];
            $this->discipmodel->insertClassDiscip([
                'idClass' => $idClasse,
                'idDissip' => $idDissip
            ]);
            $discipline = json_encode($this->discipmodel->getSubjectByClass($idClasse));
            echo $discipline;
        } elseif (!$this->discipmodel->findDissipClass($idClasse, $idDissip)) {
            $this->discipmodel->insertClassDiscip([
                'idClass' => $idClasse,
                'idDissip' => $idDissip
            ]);
            $discipline = json_encode($this->discipmodel->getSubjectByClass($idClasse));
            echo $discipline;
        } else {
            $_SESSION['disspexist'] = "Cette discipline existe deja dans cette classe !";
        }
    }
    public function remove()
    {
        $data = file_get_contents('php://input');
        $dataDecode = json_decode($data, true);
        $idClasse = $dataDecode['idClasse'];
        $idDissip = $dataDecode['idDissip'];
        $this->discipmodel->deleteSubject($idClasse, $idDissip);
        $discipline = json_encode($this->discipmodel->getSubjectByClass($idClasse));
        echo $discipline;
    }
    public function addGroupDiscip()
    {
        $data = file_get_contents('php://input');
        $dataDecode = json_decode($data, true);
        $nomGroup = $dataDecode['name'];
        $groupe = $this->groupDiscip->findDissipGroup($nomGroup);
        if (!$groupe) {
            $this->groupDiscip->insert($nomGroup);
            $group = $this->groupDiscip->findDissipGroup($nomGroup);
            // print_r($group);
            echo json_encode($group);

        }
    }
}
