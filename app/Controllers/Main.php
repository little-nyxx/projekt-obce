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
    var $data;
    var $okres;
    var $okresCely;
    

    public function __construct()
    {
        $this->kraj = new Kraj();
        $this->okres = new Okres();
        $this->data["kraj"] = $this->kraj->findAll();
    }
    public function index()
    {
        //
    }

    public function kraj()
    {
        $okresCely = $this->okres->select('okres.nazev, okres.kod')->join('kraj','kraj.kod = okres.kraj','inner')->where('kraj.nazev', 'Zlínský kraj')->findAll();
        $this->data["okresCely"] = $okresCely;
        echo view('kraj', $this->data);
    }
}
