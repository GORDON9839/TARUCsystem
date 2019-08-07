<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Controllers\staffClass\DepartmentStaff;
use App\Http\Controllers\staffClass\FacultyStaff;
use App\User;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Auth;
use App\Http\Controllers\staffClass\People;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */
    public function login(Request $request){

        if(Auth::attempt([
            'email' =>$request->email,
            'password' =>$request->password,

        ]))
        {
            $user = User::where('email',$request->email)->first();
            //from user calss get check which is not null and return back to here
            $role = $user->get_role();
            $_SESSION['role']=$role;
            $_SESSION['type']=$user->get_type();

            //$request->session()->put('role',$role);

            if($user->get_type() =="faculty"){
                $_SESSION['staff']= new FacultyStaff($user->name,$user->email,$user->role);
                // redirecting
                if($role=="admin"){
                    return redirect("manage_facultystaff");
                }elseif($role =="staff"){
                    return redirect('programmes');

                }
            }elseif($user->get_type() =="department"){
                $_SESSION['staff'] = new DepartmentStaff($user->name,$user->email,$user->role);
                //redirecting
                if($role=="admin"){
                    return redirect('managestaff');
                }elseif($role =="staff"){
                    return redirect('accommodations');
                }
            }
        }
        return redirect()->back();

    }
    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }
}
