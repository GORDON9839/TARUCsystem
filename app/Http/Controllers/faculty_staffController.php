<?php
//////////////////////////////
//Author: Jack Soh Boon Keat
//Author Student ID: 18WMR08426
//////////////////////////////
namespace App\Http\Controllers;

use App\department;
use App\faculty;
use App\programme;
use App\User;
use Illuminate\Http\Request;

class faculty_staffController
{

        function index(Request $request)
        {

            $request->user()->authorizeRoles(['admin']);
            $request->user()->authorizeType(['faculty']);
            //create xml file
            $users = user::whereNotNull("faculty_id")->get();

            $xml = new \DOMDocument("1.0", "UTF-8");
            $xml->formatOutput = true;
            $xmluser = $xml->createElement("StaffList");
            foreach ($users as $u) {


                    $xmlstaff = $xml->createElement('staff');
                    $xmlstaffid = $xml->createElement('id', $u->id);
                    $xmlstaffname = $xml->createElement('name', $u->name);
                    $xmlstaffemail = $xml->createElement('email', $u->email);
                    $xmlstaffremember_token = $xml->createElement('remember_token', $u->remember_token);
                    $xmlstaffdepartment_id = $xml->createElement('department_id', $u->department_id);
                    $xmlstafffaculty_id = $xml->createElement('faculty_id', $u->faculty_id);
                    $xmlstaffrole = $xml->createElement('role', $u->role);

                    $xmlstaff->setAttribute('user_id', $u->id);
                    $xmlstaff->appendChild($xmlstaffid);
                    $xmlstaff->appendChild($xmlstaffname);
                    $xmlstaff->appendChild($xmlstaffremember_token);
                    $xmlstaff->appendChild($xmlstaffemail);
                    $xmlstaff->appendChild($xmlstaffdepartment_id);
                    $xmlstaff->appendChild($xmlstafffaculty_id);
                    $xmlstaff->appendChild($xmlstaffrole);
                    $xmluser->appendChild($xmlstaff);

                $xml->appendChild($xmluser);
                $xml->save("/xampp/htdocs/TARUCsystem/resources/views/XML/faculty_staff.xml");
            }
            return view('faculty/faculty_manage_staff',compact($users));
        }

        public function update(Request $request,$id){
            $user = user::find($id);

            $user->role = $request->get('role');
//        $user->updated_at=Carbon::now()->toDateTime();
            $user->save();

            return redirect('manage_facultystaff');
        }
        public function store(){

        }

}
