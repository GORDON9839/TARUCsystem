<?php

namespace App\Http\Controllers\Auth;

use App\department;
use App\faculty;
use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Http\Request;
class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = 'registration';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8'],
        ]);

    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {

        if($data['create_for'] =="faculty"){
            return User::create([
                'email' => $data['email'],
                'name' => $data['name'],
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
    function index(Request $request){
        $request->user()->authorizeRoles('admin');
        $request->user()->authorizeType(['faculty','department']);
        $faculty = faculty::all();
        $department = department::all();
        //create xml file
        $users = user::all();
        $xml = new \DOMDocument("1.0","UTF-8");
        $xml->formatOutput=true;
        $xmluser=$xml->createElement("StaffList");
        foreach ($users as $u){
            $xmlstaff=$xml->createElement('staff');
            $xmlstaffid=$xml->createElement('id',$u->id);
            $xmlstaffname=$xml->createElement('name',$u->name);
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
        $xml->save("/xampp/htdocs/TARUCsystem/resources/views/XML/staff.xml");


        return view('register_staff',compact('faculty'),compact('department'));

    }
    public function register(Request $request)
    {
        $this->validator($request->all())->validate();

        event(new Registered($user = $this->create($request->all())));


        return $this->registered($request, $user)
            ?: redirect($this->redirectPath());
    }
}
