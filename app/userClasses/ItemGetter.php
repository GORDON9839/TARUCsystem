<?php
//////////////////////////////
//Author: Jack Soh Boon Keat
//Author Student ID: 18WMR08426
//////////////////////////////
namespace App\userClasses;

class ItemGetter
{
    protected $prog;
    protected $fac;
    protected $levos;
    protected $campusnameliststring;
    protected $subjectnameliststring;

    public function __construct() {
        $this->prog = new Prog();
        $this->fac = new Fac();
        $this->levos = new Levos();
        $this->campusnameliststring = new Campusnameliststring();
        $this->subjectnameliststring = new Subjectnameliststring();
    }

    public function getProg($id){
        return $this->prog->getItem($id);
    }
    public function getFac($id){
        return $this->fac->getItem($id);
    }
    public function getLevos($id){
        return $this->levos->getItem($id);
    }
    public function getCampusnameliststring($id){
        return $this->campusnameliststring->getItem($id);
    }
    public function getSubjectnameliststring($id){
        return $this->subjectnameliststring->getItem($id);
    }
}
