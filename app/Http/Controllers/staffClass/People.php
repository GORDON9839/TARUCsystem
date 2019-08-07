<?php
//////////////////////////////
//Author: Jack Soh Boon Keat
//Author Student ID: 18WMR08426
//////////////////////////////

namespace App\Http\Controllers\staffClass;


 abstract class People
{
     /**
      * @return mixed
      */
     abstract function getName();
     abstract function getType();
     abstract function getEmail();
     abstract function getRole();
}
