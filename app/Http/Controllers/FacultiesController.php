<?php
//////////////////////////////
//Author: Goh Chun Lin
//Author Student ID: 18WMR08314
//////////////////////////////
namespace App\Http\Controllers;

use App\faculty;
use App\campus;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class FacultiesController extends Controller
{

    public function index(Request $request)
    {
        $request->user()->authorizeRoles(['admin','staff']);
        $request->user()->authorizeType(['department']);
        $faculty = faculty::all();
//
        $xmlf = new \DOMDocument("1.0","UTF-8");
        $xmlf->formatOutput=true;
        $xmlfaculty=$xmlf->createElement('FacultyList');
        foreach($faculty as $fac){
            $xmlfac=$xmlf->createElement('Faculty');
            $xmlfacname=$xmlf->createElement('faculty_name',$fac->faculty_name);
            $xmlfacdesc=$xmlf->createElement('faculty_desc',$fac->faculty_desc);
            $xmlfacsname=$xmlf->createElement('faculty_short_name',$fac->faculty_short_name);

            $xmlfac->setAttribute('faculty_id',$fac->faculty_id);
            $xmlfac->appendChild($xmlfacname);
            $xmlfac->appendChild($xmlfacdesc);
            $xmlfac->appendChild($xmlfacsname);
            $xmlfaculty->appendChild($xmlfac);
        }
        $xmlf->appendChild($xmlfaculty);
        $xmlf->save("/xampp/htdocs/TARUCsystem/resources/views/XML/faculty.xml");
        return view('department/faculty_view');
    }

    public function getFacultyDescription(){
        $faculty = $_GET["faculty"];
        $faculty_description = faculty::where('faculty_short_name',$faculty)->get();

        return json_encode($faculty_description);
    }
    public function create()
    {
        return view('department/faculty_create');
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'faculty_name' => 'required',
            'faculty_short_name' => 'required',
            'faculty_desc' => 'required'
        ]);

        if ($validator->fails()) {
            Session::flash('error', $validator->messages()->first());
            return redirect()->back()->withInput();
        }else {
            $fac = new faculty();
            $fac->faculty_name = $request->get('faculty_name');
            $fac->faculty_short_name = $request->get('faculty_short_name');
            $fac->faculty_desc = $request->get('faculty_desc');
            $fac->timestamps = false;
            $fac->save();
            return redirect('faculty/create')->with('success', 'Information has been added');
        }
    }

    public function show($id)
    {
        $faculty= faculty::where('faculty_id',$id)->first();
        return view('department/faculty_view_detail',compact('faculty','id'));
    }

    public function edit($id)
    {
        $faculty= faculty::where('faculty_id',$id)->first();
        return view('department/faculty_edit',compact('faculty','id'));
    }

    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'faculty_name' => 'required',
            'faculty_short_name' => 'required',
            'faculty_desc' => 'required'
        ]);

        if ($validator->fails()) {
            Session::flash('error', $validator->messages()->first());
            return redirect()->back()->withInput();
        }else {
            $fac = faculty::find($id);

            $fac->faculty_name = $request->get('faculty_name');
            $fac->faculty_desc = $request->get('faculty_desc');
            $fac->faculty_short_name = $request->get('faculty_short_name');
            $fac->timestamps = false;
            $fac->save();

            return \Redirect::route('faculty.show', array('id' => $id))->with('success', 'Information has been modify');
        }
    }

    public function destroy($id)
    {
        $res=faculty::where('faculty_id',$id)->delete();
        return redirect('faculty')->with('success','Information has been deleted');
    }
}
