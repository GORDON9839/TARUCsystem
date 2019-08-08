<?php


namespace App;


use PHPUnit\Framework\Constraint\IsTrue;

class CampusCreator
{
    private $assignedCampus;
    private $haveCampus = false;
    private $campus1 = 'KL Branch Campus';
    private $campus;

    function __construct()
    {
    }

    function checkCampus($campus)
    {
        if ($campus . is($campus)) {
            $this->haveCampus = true;
            return true;
        }
        return false;
    }



    function showCampusMsg(){
        if(true == $this->haveCampus){
          return   $msg = "This campus name already existed!";
        }
         return $msg = "New campus is created!";
    }




    function getCampus(){
        if(TRUE == $this->haveCampus){
            return $this->assignedCampus->getCampus();
        }else{
            return "The campus is new to database.";
        }
    }

    function assignedCampus(){
        $this->assignedCampus = CampusSingleton::createcampus();
        $assign = false;
        if($this->assignedCampus == NULL){
            $this->haveCampus = false;
        }else{
            $this->haveCampus = true;
            $assign = true;
        }
        return $assign;
    }

    function showMsg(){
        if($this->assignedCampus())
            $msg = "The campus name already existed. Please enter another name";
        else
            $msg= "Create successful";
        return $msg;
    }
}
