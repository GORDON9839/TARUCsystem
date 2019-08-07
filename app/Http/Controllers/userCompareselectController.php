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

class userCompareselectController extends Controller
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
            $xmlprogfee_local = $xmlp->createElement('fee_local', $prog->fee_local);
            $xmlprogfee_international = $xmlp->createElement('fee_international', $prog->fee_international);

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
            $xmlprog->appendChild($xmlprogfee_local);
            $xmlprog->appendChild($xmlprogfee_international);

            $xmlprogrammes->appendChild($xmlprog);
        }
        $xmlp->appendChild($xmlprogrammes);
        $xmlp->save("/xampp/htdocs/TARUCsystem/resources/views/XML/userProgramme.xml");

        //go to user_viewprogrammes
        return view('user/user_compareselect');
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
