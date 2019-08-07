<?php
//////////////////////////////
//Author: Jack Soh Boon Keat
//Author Student ID: 18WMR08426
//////////////////////////////
namespace App\userClasses;

use App\structure;
use App\subject;

class Subjectnameliststring
{
    public function getItem($id) {
        $structures = structure::all();
        $matchsubjectnamelist = array();
        foreach($structures as $struc) {
            if ($struc->programme_id == $id) {
                $subject = subject::where('subject_id', $struc->subject_id)->first();
                array_push($matchsubjectnamelist, $subject->subject_name." (".$subject->credit_hour.")");
            }
        }
        return implode(", ", $matchsubjectnamelist);
    }
}
