<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password','role','faculty_id','department_id',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
    //check whether belongs to faculty or department
    public function get_type(){
        if(isset($this->faculty_id)){
            return "faculty";
        }else{
            return "department";
        }
    }
    public function get_role(){
        //dummy data
        $role=$this->role;
        return $role;
    }

    public function authorizeRoles($role)
    {

        if (is_array($role)) {
            return $this->hasAnyRole($role) ||
                abort(401, 'This action is unauthorized.');
        }
        return $this->hasRole($role) ||
            abort(401, 'This action is unauthorized.');
    }

    public function authorizeType($type)
    {

        if (is_array($type)) {
            return $this->hasAnyType($type) ||
                abort(401, 'This action is unauthorized.');
        }
        return $this->hasType($type) ||
            abort(401, 'This action is unauthorized.');
    }
    //Check multiple role

    public function hasAnyRole($role)
    {

        foreach ($role as $r){
            if($this->get_role() ==$r){
                return $role;
            }
        }
        return null;


    }
    //Check one role
    public function hasRole($role)
    {
        if($this->get_role() ==$role){
            return $role;
        }else{
            return null ;
        }
    }
    public function hasAnyType($type)
    {

        foreach ($type as $t){
            if($this->get_type() ==$t){
                return $type;
            }
        }
        return null;


    }
    //Check one role
    public function hasType($type)
    {
        if($this->get_type() ==$type){
            return $type;
        }else{
            return null ;
        }
    }
}
