<?php

namespace App\Http\Controllers;

use App\level_of_study;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class level_of_studiesController extends Controller
{

    public function index(Request $request)
    {
        $request->user()->authorizeRoles(['admin','staff']);
        $request->user()->authorizeType(['department']);
        $levelstudy = level_of_study::all();
//
        $xmlls = new \DOMDocument("1.0","UTF-8");
        $xmlls->formatOutput=true;
        $xmllevelstudy =$xmlls->createElement('LevelStudyList');
        foreach($levelstudy as $cam){
            $xmllss=$xmlls->createElement('LevelStudy');
            $xmlcamname=$xmlls->createElement('level_of_study_name',$cam->level_of_study_name);

            $xmllss->setAttribute('level_of_study_id',$cam->level_of_study_id);
            $xmllss->appendChild($xmlcamname);
            $xmllevelstudy->appendChild($xmllss);
        }
        $xmlls->appendChild($xmllevelstudy);
        $xmlls->save("/xampp/htdocs/TARUCsystem/resources/views/XML/levelstudy.xml");
        return view('department/levelstudy_view');
        // return view('accommodation_create');
    }

    public function create()
    {
        return view('department/levelstudy_create');
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'level_of_study_name' => 'required'
        ]);

        if ($validator->fails()) {
            Session::flash('error', $validator->messages()->first());
            return redirect()->back()->withInput();
        }else {
            $cam = new level_of_study();
            $cam->level_of_study_name = $request->get('level_of_study_name');
            $cam->timestamps = false;
            $cam->save();
            return redirect('levelstudy/create')->with('success', 'Information has been added');
        }
    }

    public function show($id)
    {
        $levelstudy= level_of_study::where('level_of_study_id',$id)->first();
        return view('department/levelstudy_view_detail',compact('levelstudy','id'));
    }

    public function edit($id)
    {
        $levelstudy= level_of_study::where('level_of_study_id',$id)->first();
        return view('department/levelstudy_edit',compact('levelstudy','id'));
    }

    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'level_of_study_name' => 'required'
        ]);

        if ($validator->fails()) {
            Session::flash('error', $validator->messages()->first());
            return redirect()->back()->withInput();
        }else {
            $cam = level_of_study::find($id);

            $cam->level_of_study_name = $request->get('level_of_study_name');
            $cam->timestamps = false;
            $cam->save();

            return \Redirect::route('levelstudy.show', array('id' => $id))->with('success', 'Information has been modify');
        }
    }

    public function destroy($id)
    {
        //
    }
}
