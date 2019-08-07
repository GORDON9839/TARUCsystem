<?php


namespace App;


class CampusSingleton
{
    private $campus_name = 'KL Branch Campus';
    private static $campus = NULL;
    private static $assigned = False;

    private function __construct()
    {
    }

    static function createcampus(){
        if(False == self::$assigned){
            if(NULL == self::$campus){
                self::$campus = new CampusSingleton();
            }
            self::$assigned=true;
            return self::$campus;
        }else{
            return NULL;
        }
    }

    function getCampus(){return $this->campus_name;}
}
