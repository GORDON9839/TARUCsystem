<?php
//referred to programmesController.php
namespace App\Http\Controllers;

use App\userClasses\ItemGetter;
use Illuminate\Http\Request;
use App\programme;
use App\faculty;
use App\level_of_study;
use App\campus;
use App\programme_list;
use App\structure;
use App\subject;
use mysql_xdevapi\Exception;

class userProgrammesController extends Controller
{
    public function index()
    {
        session_start();
        $_SESSION["userFaculty_short_name"] = "Any";
        $_SESSION["userLevel_of_study_name"] = "Any";
        $_SESSION["userCampus_name"] = "Any";
        $_SESSION["userSearch_keywords"] = "";
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
        $sl_facultyId = null;
        $sl_level_of_studyId = null;
        $sl_campusId = null;
        $sb_search = null;
        if (isset($_POST["faculty"])) {
            $sl_facultyId = $_POST["faculty"];
        }
        if (isset($_POST["level_of_study"])) {
            $sl_level_of_studyId = $_POST["level_of_study"];
        }
        if (isset($_POST["campus"])) {
            $sl_campusId = $_POST["campus"];
        }
        if (isset($_POST["search"])) {
            $sb_search = $_POST["search"];
        }
        $_POST["faculty"] = null;
        $_POST["level_of_study"] = null;
        $_POST["campus"] = null;
        $_POST["search"] = null;
        $_SESSION["userFaculty_short_name"] = "Any";
        $_SESSION["userLevel_of_study_name"] = "Any";
        $_SESSION["userCampus_name"] = "Any";
        $_SESSION["userSearch_keywords"] = "";

        if (!is_null($sl_facultyId)) {
            if ($sl_facultyId != "Any") {
                $faculty = faculty::where('faculty_id', $sl_facultyId)->first();
                $_SESSION["userFaculty_short_name"] = $faculty->faculty_short_name;
            }
            if ($sl_level_of_studyId != "Any") {
                $level_of_study = level_of_study::where('level_of_study_id', $sl_level_of_studyId)->first();
                $_SESSION["userLevel_of_study_name"] = $level_of_study->level_of_study_name;
            }
            if ($sl_campusId != "Any") {
                $campus = campus::where('campus_id', $sl_campusId)->first();
                $_SESSION["userCampus_name"] = $campus->campus_name;
            }
        } elseif (!is_null($sb_search)) {
            $sb_search = trim($sb_search);
            $_SESSION["userSearch_keywords"] = $sb_search;
        }
            //echo "<script type='text/javascript'>alert('$sl_facultyId');</script>";

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

            //make an array of campuses offering this programme
            $proglists = programme_list::all();
            $matchcampuslist = array();
            foreach($proglists as $proglist) {
                if ($proglist->programme_id == $prog->programme_id) {
                    $campus = campus::where('campus_id', $proglist->campus_id)->first();
                    array_push($matchcampuslist, $campus);
                }
            }

            //check if this programme should be filtered out
            if (!is_null($sl_facultyId)) {
                $i = 0;
                if ($sl_facultyId == "Any" || $faculty->faculty_id == $sl_facultyId) {
                    $i = $i + 1;
                }
                if ($sl_level_of_studyId == "Any" || $level_of_study->level_of_study_id == $sl_level_of_studyId) {
                    $i = $i + 1;
                }
                if ($sl_campusId == "Any") {
                    $i = $i + 1;
                }
                foreach ($matchcampuslist as $matchcampus) {
                    if ($sl_campusId == $matchcampus->campus_id) {
                        $i = $i + 1;
                    }
                }
                if ($i > 2) {
                    $xmlprogrammes->appendChild($xmlprog);
                }
            } elseif (!is_null($sb_search) && $sb_search != "") {
                if (stristr($prog->programme_name, $sb_search)) {
                    $xmlprogrammes->appendChild($xmlprog);
                }
            } elseif ($sb_search == "") {
                $xmlprogrammes->appendChild($xmlprog);
            }

        }
        $xmlp->appendChild($xmlprogrammes);
        $xmlp->save("/xampp/htdocs/TARUCsystem/resources/views/XML/userProgramme.xml");

        //go to user_viewprogrammes
        return view('user/user_viewprogrammes');
    }

    public function show($id)
    {
        //facade design pattern below
        $itemGetter = new ItemGetter();

        //variable is programmes (plural), but actually is single programme only
        $programmes = $itemGetter->getProg($id);
        $faculty = $itemGetter->getFac($programmes->faculty_id);
        $level_of_study = $itemGetter->getLevos($programmes->level_of_study_id);
        $campusnameliststring = $itemGetter->getCampusnameliststring($programmes->programme_id);
        $subjectnameliststring = $itemGetter->getSubjectnameliststring($programmes->programme_id);

        return view('user/user_programmedetails', compact('programmes', 'id'), compact('faculty', 'level_of_study', 'campusnameliststring', 'subjectnameliststring'));
    }

}
