<?php
//////////////////////////////
//Author: Goh Chun Lin
//Author Student ID: 18WMR08314
//////////////////////////////
namespace App\Http\Controllers;

use App\campus;
use App\programme;
use App\programme_list;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class programme_listsController extends Controller
{
    public function index(Request $request)
    {
        $request->user()->authorizeRoles(['admin','staff']);
        $request->user()->authorizeType(['faculty']);
        $campus = campus::all();
        return view('faculty/campus_view');

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $campus=campus::all();
        //$structure = structure::find('');

        $xmlc = new \DOMDocument("1.0","UTF-8");
        $xmlc->formatOutput=true;
        $xmlcampus=$xmlc->createElement('CampusOfferedList');
        foreach($campus as $camp){
            $xmlcamp=$xmlc->createElement('CampusOffered');
            $xmlcampname=$xmlc->createElement('campus_name',$camp->campus_name);
            $xmlcampdesc=$xmlc->createElement('campus_desc',$camp->campus_desc);
            $xmlcampadd=$xmlc->createElement('campus_address',$camp->campus_address);


            $xmlcamp->setAttribute('campus_id',$camp->campus_id);
            $xmlcamp->appendChild($xmlcampname);
            $xmlcamp->appendChild($xmlcampdesc);
            $xmlcamp->appendChild($xmlcampadd);


            $xmlcampus->appendChild($xmlcamp);
        }
        $xmlc->appendChild($xmlcampus);
        $xmlc->save("/xampp/htdocs/TARUCsystem/resources/views/XML/campus.xml");
        return view('faculty/campus_create');

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {


            $campus = $request->input('campus');
            //echo "<script type='text/javascript'>alert('$cur->curriculum_id');</script>";
            foreach ($campus as $cam) {


                    $camp = new programme_list;
                    $camp->campus_id = $cam;
                    $camp->programme_id = $request->get('programme');

                    $camp->timestamps = false;
                    $camp->save();



            }
            return redirect('campusoffered/create')->with('success', 'Information has been added');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $structure= programme_list::where('campus_id',$id)->get();
        $xmls = new \DOMDocument("1.0","UTF-8");
        $xmls->formatOutput=true;
        $xmlstructure=$xmls->createElement('ProgrammeOfferedList');
        foreach($structure as $struc){
            $programme = programme::find($struc->programme_id);
            $xmlstruc=$xmls->createElement('ProgrammeOffered');
            $xmlprogid=$xmls->createElement('programme_id',$struc->programme_id);
            $xmlcampid=$xmls->createElement('campus_id',$struc->campus_id);
            $xmlprogname=$xmls->createElement('programme_name',$programme->programme_name);
            $xmlprogcode=$xmls->createElement('programme_code',$programme->programme_code);

            $xmlstruc->appendChild($xmlprogid);
            $xmlstruc->appendChild($xmlcampid);
            $xmlstruc->appendChild($xmlprogname);
            $xmlstruc->appendChild($xmlprogcode);


            $xmlstructure->appendChild($xmlstruc);
        }
        $xmls->appendChild($xmlstructure);
        $xmls->save("/xampp/htdocs/TARUCsystem/resources/views/XML/programme_offered.xml");

        return view('faculty/campus_details');
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

        $progg = explode(",",$prog);
        echo "<script type='text/javascript'>alert('$progg[0]')</script>";

        $res=programme_list::where('programme_id',$progg[0])->where('campus_id',$progg[1])->delete();
        return redirect('subject')->with('success','Information has been deleted');
    }
}
