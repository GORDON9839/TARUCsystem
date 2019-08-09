<?php
//////////////////////////////
//Author: Tan Yi Si
//Author Student ID: 18WMR08426
//////////////////////////////
namespace App\Http\Controllers;

use App\department;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class DepartmentController extends Controller
{

    public function index(Request $request)
    {
        $request->user()->authorizeRoles(['admin','staff']);
        $request->user()->authorizeType(['department']);
        $department = department::all();
//
        $xmld = new \DOMDocument("1.0","UTF-8");
        $xmld->formatOutput=true;
        $xmldepartment =$xmld->createElement('DepartmentList');
        foreach($department as $dep){
            $xmldep=$xmld->createElement('Department');
            $xmldepname=$xmld->createElement('department_name',$dep->department_name);
            $xmldepdesc=$xmld->createElement('department_desc',$dep->department_desc);
            $xmldepsname=$xmld->createElement('department_short_name',$dep->department_short_name);

            $xmldep->setAttribute('department_id',$dep->department_id);
            $xmldep->appendChild($xmldepname);
            $xmldep->appendChild($xmldepdesc);
            $xmldep->appendChild($xmldepsname);
            $xmldepartment->appendChild($xmldep);
        }
        $xmld->appendChild($xmldepartment);
        $xmld->save("/xampp/htdocs/TARUCsystem/resources/views/XML/department.xml");
        return view('department/department_view');
    }

    public function create()
    {
        return view('department/department_create');
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'department_name' => 'required',
            'department_desc' => 'required',
            'department_short_name' => 'required'
        ]);

        if ($validator->fails()) {
            Session::flash('error', $validator->messages()->first());
            return redirect()->back()->withInput();
        }else {
            $dep = new department();
            $dep->department_name = $request->get('department_name');
            $dep->department_short_name = $request->get('department_short_name');
            $dep->department_desc = $request->get('department_desc');
            $dep->timestamps = false;
            $dep->save();
            return redirect('department/create')->with('success', 'Information has been added');
        }
    }

    public function show($id)
    {
        $department= department::where('department_id',$id)->first();
        return view('department/department_view_detail',compact('department','id'));
    }

    public function edit($id)
    {
        $department= department::where('department_id',$id)->first();
        return view('department/department_edit',compact('department','id'));
    }

    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'department_name' => 'required',
            'department_desc' => 'required',
            'department_short_name' => 'required'
        ]);

        if ($validator->fails()) {
            Session::flash('error', $validator->messages()->first());
            return redirect()->back()->withInput();
        }else {
            $dep = department::find($id);

            $dep->department_name = $request->get('department_name');
            $dep->department_desc = $request->get('department_desc');
            $dep->department_short_name = $request->get('department_short_name');
            $dep->timestamps = false;
            $dep->save();

            return \Redirect::route('department.show', array('id' => $id))->with('success', 'Information has been modify');
        }
    }

    public function destroy($id)
    {
        department::where('department_id',$id)->delete();
        return redirect('department')->with('success','Information has been deleted');
    }
}
