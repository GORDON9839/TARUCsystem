<?php
header("Content-Type:application/json");
//require "retrievestaff.php";

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

if(!empty($_GET['staffname'])){
    $staffname = $_GET['staffname'];
    $email = get_email();

    if(empty($email)){
        response(200,"Name Not Found",NULL);

    }else{
        response(200,"Name Found",$email);
    }

} else{
    response(400,"Invalid Request",NULL);

}
function response($status,$status_message,$data){
    header("HTTP/1.1".$status);

    $response['status']=$status;
    $response['status_message']=$status_message;
    $response['data']=$data;
    $json_response = json_encode($response);
    echo $json_response;
}
