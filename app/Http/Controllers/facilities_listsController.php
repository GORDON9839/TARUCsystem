<?php
//////////////////////////////
//Author: Tan Yi Si
//Author Student ID: 18WMR08426
//////////////////////////////
namespace App\Http\Controllers;

use App\campus;
use App\facilities_list;
use App\facility;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Log;

class facilities_listsController extends Controller
{
    public function index(Request $request)
    {
        $request->user()->authorizeRoles(['admin','staff']);
        $request->user()->authorizeType(['department']);
        $facility = facility::all();

        $xmlfc = new \DOMDocument("1.0","UTF-8");
        $xmlfc->formatOutput=true;
        $xmlfacility=$xmlfc->createElement('FacilityList');
        foreach($facility as $fc){
            $xmlfcc=$xmlfc->createElement('Facility');
            $xmlfcname=$xmlfc->createElement('facility_name',$fc->facility_name);
            $xmlfcdesc=$xmlfc->createElement('facility_desc',$fc->facility_desc);

            $xmlfcc->setAttribute('facility_id',$fc->facility_id);
            $xmlfcc->appendChild($xmlfcname);
            $xmlfcc->appendChild($xmlfcdesc);
            $xmlfacility->appendChild($xmlfcc);
        }
        $xmlfc->appendChild($xmlfacility);
        $xmlfc->save("/xampp/htdocs/TARUCsystem/resources/views/XML/facility.xml");

        //load facility_campus list
        $facilitylist = facilities_list::all();
        $xmlfl = new \DOMDocument("1.0","UTF-8");
        $xmlfl->formatOutput=true;
        $xmlfacilitylist=$xmlfl->createElement('FacilityCampusList');
        foreach($facilitylist as $fl) {
            $xmlfll = $xmlfl->createElement('FacilityCampus');
            $xmlfid = $xmlfl->createElement('facility_id', $fl->facility_id);
            $xmlcid = $xmlfl->createElement('campus_id', $fl->campus_id);
            $xmlfll->appendChild($xmlfid);
            $xmlfll->appendChild($xmlcid);
            $xmlfacilitylist->appendChild($xmlfll);
        }
        $xmlfl->appendChild($xmlfacilitylist);
        $xmlfl->save("/xampp/htdocs/TARUCsystem/resources/views/XML/facility_campus.xml");

        return view('department/facility_view');
    }

    public function create()
    {
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
        return view('department/facility_create');
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'facility_name' => 'required',
            'facility_desc' => 'required'
        ]);

        if ($validator->fails()) {
            Session::flash('error', $validator->messages()->first());
            return redirect()->back()->withInput();
        }else {
            $fc = new facility();
            $fc->facility_name = $request->get('facility_name');
            $fc->facility_desc = $request->get('facility_desc');
            $fc->timestamps = false;
            $fc->save();


            $facility = facility::where('facility_name', $request->get('facility_name'))->first();
            $cam = $request->input('campus');
            foreach ($cam as $c) {
                echo "<script type='text/javascript'>alert('$c');</script>";
                $fl = new facilities_list();
                $fl->facility_id = $facility->facility_id;
                $fl->campus_id = $c;
                $fl->timestamps = false;
                $fl->save();
            }
            return redirect('facility/create')->with('success', 'Information has been added');
        }
    }

    public function show($id)
    {
       // Log::info('This is some useful information.');
        $facility= facility::where('facility_id',$id)->first();
        Log::info($facility->facility_id);
        $facilityList = facilities_list::where('facility_id',$id)->get();

        //Log::info($facilityList->campus_id);
        return view('department/facility_view_detail',compact('facility','id'),compact('facilityList'));
    }

    public function edit($id)
    {

        $facility= facility::where('facility_id',$id)->first();
        $facilityList = facilities_list::where('facility_id',$id)->get();
        return view('department/facility_edit',compact('facility','id'),compact('facilityList'));
    }

    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'facility_name' => 'required',
            'facility_desc' => 'required'
        ]);

        if ($validator->fails()) {
            Session::flash('error', $validator->messages()->first());
            return redirect()->back()->withInput();
        }else {
            $this->destroy($id);
            $fc = facility::find($id);
            $fc->facility_name = $request->get('facility_name');
            $fc->facility_desc = $request->get('facility_desc');
            $fc->timestamps = false;
            $fc->save();


            $facility = facility::where('facility_name', $request->get('facility_name'))->first();
            $cam = $request->input('campus');
            foreach ($cam as $c) {
                $fl = new facilities_list();
                $fl->facility_id = $facility->facility_id;
                $fl->campus_id = $c;
                $fl->timestamps = false;
                $fl->save();
            }
            return \Redirect::route('facility.show', array('id' => $id))->with('success', 'Information has been modify');
        }
    }

    public function destroy($id)
    {
        facilities_list::where('facility_id',$id)->delete();
    }
}
