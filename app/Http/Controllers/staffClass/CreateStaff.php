<?php


namespace App\Http\Controllers\staffClass;


class CreateStaff
{
    static function getStaff($type,$name,$email,$role){
        if($type="faculty"){
            return new FacultyStaff($name,$email,$role);
        }elseif($type="admin"){
            return new DepartmentStaff($name,$email,$role);
        }
}
}
