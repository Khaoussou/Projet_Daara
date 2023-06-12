<?php

namespace Controller;

use Model\AdminModel;

class AdminController
{
    private $adminModel;
    public function __construct()
    {
        $this->adminModel = new AdminModel();
    }
    public function getStudent()
    {
        $results = $this-> adminModel->all();
        require_once('../vue/lister.html.php');
    }
    public function getLastStudent()
    {
        $results = $this-> adminModel->lastInsertStudent();
        require_once('../vue/lister.html.php');
    }
}

