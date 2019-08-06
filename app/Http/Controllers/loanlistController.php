<?php

namespace App\Http\Controllers;

use App\level_of_study;
use App\loan;
use App\loan_list;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class loanlistController extends Controller
{
    public function index()
    {
        $loanlist = loan_list::all();

        $level = level_of_study::all();
        $xmlb = new  \DOMDocument("1.0","UTF-8");
        $xmlb->formatOutput="true";
        $xmlloanlist = $xmlb->createElement('LoanList');
        foreach($loanlist as $list){
            $loan =loan::find($list->loan_id)->first();
            $level = level_of_study::find($list->level_of_study_id)->first();
            $xmlInsideList = $xmlb->createElement('LoanDetails');
          //  $xmlloanid = $xmlb->createElement('loan_id', $list->loan_id);
          //  $xmllevelid = $xmlb->createElement('level_of_study_id', $list->level_of_study_id);
            $xmllevelamount = $xmlb->createElement('amount', $list->amount);
            $xmlloanname = $xmlb->createElement('loan_name', $loan->loan_name);
            $xmlldesc = $xmlb->createElement('loan_desc', $loan->loan_desc);
            $xmllevelname = $xmlb->createElement('level_of_study_name', $level->level_of_study_name);
            $xmlInsideList->setAttribute('level_of_study_id',$level->level_of_study_id);
            $xmlInsideList->setAttribute('loan_id',$loan->loan_id);

           // $xmlInsideList->appendChild($xmlloanid);
           // $xmlInsideList->appendChild($xmllevelid);
            $xmlInsideList->appendChild($xmllevelamount);
            $xmlInsideList->appendChild($xmlloanname);
            $xmlInsideList->appendChild($xmlldesc);
            $xmlInsideList->appendChild($xmllevelname);

            $xmlloanlist->appendChild($xmlInsideList);
        }
        $xmlb->appendChild($xmlloanlist);
        $xmlb->save("/xampp/htdocs/TARUCsystem/resources/views/XML/loanlist.xml");
        return view('department/loanlist_view');

    }

    public function create()
    {
        $loan = loan::all();
//
        $xmlls = new \DOMDocument("1.0","UTF-8");
        $xmlls->formatOutput=true;
        $xmlloan =$xmlls->createElement('LoanList');
        foreach($loan as $cam){
            $xmllss=$xmlls->createElement('Loan');
            $xmllname=$xmlls->createElement('loan_name',$cam->loan_name);
            $xmlldesc=$xmlls->createElement('loan_desc',$cam->loan_desc);

            $xmllss->setAttribute('loan_id',$cam->loan_id);
            $xmllss->appendChild($xmllname);
            $xmllss->appendChild($xmlldesc);
            $xmlloan->appendChild($xmllss);
        }
        $xmlls->appendChild($xmlloan);
        $xmlls->save("/xampp/htdocs/TARUCsystem/resources/views/XML/loan.xml");

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

        return view('department/loanlist_create');
    }


    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'amount' => 'required'
        ]);

        if ($validator->fails()) {
            Session::flash('error', $validator->messages()->first());
            return redirect()->back()->withInput();
        }else {
            $acc = new loan_list();
            $acc->loan_id = $request->get('loan_id');
            $acc->level_of_study_id = $request->get('level_of_study_id');
            $acc->amount = $request->get('amount');
            $acc->timestamps = false;
            $acc->save();
            return redirect('loanlist/create')->with('success', 'Information has been added');
        }
    }

}
