<?php


namespace App;

require_once 'prog.php';

use SplSubject;
use SplObserver;

class proglistObserver  implements SplObserver
{
    private $programme_id,$sub;
    function __construct($sub) {
        $this->sub = $sub;
        $this->sub->attach($this);
    }

    public function update(SplSubject $subject) {
        $this->programme_id = $subject->getProg_id();
        programme_list::where('programme_id',$this->programme_id)->delete();


    }
}
