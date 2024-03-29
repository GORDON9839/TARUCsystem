<?php
//////////////////////////////
//Author: Jack Soh Boon Keat
//Author Student ID: 18WMR08426
//////////////////////////////

namespace App\Http\Controllers\staffClass;


class DepartmentStaff extends People
{

    private $name = "";
    private $email= "";
    private $role="";
    /**
     * @return mixed
     */
    public function __construct(string $name,String $email,String $role)
    {
        $this->name = $name;
        $this->email = $email;
        $this->role = $role;
    }
    function getName()
    {
        return $this->name;
    }

    function getType()
    { return 'department';

    }

    function getEmail()
    {
        return $this->email;
    }

    function getRole()
    {
        return $this->role;
    }
}
