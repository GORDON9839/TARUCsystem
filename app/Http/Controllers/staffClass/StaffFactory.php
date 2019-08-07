<?php


namespace App\Http\Controllers\staffClass;


class StaffFactory
{
    static function getStaff($type,$name,$email,$role){
        if($type="faculty"){
            return new FacultyStaff($name,$email,$role);
        }else{
            return new DepartmentStaff($name,$email,$role);
        }
}
}
