<?php


namespace App\Http\Controllers;


use App\department;
use App\faculty;
use App\programme;
use App\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;


class userControllers
{
    function index(Request $request){

        $faculty = faculty::all();
        $department = department::all();
        //create xml file
        $users = user::all();
        $xml = new \DOMDocument("1.0","UTF-8");
        $xml->formatOutput=true;
        $xmluser=$xml->createElement("StaffList");
        foreach ($users as $u){
            $xmlstaff=$xml->createElement('staff');
            $xmlstaffid=$xml->createElement('id',$u->staff_id);
            $xmlstaffname=$xml->createElement('name',$u->staff_name);
            $xmlstaffemail=$xml->createElement('email',$u->email);
            $xmlstaffremember_token=$xml->createElement('remember_token',$u->remember_token);
            $xmlstaffdepartment_id=$xml->createElement('department_id',$u->department_id);
            $xmlstafffaculty_id=$xml->createElement('faculty_id',$u->faculty_id);
            $xmlstaffrole=$xml->createElement('role',$u->role);

            $xmlstaff->setAttribute('user_id',$u->id);
            $xmlstaff->appendChild($xmlstaffid);
            $xmlstaff->appendChild($xmlstaffname);
            $xmlstaff->appendChild($xmlstaffremember_token);
            $xmlstaff->appendChild($xmlstaffemail);
            $xmlstaff->appendChild($xmlstaffdepartment_id);
            $xmlstaff->appendChild($xmlstafffaculty_id);
            $xmlstaff->appendChild($xmlstaffrole);

            $xmluser->appendChild($xmlstaff);
        }
        $xml->appendChild($xmluser);
        $xml->save("/xampp/htdocs/TARUCsystem/resources/views/XML/all_staff.xml");



        return view('manage_staff',compact('faculty'),compact('department'));

    }
    protected function create(array $data)
    {
        echo $data['role'];
        if($data['create_for'] =="faculty"){
            return User::create([
                'name' => $data['name'],
                'email' => $data['email'],
                'password' => Hash::make($data['password']),
                'role' =>$data['role'],
                'faculty_id' => $data['ddl_create_for']
            ]);
        }else{
            return User::create([
                'name' => $data['name'],
                'email' => $data['email'],
                'password' => Hash::make($data['password']),
                'role' =>$data['role'],
                'department_id' => $data['ddl_create_for']
            ]);
        }
    }
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
    }
    public function update(Request $request,$id){


        $user = user::find($id);

        $user->role = $request->get('role');
//        $user->updated_at=Carbon::now()->toDateTime();
        $user->save();
        echo "<script type='text/javascript'>alert('Update Successfully!!');</script>";
        return redirect('user');
    }
}
