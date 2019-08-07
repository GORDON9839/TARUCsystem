<?php


namespace App;


class CampusCreator
{
    private $assignedCampus;
    private $haveCampus = false;

    function __construct()
    {
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
}
