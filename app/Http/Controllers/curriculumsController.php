<?php
//////////////////////////////
//Author: Goh Chun Lin
//Author Student ID: 18WMR08314
//////////////////////////////
namespace App\Http\Controllers;

use App\curriculum;
use App\curriculum_list;
use App\campus;
use App\programme;
use Illuminate\Http\Request;

class curriculumsController extends Controller
{
    public function index(Request $request)
    {
        $request->user()->authorizeRoles(['admin']);
        $request->user()->authorizeType(['faculty']);
        $curriculum = curriculum::where('curriculum_id','!=','1')->get();
//
        $xmlc = new \DOMDocument("1.0","UTF-8");
        $xmlc->formatOutput=true;
        $xmlcurriculum=$xmlc->createElement('CurriculumList');
        foreach($curriculum as $cur){
            $xmlcur=$xmlc->createElement('Curriculum');
            $xmlcurname=$xmlc->createElement('curriculum_name',$cur->curriculum_name);
            $xmlcuruni=$xmlc->createElement('curriculum_uni',$cur->curriculum_uni);
            $xmlcurdesc=$xmlc->createElement('curriculum_desc',$cur->curriculum_desc);

            $xmlcur->setAttribute('curriculum_id',$cur->curriculum_id);
            $xmlcur->appendChild($xmlcurname);
            $xmlcur->appendChild($xmlcuruni);
            $xmlcur->appendChild($xmlcurdesc);


            $xmlcurriculum->appendChild($xmlcur);
        }
        $xmlc->appendChild($xmlcurriculum);
        $xmlc->save("/xampp/htdocs/TARUCsystem/resources/views/XML/curriculum.xml");
        return view('faculty/curriculum_view');
    }
    public function getProgrammeByCurriculum()
    {
        $prog = programme::where("curriculum_id",$_GET['id'])->get();

        return json_encode($prog);

    }
    public function create()
    {
        $programme = programme::all();

        return view('faculty/curriculum_create',compact('programme'));
    }


    public function store(Request $request)
    {
        $curriculum= new curriculum();
        $curriculum->curriculum_name = $request->get('curriculum_name');
        $curriculum->curriculum_uni = $request->get('curriculum_uni');
        $curriculum->curriculum_desc = $request->get('curriculum_desc');

        $curriculum->timestamps=false;
        $curriculum->save();


        $cur= curriculum::where('curriculum_name',$request->get('curriculum_name'))->first();
        $prog = $request->input('programme');
        //echo "<script type='text/javascript'>alert('$cur->curriculum_id');</script>";
        foreach($prog as $p){
            //echo "<script type='text/javascript'>alert('$p');</script>";
            $program =programme::find($p);
            $program->curriculum_id = $cur->curriculum_id;
            $program->timestamps=false;
            $program->save();
        }


        return redirect('curriculum/create')->with('success','Information has been added');
    }


    public function show($id)
    {
        //$progid = json_decode($id, true);
        $curriculum= curriculum::find($id);

        return view('faculty/curriculum_details',compact('curriculum','id'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $curriculum= curriculum::find($id);

        return view('faculty/curriculum_edit',compact('curriculum','id'));
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
        $curriculum= curriculum::find($id);

        $curriculum->curriculum_name = $request->get('curriculum_name');
        $curriculum->curriculum_uni = $request->get('curriculum_uni');
        $curriculum->curriculum_desc = $request->get('curriculum_desc');
        $curriculum->timestamps=false;
        $curriculum->save();


        return redirect('curriculum')->with('success','Information has been deleted');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $curriculum= curriculum::find($id)->delete();
        return redirect('curriculum')->with('success','Information has been deleted');
    }
}
