<?php
//////////////////////////////
//Author: Jack Soh Boon Keat
//Author Student ID: 18WMR08426
//////////////////////////////
namespace App\userClasses;

use App\level_of_study;

class Levos
{
    public function getItem($id) {
        $levos = level_of_study::where('level_of_study_id', $id)->first();
        return $levos;
    }
}
