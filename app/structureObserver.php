<?php

//////////////////////////////
//Author: Goh Chun Lin
//Author Student ID: 18WMR08314
//////////////////////////////
namespace App;


require_once 'prog.php';

use SplSubject;
use SplObserver;

class structureObserver implements SplObserver
{
    private $programme_id,$sub;
    function __construct($sub) {
        $this->sub = $sub;
        $this->sub->attach($this);
    }

    public function update(SplSubject $subject) {
        $this->programme_id = $subject->getProg_id();

        structure::where('programme_id',$this->programme_id)->delete();

    }
}
