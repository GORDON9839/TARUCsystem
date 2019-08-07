<?php
//////////////////////////////
//Author: Jack Soh Boon Keat
//Author Student ID: 18WMR08426
//////////////////////////////

namespace App\Http\Controllers\staffClass;


class FacultyStaff extends People
{

    private $type = "";
    private $name = "";
    private $email= "";
    private $role="";

    /**
     * FacultyStaff constructor.
     * @param string $name
     */
    public function __construct(string $name,String $email,String $role)
    {
        $this->name = $name;
        $this->email = $email;
        $this->role = $role;
    }

    /**
     * @return mixed
     */
    function getName()
    {
        return $this->name;
    }

    function getType()
    { return "faculty";

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
