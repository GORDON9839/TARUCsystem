<?php

namespace App\userClasses;

use App\programme;

class Prog
{
    public function getItem($id) {
        $prog = programme::where('programme_id', $id)->first();
        return $prog;
    }
}
