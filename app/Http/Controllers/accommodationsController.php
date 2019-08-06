<?php

namespace App\Http\Controllers;

use App\campus;
use Illuminate\Http\Request;
use App\accommodation;
use Illuminate\Support\Facades\Validator;


class accommodationsController extends Controller
{


    public function index()
    {
        $accommodation = accommodation::all();
//
        $xmla = new \DOMDocument("1.0","UTF-8");
        $xmla->formatOutput=true;
        $xmlaccommodation=$xmla->createElement('AccommodationList');
        foreach($accommodation as $acc){
            $xmlacc=$xmla->createElement('Accommodation');
            $xmlaccname=$xmla->createElement('accommodation_name',$acc->accommodation_name);
            $xmlaccadd=$xmla->createElement('accommodation_address',$acc->accommodation_address);
            $xmlaccfee=$xmla->createElement('fees',$acc->fees);
            $xmltotalroom=$xmla->createElement('total_room',$acc->total_room);
            $xmlrentalRoom=$xmla->createElement('rent_number',$acc->rent_number);
            $xmlacctype=$xmla->createElement('accommodation_type',$acc->accommodation_type);
            $campus_name = campus::where('campus_id',$acc->campus_id)->first();
            $xmlcname=$xmla->createElement('campus',$campus_name->campus_name);

            $xmlacc->setAttribute('accommodation_id',$acc->accommodation_id);
            $xmlacc->appendChild($xmlaccname);
            $xmlacc->appendChild($xmlaccadd);
            $xmlacc->appendChild($xmlaccfee);
            $xmlacc->appendChild($xmltotalroom);
            $xmlacc->appendChild($xmlrentalRoom);
            $xmlacc->appendChild($xmlacctype);
            $xmlacc->appendChild($xmlcname);

            $xmlaccommodation->appendChild($xmlacc);
        }
        $xmla->appendChild($xmlaccommodation);
        $xmla->save("/xampp/htdocs/TARUCsystem/resources/views/XML/accommodation.xml");
        return view('department/accommodation_view');
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
        return view('department/accommodation_create');
    }


    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'accommodation_name' => 'required',
            'accommodation_address' => 'required',
            'fees' => 'required',
            'total_room' => 'required',
            'rent_number' => 'required'
        ]);

        if ($validator->fails()) {
            Session::flash('error', $validator->messages()->first());
            return redirect()->back()->withInput();
        }else{
            $acc = new accommodation();
            $acc->accommodation_name = $request->get('accommodation_name');
            $acc->accommodation_address = $request->get('accommodation_address');
            $acc->fees = $request->get('fees');
            $acc->total_room = $request->get('total_room');
            $acc->rent_number = $request->get('rent_number');
            $acc->accommodation_type = $request->get('accommodation_type');
            $acc->campus_id = $request->get('campus_id');
            $acc->timestamps=false;
            $acc->save();
            return redirect('accommodation/create')->with('success','Information has been added');
        }
    }

    public function show($id)
    {
        $accommodation= accommodation::where('accommodation_id',$id)->first();
        $campusname = campus::where('campus_id',$accommodation->campus_id)->first();

        return view('department/accommodation_view_detail',compact('accommodation','id'),compact('campusname'));
    }

    public function edit($id)
    {
        $accommodation= accommodation::where('accommodation_id',$id)->first();
        $campusname = campus::where('campus_id',$accommodation->campus_id)->first();

        return view('department/accommodation_edit',compact('accommodation','id'),compact('campusname'));
    }

    public function update(Request $request, $id)
    {
//        $validator = Validator::make($request->all(), [
//            'accommodation_name' => 'required|unique:users',
//            'accommodation_address' => 'required',
//            'fees' => 'required',
//            'total_room' => 'required',
//            'rent_number' => 'required'
//        ]);
//
//        if ($validator->fails()) {
//            Session::flash('error', $validator->messages()->first());
//            return redirect()->back()->withInput();
//        }else {

            $acc = accommodation::find($id);
            $acc->accommodation_name = $request->get('accommodation_name');
            $acc->accommodation_address = $request->get('accommodation_address');
            $acc->fees = $request->get('fees');
            $acc->total_room = $request->get('total_room');
            $acc->rent_number = $request->get('rent_number');
            $acc->accommodation_type = $request->get('accommodation_type');
            $acc->campus_id = $request->get('campus_id');
            $acc->timestamps = false;
            $acc->save();
            return \Redirect::route('accommodation.show', array('id' => $id))->with('success', 'Information has been modify');
//        }
    }

    public function destroy($id)
    {
        accommodation::where('accommodation_id',$id)->delete();
        return redirect('accommodation')->with('success','Information has been deleted');
    }
}
