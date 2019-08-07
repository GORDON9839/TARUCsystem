<?php
//////////////////////////////
//Author: Tan Yi Si
//Author Student ID: 18WMR08426
//////////////////////////////
namespace App\Http\Controllers;

use App\faculty;
use App\programme;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class setfeeController extends Controller
{
    public function index(Request $request)
    {$request->user()->authorizeRoles(['admin','staff']);
        $request->user()->authorizeType(['department']);
        $fee = programme::all();
        $xmlb = new  \DOMDocument("1.0","UTF-8");
        $xmlb->formatOutput="true";
        $xmlfee = $xmlb->createElement('ProgramFeeList');
        foreach($xmlfee as $list){
            $xmlInsideList = $xmlb->createElement('ProgrammeFee');
            $xmlprogcode= $xmlb->createElement('programme_code',$fee->programme_code);
            $xmlProgName = $xmlb->createElement('programme_name', $fee->programme_name);
            $xmlMfee = $xmlb->createElement('fee_local', $fee->fee_local);
            $xmlIfee = $xmlb->createElement('fee_international', $fee->fee_international);
            $xmlInsideList->setAttribute('programme_id',$fee->programme_id);

            $xmlInsideList->appendChild($xmlprogcode);
            $xmlInsideList->appendChild($xmlProgName);
            $xmlInsideList->appendChild($xmlMfee);
            $xmlInsideList->appendChild($xmlIfee);
            $xmlfee->appendChild($xmlInsideList);
        }
        $xmlb->appendChild($xmlfee);
        $xmlb->save("/xampp/htdocs/TARUCsystem/resources/views/XML/fee.xml");

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
            $xmlMfee = $xmlp->createElement('fee_local', $prog->fee_local);
            $xmlIfee = $xmlp->createElement('fee_international', $prog->fee_international);

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
            $xmlprog->appendChild($xmlMfee);
            $xmlprog->appendChild($xmlIfee);

            $xmlprogrammes->appendChild($xmlprog);
        }
        $xmlp->appendChild($xmlprogrammes);
        $xmlp->save("/xampp/htdocs/TARUCsystem/resources/views/XML/programme.xml");

        return view('department/setfee_view');
    }

    public function edit($id)
    {
        $prog = programme::find($id)->first();
        return view('department/setfee_create', compact('prog','id'));
    }

    public function show($id)
    {
        $this->index();
    }

    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'fee_local' => 'required',
            'fee_international' => 'required'
        ]);

        if ($validator->fails()) {
            Session::flash('error', $validator->messages()->first());
            return redirect()->back()->withInput();
        }else {
            $prog = programme::find($id);
            $prog->fee_local = $request->get('fee_local');
            $prog->fee_international = $request->get('fee_international');
            $prog->timestamps = false;
            $prog->save();

            return redirect('fee')->with('success', 'Fee is set!');
        }
    }
}
