<?php
//////////////////////////////
//Author: Jack Soh Boon Keat
//Author Student ID: 18WMR08426
//////////////////////////////
namespace App\userClasses;

use App\faculty;

class Fac
{
    public function getItem($id) {
        $fac = faculty::where('faculty_id', $id)->first();
        return $fac;
    }
}
