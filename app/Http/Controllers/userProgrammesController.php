<?php
//referred to programmesController.php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\programme;
use App\faculty;

class userProgrammesController extends Controller
{
    public function index()
    {
        $programmes = programme::all();

        $xmlp = new \DOMDocument("1.0", "UTF-8");
        $xmlp->formatOutput = true;
        $xmlprogrammes = $xmlp->createElement('ProgrammesList');
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
        return view('user/user_viewprogrammes');
    }

    public function show($id)
    {
        $programmes = programme::where('programme_id', $id)->first();
        $faculty = faculty::where('faculty_id', $programmes->faculty_id)->first();

        return view('user/user_programmedetails', compact('programmes', 'id'), compact('faculty'));
    }

}
