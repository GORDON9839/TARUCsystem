<?php

namespace App\Http\Controllers;

use App\programme;
use App\structure;
use Illuminate\Http\Request;

class allstructureController extends Controller
{
    public function index(Request $request)
    {

        $request->user()->authorizeRoles(['admin','staff']);
        $request->user()->authorizeType(['faculty']);
        $structure = structure::all();

        $xmls = new \DOMDocument("1.0","UTF-8");
        $xmls->formatOutput=true;
        $xmlsubject=$xmls->createElement('programme_structure');
        foreach($structure as $struc){
            $xmlstruc=$xmls->createElement('structure');
            $xmlprogid=$xmls->createElement('programme_id',$struc->programme_id);
            $xmlsubid=$xmls->createElement('subject_id',$struc->subject_id);
            $xmlstruc->appendChild($xmlprogid);
            $xmlstruc->appendChild($xmlsubid);
            $xmlsubject->appendChild($xmlstruc);
        }
        $xmls->appendChild($xmlsubject);
        $xmls->save("/xampp/htdocs/TARUCsystem/resources/views/XML/programme_structure.xml");
        return view('faculty/programme_structure');


    }
}
