<?php


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
