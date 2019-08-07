<?php

namespace App\Http\Controllers;

use App\programme;
use App\structure;
use Illuminate\Http\Request;

function get_email($staffname)
{
    $staff = user::all();
    foreach ($staff as $s) {
        if ($s->name == $staffname) {
            $email = $s->email;
            return $email;
        }
    }
    return null;
}
