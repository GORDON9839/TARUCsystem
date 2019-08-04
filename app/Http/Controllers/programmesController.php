<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\programme;
use App\faculty;

class programmesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $programmes = programme::all();
//
        $xmlp = new \DOMDocument("1.0","UTF-8");
        $xmlp->formatOutput=true;
        $xmlprogrammes=$xmlp->createElement('ProgrammesList');
        foreach($programmes as $prog){
            $xmlprog=$xmlp->createElement('Programme');
            $xmlprogname=$xmlp->createElement('programme_name',$prog->programme_name);
            $xmlprogdesc=$xmlp->createElement('programme_desc',$prog->programme_desc);
            $xmlprogfduration=$xmlp->createElement('fulltime_duration',$prog->fulltime_duration);
            $xmlprogpduration=$xmlp->createElement('parttime_duration',$prog->parttime_duration);
            $xmlprogpc=$xmlp->createElement('profcer',$prog->professional_certification);
            $xmlMER_SPM=$xmlp->createElement('MER_SPM',$prog->MER_SPM);
            $xmlMER_STPM=$xmlp->createElement('MER_STPM',$prog->MER_STPM);
            $xmlMER_UEC=$xmlp->createElement('MER_UEC',$prog->MER_UEC);
            $xmlMER_desc=$xmlp->createElement('MER_desc',$prog->MER_desc);
            $facultyname = faculty::where('faculty_id',$prog->faculty_id)->first();
            $xmlfac=$xmlp->createElement('faculty',$facultyname->faculty_name);

            $xmlprog->setAttribute('programme_id',$prog->programme_id);
            $xmlprog->setAttribute('programme_code',$prog->programme_code);
            $xmlprog->appendChild($xmlprogname);
            $xmlprog->appendChild($xmlprogdesc);
            $xmlprog->appendChild($xmlprogfduration);
            $xmlprog->appendChild($xmlprogpduration);
            $xmlprog->appendChild($xmlprogpc);
            $xmlprog->appendChild($xmlMER_SPM);
            $xmlprog->appendChild($xmlMER_STPM);
            $xmlprog->appendChild($xmlMER_UEC);
            $xmlprog->appendChild($xmlMER_desc);
            $xmlprog->appendChild($xmlfac);

            $xmlprogrammes->appendChild($xmlprog);
        }
        $xmlp->appendChild($xmlprogrammes);
        $xmlp->save("/xampp/htdocs/TARUCsystem/resources/views/XML/programme.xml");
        return view('faculty/programme_view');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $faculty = faculty::all();

        $xml = new \DOMDocument("1.0","UTF-8");
        $xml->formatOutput=true;
        $xmlfaculties=$xml->createElement('Faculties');
        foreach($faculty as $fac){
            $xmlfac=$xml->createElement('Faculty');
            $xmlfacname=$xml->createElement('FacultyName',$fac->faculty_name);
            $xmlfacdesc=$xml->createElement('Description',$fac->faculty_desc);

            $xmlfac->setAttribute('FacultyID',$fac->faculty_id);
            $xmlfac->setAttribute('FacultyShortName',$fac->faculty_short_name);
            $xmlfac->appendChild($xmlfacname);
            $xmlfac->appendChild($xmlfacdesc);

            $xmlfaculties->appendChild($xmlfac);
        }
        $xml->appendChild($xmlfaculties);
        $xml->save("/xampp/htdocs/TARUCsystem/resources/views/XML/faculty.xml");
        return view('faculty/programmes_create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $prog = new programme();
        $prog->programme_name = $request->get('programme_name');
        $prog->programme_code = $request->get('programme_code');
        $prog->programme_desc = $request->get('programme_desc');
        $prog->fulltime_duration = $request->get('fduration');
        $prog->faculty_id = $request->get('faculty');
        $prog->parttime_duration = $request->get('pduration');
        $prog->professional_certification = $request->get('professional_certification');
        $prog->MER_SPM = $request->get('MER_SPM');
        $prog->MER_STPM = $request->get('MER_STPM');
        $prog->MER_UEC = $request->get('MER_UEC');
        $prog->MER_desc = $request->get('MER_desc');
        $prog->timestamps=false;
        $prog->save();
        return redirect('programmes/create')->with('success','Information has been added');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //$progid = json_decode($id, true);
        $programmes= programme::where('programme_id',$id)->first();
        $facultyname = faculty::where('faculty_id',$programmes->faculty_id)->first();

        return view('faculty/programme_details',compact('programmes','id'),compact('facultyname'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $programmes= programme::where('programme_id',$id)->first();
        $facultyname = faculty::where('faculty_id',$programmes->faculty_id)->first();

        return view('faculty/programme_edit',compact('programmes','id'),compact('facultyname'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $prog = programme::find($id);

        $prog->programme_name = $request->get('programme_name');
        $prog->programme_code = $request->get('programme_code');
        $prog->programme_desc = $request->get('programme_desc');
        $prog->fulltime_duration = $request->get('fduration');
        $prog->faculty_id = $request->get('faculty');
        $prog->parttime_duration = $request->get('pduration');
        $prog->professional_certification = $request->get('professional_certification');
        $prog->MER_SPM = $request->get('MER_SPM');
        $prog->MER_STPM = $request->get('MER_STPM');
        $prog->MER_UEC = $request->get('MER_UEC');
        $prog->MER_desc = $request->get('MER_desc');
        $prog->timestamps=false;
        $prog->save();

        return \Redirect::route('programmes.show',array('id'=>$id))->with('success','Information has been modify');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $res=programme::where('programme_id',$id)->delete();
        return redirect('programmes')->with('success','Information has been deleted');
    }
}
