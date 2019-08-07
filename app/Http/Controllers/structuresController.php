<?php

namespace App\Http\Controllers;

use App\faculty;
use App\programme;
use App\structure;
use App\subject;
use Illuminate\Http\Request;

class structuresController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @param Request $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $request->user()->authorizeRoles(['admin','staff']);
        $request->user()->authorizeType(['faculty']);
        $programme=programme::all();
        //$structure = structure::find('');

//


        return view('faculty/structure_view',compact('programme'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
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

        $subject = subject::all();
//
        $xmls = new \DOMDocument("1.0","UTF-8");
        $xmls->formatOutput=true;
        $xmlsubject=$xmls->createElement('SubjectList');
        foreach($subject as $sub){
            $xmlsub=$xmls->createElement('Subject');
            $xmlsubname=$xmls->createElement('subject_name',$sub->subject_name);
            $xmlsubcode=$xmls->createElement('subject_code',$sub->subject_code);
            $xmlcredit=$xmls->createElement('credit_hour',$sub->credit_hour);

            $xmlsub->setAttribute('subject_id',$sub->subject_id);
            $xmlsub->setAttribute('subject_code',$sub->subject_code);
            $xmlsub->appendChild($xmlsubname);
            $xmlsub->appendChild($xmlcredit);


            $xmlsubject->appendChild($xmlsub);
        }
        $xmls->appendChild($xmlsubject);
        $xmls->save("/xampp/htdocs/TARUCsystem/resources/views/XML/subject.xml");

        return view('faculty/structure_create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $subject = $request->input('subject');


        foreach($subject as $sub){

            $res=structure::where('programme_id',$request->get('programme'))->where('subject_id',$sub);
            if(empty($res)){
            $struc = new structure();
            $struc->programme_id = $request->get('programme');
            $struc->subject_id= $sub;
            $struc->timestamps=false;
            $struc->save();
        }else{}
        }

        return redirect('structure/create')->with('success','Information has been added');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $structure= structure::where('programme_id',$id)->get();
        $xmls = new \DOMDocument("1.0","UTF-8");
        $xmls->formatOutput=true;
        $xmlstructure=$xmls->createElement('StructureList');
        foreach($structure as $struc){
            $subject = subject::find($struc->subject_id);
            $xmlstruc=$xmls->createElement('ProgrammeStructure');
            $xmlprogid=$xmls->createElement('programme_id',$struc->programme_id);
            $xmlsubid=$xmls->createElement('subject_id',$struc->subject_id);
            $xmlsubcode=$xmls->createElement('subject_code',$subject->subject_code);
            $xmlsubname=$xmls->createElement('subject_name',$subject->subject_name);

            $xmlstruc->appendChild($xmlprogid);
            $xmlstruc->appendChild($xmlsubid);
            $xmlstruc->appendChild($xmlsubcode);
            $xmlstruc->appendChild($xmlsubname);


            $xmlstructure->appendChild($xmlstruc);
        }
        $xmls->appendChild($xmlstructure);
        $xmls->save("/xampp/htdocs/TARUCsystem/resources/views/XML/structure.xml");

        return view('faculty/structure_details');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($prog)
    {

//        $prog_id="";
//        $sub_id="";

        $progg = explode(",",$prog);
        echo "<script type='text/javascript'>alert('ho')</script>";
        //$sub_id = explode(",",$prog)[1];
//        if(is_array($prog)){
//    for($i=0;$i<=1;$i++){
//        if($i=0){
//            $prog_id=$prog[$i];
//        }else{
//            $sub_id=$prog[$i];
//        }
//    }}


        $res=structure::where('programme_id',$progg[0])->where('subject_id',$progg[1])->delete();
        return redirect('subject')->with('success','Information has been deleted');
    }
}
