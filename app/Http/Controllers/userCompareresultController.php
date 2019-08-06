<?php
//modified from userProgrammesController.php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\programme;
use App\faculty;
use App\level_of_study;
use App\campus;
use App\programme_list;
use mysql_xdevapi\Exception;

class userCompareresultController extends Controller
{
    public function index()
    {
        //generate programme XML
        $programmes = programme::all();

        $xmlp = new \DOMDocument("1.0", "UTF-8");
        $xmlp->formatOutput = true;
        $xmlprogrammes = $xmlp->createElement('userProgrammesList');
        foreach($programmes as $prog) {
            //$variable = $xmlp->createElement(nameUsedInXml, $prog->nameOfDatabaseField)
            $xmlprog = $xmlp->createElement('Programme');
            $xmlprogname = $xmlp->createElement('programme_name', $prog->programme_name);
            $xmlprogdesc = $xmlp->createElement('programme_desc', $prog->programme_desc);
            $xmlprogfduration = $xmlp->createElement('fulltime_duration', $prog->fulltime_duration);
            $xmlprogpduration = $xmlp->createElement('parttime_duration', $prog->parttime_duration);
            $xmlprogpc = $xmlp->createElement('profcer', $prog->professional_certification);
            $xmlMER_SPM = $xmlp->createElement('MER_SPM', $prog->MER_SPM);
            $xmlMER_STPM = $xmlp->createElement('MER_STPM', $prog->MER_STPM);
            $xmlMER_UEC = $xmlp->createElement('MER_UEC', $prog->MER_UEC);
            $xmlMER_desc = $xmlp->createElement('MER_desc', $prog->MER_desc);
            $level_of_study = level_of_study::where('level_of_study_id', $prog->level_of_study_id)->first();
            $xmllevel_of_studyname = $xmlp->createElement('level_of_study_name', $level_of_study->level_of_study_name);
            $faculty = faculty::where('faculty_id', $prog->faculty_id)->first();
            $xmlfacultyname = $xmlp->createElement('faculty_name', $faculty->faculty_name);
            $xmlprogfees = $xmlp->createElement('fees', $prog->fees);

            $xmlprog->setAttribute('programme_id', $prog->programme_id);
            $xmlprog->setAttribute('programme_code', $prog->programme_code);
            $xmlprog->appendChild($xmlprogname);
            $xmlprog->appendChild($xmlprogdesc);
            $xmlprog->appendChild($xmlprogfduration);
            $xmlprog->appendChild($xmlprogpduration);
            $xmlprog->appendChild($xmlprogpc);
            $xmlprog->appendChild($xmlMER_SPM);
            $xmlprog->appendChild($xmlMER_STPM);
            $xmlprog->appendChild($xmlMER_UEC);
            $xmlprog->appendChild($xmlMER_desc);
            $xmlprog->appendChild($xmllevel_of_studyname);
            $xmlprog->appendChild($xmlfacultyname);
            $xmlprog->appendChild($xmlprogfees);

            $xmlprogrammes->appendChild($xmlprog);
        }
        $xmlp->appendChild($xmlprogrammes);
        $xmlp->save("/xampp/htdocs/TARUCsystem/resources/views/XML/userProgramme.xml");

        //go to user_viewprogrammes
        return view('user/user_viewprogrammes');
    }

    public function store() {
        //assign values into session for displaying in view
        $cp_comparefirst = $_POST["comparefirst"];
        $cp_comparesecond = $_POST["comparesecond"];
        $cp_comparethird = $_POST["comparethird"];

        $prog1 = programme::where('programme_id', $cp_comparefirst)->first();
        $prog2 = programme::where('programme_id', $cp_comparesecond)->first();
        if ($cp_comparethird != "None") {
            $prog3 = programme::where('programme_id', $cp_comparethird)->first();
        } else {
            $prog3 = null;
        }

        $fac1 = faculty::where('faculty_id', $prog1->faculty_id)->first();
        $fac2 = faculty::where('faculty_id', $prog2->faculty_id)->first();
        if ($cp_comparethird != "None") {
            $fac3 = faculty::where('faculty_id', $prog3->faculty_id)->first();
        } else {
            $fac3 = null;
        }

        $levos1 = level_of_study::where('level_of_study_id', $prog1->level_of_study_id)->first();
        $levos2 = level_of_study::where('level_of_study_id', $prog2->level_of_study_id)->first();
        if ($cp_comparethird != "None") {
            $levos3 = level_of_study::where('level_of_study_id', $prog3->level_of_study_id)->first();
        } else {
            $levos3 = null;
        }

        $proglists = programme_list::all();
        $matchcampusnamelist1 = array();
        $matchcampusnamelist2 = array();
        $matchcampusnamelist3 = array();
        foreach($proglists as $proglist) {
            $campus = campus::where('campus_id', $proglist->campus_id)->first();
            if ($proglist->programme_id == $prog1->programme_id) {
                array_push($matchcampusnamelist1, $campus->campus_name);
            }
            if ($proglist->programme_id == $prog2->programme_id) {
                array_push($matchcampusnamelist2, $campus->campus_name);
            }
            if ($cp_comparethird != "None") {
                if ($proglist->programme_id == $prog3->programme_id) {
                    array_push($matchcampusnamelist3, $campus->campus_name);
                }
            }
        }

        $cam1 = implode(", ", $matchcampusnamelist1);
        $cam2 = implode(", ", $matchcampusnamelist2);
        if ($cp_comparethird != "None") {
            $cam3 = implode(", ", $matchcampusnamelist3);
        } else {
            $cam3 = null;
        }

        //go to user_compareresult
        return view('user/user_compareresult', compact('prog1', 'prog2', 'prog3', 'fac1', 'fac2', 'fac3', 'levos1', 'levos2', 'levos3', 'cam1', 'cam2', 'cam3'));
    }

    public function show($id)
    {
        $programmes = programme::where('programme_id', $id)->first();
        $faculty = faculty::where('faculty_id', $programmes->faculty_id)->first();
        $level_of_study = level_of_study::where('level_of_study_id', $programmes->level_of_study_id)->first();

        $proglists = programme_list::all();
        $matchcampusnamelist = array();
        foreach($proglists as $proglist) {
            if ($proglist->programme_id == $programmes->programme_id) {
                $campus = campus::where('campus_id', $proglist->campus_id)->first();
                array_push($matchcampusnamelist, $campus->campus_name);
            }
        }
        $campusnameliststring = implode(", ", $matchcampusnamelist);

        return view('user/user_programmedetails', compact('programmes', 'id'), compact('faculty', 'level_of_study', 'campusnameliststring'));
    }

}
