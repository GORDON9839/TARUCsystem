<?php
//////////////////////////////
//Author: Tan Yi Si
//Author Student ID: 18WMR08426
//////////////////////////////
namespace App\Http\Controllers;

use Illuminate\Support\Facades\Validator;
use App\campus;

use Illuminate\Http\Request;

class campusesController extends Controller
{

    public function index(Request $request)
    {
        $request->user()->authorizeRoles(['admin','staff']);
        $request->user()->authorizeType(['department']);
        $campus = campus::all();
//
        $xmlc = new \DOMDocument("1.0","UTF-8");
        $xmlc->formatOutput=true;
        $xmlcampus =$xmlc->createElement('CampusList');
        foreach($campus as $cam){
            $xmlcam=$xmlc->createElement('Campus');
            $xmlcamname=$xmlc->createElement('campus_name',$cam->campus_name);
            $xmlcamdesc=$xmlc->createElement('campus_desc',$cam->campus_desc);
            $xmlcamadd=$xmlc->createElement('campus_address',$cam->campus_address);

            $xmlcam->setAttribute('campus_id',$cam->campus_id);
            $xmlcam->appendChild($xmlcamname);
            $xmlcam->appendChild($xmlcamdesc);
            $xmlcam->appendChild($xmlcamadd);
            $xmlcampus->appendChild($xmlcam);
        }
        $xmlc->appendChild($xmlcampus);
        $xmlc->save("/xampp/htdocs/TARUCsystem/resources/views/XML/campus.xml");
        return view('department/campus_view');
       // return view('accommodation_create');
    }

    public function create()
    {
        return view('department/campuses_create');
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'campus_name' => 'required',
            'campus_desc' => 'required',
            'campus_address' => 'required'
        ]);

        if ($validator->fails()) {
            Session::flash('error', $validator->messages()->first());
            return redirect()->back()->withInput();
        }else {
            $cam = new campus();
            $cam->campus_name = $request->get('campus_name');
            $cam->campus_address = $request->get('campus_address');
            $cam->campus_desc = $request->get('campus_desc');
            $cam->timestamps = false;
            $cam->save();
            return redirect('campus/create')->with('success', 'Information has been added');
        }
    }

    public function show($id)
    {
        $campus= campus::where('campus_id',$id)->first();
        return view('department/campus_view_detail',compact('campus','id'));
    }

    public function edit($id)
    {
        $campus= campus::where('campus_id',$id)->first();
        return view('department/campus_edit',compact('campus','id'));
    }

    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'campus_name' => 'required',
            'campus_desc' => 'required',
            'campus_address' => 'required'
        ]);

        if ($validator->fails()) {
            Session::flash('error', $validator->messages()->first());
            return redirect()->back()->withInput();
        }else {
            $cam = campus::find($id);

            $cam->campus_name = $request->get('campus_name');
            $cam->campus_desc = $request->get('campus_desc');
            $cam->campus_address = $request->get('campus_address');
            $cam->timestamps = false;
            $cam->save();

            return \Redirect::route('campus.show', array('id' => $id))->with('success', 'Information has been modify');
        }
    }

    public function destroy($id)
    {
        campus::where('campus_id',$id)->delete();
        return redirect('campus')->with('success','Information has been deleted');
    }

}
