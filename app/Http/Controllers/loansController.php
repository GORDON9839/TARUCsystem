<?php

namespace App\Http\Controllers;

use App\loan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class loansController extends Controller
{
    public function index()
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
        return view('department/loan_view');
    }

    public function create()
    {
        return view('department/loan_create');
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'loan_name' => 'required',
            'loan_desc' => 'required'
        ]);

        if ($validator->fails()) {
            Session::flash('error', $validator->messages()->first());
            return redirect()->back()->withInput();
        }else {
            $cam = new loan();
            $cam->loan_name = $request->get('loan_name');
            $cam->loan_desc = $request->get('loan_desc');
            $cam->timestamps = false;
            $cam->save();
            return redirect('loan/create')->with('success', 'Information has been added');
        }
    }

    public function show($id)
    {
        $loan= loan::where('loan_id',$id)->first();
        return view('department/loan_view_detail',compact('loan','id'));
    }

    public function edit($id)
    {
        $loan= loan::where('loan_id',$id)->first();
        return view('department/loan_edit',compact('loan','id'));
    }

    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'loan_name' => 'required',
            'loan_desc' => 'required'
        ]);

        if ($validator->fails()) {
            Session::flash('error', $validator->messages()->first());
            return redirect()->back()->withInput();
        }else {
            $cam = loan::find($id);

            $cam->loan_name = $request->get('loan_name');
            $cam->loan_desc = $request->get('loan_desc');
            $cam->timestamps = false;
            $cam->save();

            return \Redirect::route('loan.show', array('id' => $id))->with('success', 'Information has been modify');
        }
    }

    public function destroy($id)
    {
        //
    }
}
