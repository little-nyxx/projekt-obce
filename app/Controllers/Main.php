<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;
use App\Models\Kraj;
use App\Models\AdresniMisto;
use App\Models\Obec;
use App\Models\Okres;
use App\Models\CastObce;

class Main extends BaseController

{
    var $kraj;
    var $data;
    var $okres;
    var $okresCely;
    var $obec;
    var $cast_obce;
    var $adresni_misto;
    var $strankovani;
    

    public function __construct()
    {
        $this->kraj = new Kraj();
        $this->okres = new Okres();
        $this->obec = new Obec();
        $this->cast_obce = new CastObce();
        $this->adresni_misto = new AdresniMisto();
        $this->data["kraj"] = $this->kraj->findAll();
        $this->okresCely = $this->okres->select('okres.nazev, okres.kod')->join('kraj','kraj.kod = okres.kraj','inner')->where('kraj.nazev', 'Zlínský kraj')->findAll();
        $this->data["okresCely"] = $this->okresCely;
        $this->data["okres"] = $this->okres->where("kraj", "141")->orderBy('nazev', 'asc')->findAll();
    }
    public function index()
    {
        //
    }

    public function kraj()
    {
       
        echo view('kraj', $this->data);
    }

    public function okres($kod, $strankovani) {
        #$okresCely = $this->okres->select('okres.nazev, okres.kod')->join('kraj','kraj.kod = okres.kraj','inner')->where('kraj.nazev', 'Zlínský kraj')->findAll();
        #$this->data["okresCely"] = $okresCely;
        #$this->data['okres'] = $this->okres->find($okres);

        
        $adresniMista = $this->obec->select('obec.nazev, Count(*) as pocetMist')->where('okres', $kod)->join('cast_obce', 'cast_obce.obec = obec.kod', 'inner')
        ->join('ulice', 'ulice.cast_obce = cast_obce.kod', 'inner')->join('adresni_misto', 'adresni_misto.ulice = ulice.kod', 'inner')->where('obec.okres', $kod)->groupBy('obec.kod')->orderBy('pocetMist', "desc")->paginate(20);
        $this->data['adresniMista'] = $adresniMista;
        $this->data['pager'] = $this->obec->pager;
        $okres = $this->okres->find($kod);
        $this->data['okres'] = $okres;
        $this->data['strankovani'] = $strankovani;

        echo view('okres', $this->data);
    }
}
