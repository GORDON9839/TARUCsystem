<?php
//////////////////////////////
//Author: Tan Haw Man
//Author Student ID: 18WMR08412
//////////////////////////////
namespace App\userClasses;

use App\campus;
use App\programme_list;

class Campusnameliststring
{
    public function getItem($id) {
        $proglists = programme_list::all();
        $matchcampusnamelist = array();
        foreach($proglists as $proglist) {
            if ($proglist->programme_id == $id) {
                $campus = campus::where('campus_id', $proglist->campus_id)->first();
                array_push($matchcampusnamelist, $campus->campus_name);
            }
        }
        return implode(", ", $matchcampusnamelist);
    }
}
