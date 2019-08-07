<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\subject;

class subjectsController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @param Request $request
     * @return \Illuminate\Http\Response
     */

//    public function index()
//    {
//        $subject = subject::all();
////
//        $xmls = new \DOMDocument("1.0","UTF-8");
//        $xmls->formatOutput=true;
//        $xmlsubject=$xmls->createElement('SubjectList');
//        foreach($subject as $sub){
//            $xmlsub=$xmls->createElement('Subject');
//            $xmlsubname=$xmls->createElement('subject_name',$sub->subject_name);
//            $xmlcredit=$xmls->createElement('credit_hour',$sub->credit_hour);
//
//            $xmlsub->setAttribute('subject_id',$sub->subject_id);
//            $xmlsub->setAttribute('subject_code',$sub->subject_code);
//            $xmlsub->appendChild($xmlsubname);
//            $xmlsub->appendChild($xmlcredit);
//
//
//            $xmlsubject->appendChild($xmlsub);
//        }
//        $xmls->appendChild($xmlsubject);
//        $xmls->save("/xampp/htdocs/TARUCsystem/resources/views/XML/subject.xml");
//        return view('faculty/subject_view');
//    }
//
//
//    public function create()
//    {
//
//        return view('faculty/subject_create');
//    }
//
//
//    public function store(Request $request)
//    {
//        $subject= new subject();
//        $subject->subject_name = $request->get('subject_name');
//        $subject->subject_code = $request->get('subject_code');
//        $subject->credit_hour = $request->get('credit_hour');
//
//        $subject->timestamps=false;
//        $subject->save();
//        return redirect('subject/create')->with('success','Information has been added');
//    }
//
//
//    public function show($id)
//    {
//        //$progid = json_decode($id, true);
//        $subject= subject::find($id);
//
//        return view('faculty/subject_details',compact('subject','id'));
//    }

//
//    /**
//     * Show the form for editing the specified resource.
//     *
//     * @param  int  $id
//     * @return \Illuminate\Http\Response
//     */
//    public function edit($id)
//    {
//        $subject= subject::find($id);
//
//        return view('faculty/subject_edit',compact('subject','id'));
//    }
//
//    /**
//     * Update the specified resource in storage.
//     *
//     * @param  \Illuminate\Http\Request  $request
//     * @param  int  $id
//     * @return \Illuminate\Http\Response
//     */
//    public function update(Request $request, $id)
//    {
//        $subject = subject::find($id);
//
//        $subject->subject_name = $request->get('subject_name');
//        $subject->subject_code = $request->get('subject_code');
//        $subject->credit_hour = $request->get('credit_hour');
//        $subject->timestamps=false;
//        $subject->save();
//
//
//        return \Redirect::route('subject.show',array('id'=>$id))->with('success','Information has been modify');
//    }
//
//    /**
//     * Remove the specified resource from storage.
//     *
//     * @param  int  $id
//     * @return \Illuminate\Http\Response
//     */
//    public function destroy($id)
//    {
//        $res=subject::find($id)->delete();
//        return redirect('subject')->with('success','Information has been deleted');
//    }
    public function index(Request $request){
  $request->user()->authorizeRoles(['admin','staff']);
        $request->user()->authorizeType(['faculty']);
        $subject = subject::all();

        $xmls = new \DOMDocument("1.0","UTF-8");
        $xmls->formatOutput=true;
        $xmlsubject=$xmls->createElement('SubjectList');
        foreach($subject as $sub){
            $xmlsub=$xmls->createElement('Subject');
            $xmlsubname=$xmls->createElement('subject_name',$sub->subject_name);
            $xmlcredit=$xmls->createElement('credit_hour',$sub->credit_hour);

            $xmlsub->setAttribute('subject_id',$sub->subject_id);
            $xmlsub->setAttribute('subject_code',$sub->subject_code);
            $xmlsub->appendChild($xmlsubname);
            $xmlsub->appendChild($xmlcredit);


            $xmlsubject->appendChild($xmlsub);
        }
        $xmls->appendChild($xmlsubject);

        $xmls->save("/xampp/htdocs/TARUCsystem/resources/views/XML/subject.xml");
        return view('faculty/subject_view');
    }
    public function create(){
        return view('faculty/subject_create');

    }
    public function show(subject $subject){


        return view('faculty/subject_details',compact('subject'));
    }
    public function store(Request $request){

        $subject= subject::create($request->all());
        return redirect('subject/create')->with('success','Information has been added');

    }
    public function edit($id)
    {
        $subject= subject::find($id);

        return view('faculty/subject_edit',compact('subject','id'));
    }
    public function update(Request $request, subject $subject){
        $subject->update($request->all());
        $message="Information has been modify";
        $res=response()->json(array('msg',$message),200);
        return redirect('subject')->with('res',$res);
    }
    public function delete(Request $request,subject $subject){
        $subject->delete();
        $message="Information has been deleted";
        $res=response()->json(array('msg',$message),204);
        return redirect('subject')->with('res',$res);
    }

}
