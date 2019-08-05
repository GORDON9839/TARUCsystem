<?php
//referred to programmesController.php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\programme;
use App\faculty;
use App\level_of_study;
use App\campus;
use App\programme_list;

class userProgrammesController extends Controller
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
            $xmlprog->appendChild($xmlfacultyname);
            $xmlprog->appendChild($xmlprogfees);

            $xmlprogrammes->appendChild($xmlprog);
        }
        $xmlp->appendChild($xmlprogrammes);
        $xmlp->save("/xampp/htdocs/TARUCsystem/resources/views/XML/userProgramme.xml");

        //generate faculty XML
        $faculties = faculty::all();

        $xmlf = new \DOMDocument("1.0", "UTF-8");
        $xmlf->formatOutput = true;
        $xmlfaculties = $xmlf->createElement('userFacultiesList');
        foreach($faculties as $fac) {
            //$variable = $xmlp->createElement(nameUsedInXml, $prog->nameOfDatabaseField)
            $xmlfac = $xmlf->createElement('Faculty');
            $xmlfacname = $xmlf->createElement('faculty_name', $fac->faculty_name);
            $xmlfacshortname = $xmlf->createElement('faculty_short_name', $fac->faculty_short_name);
            $xmlfacdesc = $xmlf->createElement('faculty_desc', $fac->faculty_desc);

            $xmlfac->setAttribute('faculty_id', $fac->faculty_id);
            $xmlfac->appendChild($xmlfacname);
            $xmlfac->appendChild($xmlfacshortname);
            $xmlfac->appendChild($xmlfacdesc);

            $xmlfaculties->appendChild($xmlfac);
        }
        $xmlf->appendChild($xmlfaculties);
        $xmlf->save("/xampp/htdocs/TARUCsystem/resources/views/XML/userFaculty.xml");

        //generate level_of_study XML (faculty > level_of_study, faculties > level_of_studies, f > los, fac > levos)
        $level_of_studies = level_of_study::all();

        $xmllos = new \DOMDocument("1.0", "UTF-8");
        $xmllos->formatOutput = true;
        $xmllevel_of_studies = $xmllos->createElement('Level_of_Studies_List');
        foreach($level_of_studies as $levos) {
            //$variable = $xmlp->createElement(nameUsedInXml, $prog->nameOfDatabaseField)
            $xmllevos = $xmllos->createElement('Level_of_study');
            $xmllevosname = $xmllos->createElement('level_of_study_name', $levos->level_of_study_name);

            $xmllevos->setAttribute('level_of_study_id', $levos->level_of_study_id);
            $xmllevos->appendChild($xmllevosname);

            $xmllevel_of_studies->appendChild($xmllevos);
        }
        $xmllos->appendChild($xmllevel_of_studies);
        $xmllos->save("/xampp/htdocs/TARUCsystem/resources/views/XML/userLevelOfStudy.xml");

        //generate campus XML
        $campuses = campus::all();

        $xmlc = new \DOMDocument("1.0", "UTF-8");
        $xmlc->formatOutput = true;
        $xmlcampuses = $xmlc->createElement('userCampusesList');
        foreach($campuses as $cam) {
            //$variable = $xmlp->createElement(nameUsedInXml, $prog->nameOfDatabaseField)
            $xmlcam = $xmlc->createElement('Campus');
            $xmlcamname = $xmlc->createElement('campus_name', $cam->campus_name);
            $xmlcamdesc = $xmlc->createElement('campus_desc', $fac->campus_desc);
            $xmlcamaddress = $xmlc->createElement('campus_address', $cam->campus_address);

            $xmlcam->setAttribute('campus_id', $cam->campus_id);
            $xmlcam->appendChild($xmlcamname);
            $xmlcam->appendChild($xmlcamdesc);
            $xmlcam->appendChild($xmlcamaddress);

            $xmlcampuses->appendChild($xmlcam);
        }
        $xmlc->appendChild($xmlcampuses);
        $xmlc->save("/xampp/htdocs/TARUCsystem/resources/views/XML/userCampus.xml");

        //go to user_viewprogrammes
        return view('user/user_viewprogrammes');
    }

    public function show($id)
    {
        $programmes = programme::where('programme_id', $id)->first();
        $faculty = faculty::where('faculty_id', $programmes->faculty_id)->first();

        return view('user/user_programmedetails', compact('programmes', 'id'), compact('faculty'));
    }

}
