<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;
use App\Models\Kraj;
use App\Models\AdresniMisto;
use App\Models\Obec;
use App\Models\Okres;

class Main extends BaseController

{
    var $kraj;

    public function __construct()
    {
        $this->kraj = new Kraj();
        $data["kraj"] = $this->kraj->findAll();
    }
    public function index()
    {
        //
    }

    public function kraj()
    {

        echo view('kraj');
    }
}
