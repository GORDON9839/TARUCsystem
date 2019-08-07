<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class subject extends Model
{
    protected $primaryKey='subject_id';
    public $timestamps=false;
    protected $fillable=['subject_id','subject_name','credit_hour','subject_code'];
}
