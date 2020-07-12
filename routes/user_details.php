<?php
//Load all essential framework compoents
require_once("../framework/config.php");

//User given details
$mobile = $_GET["mobile"];
$password = $_GET["password"];

//Check if user exist
$existing_user = $db->where("mobile", $mobile)->getOne("users");
if(!is_null($existing_user)){
    if($existing_user['password']==$password){
        print_json([
            "status" => true,
            "code" => "user-found",
            "user_details" => $existing_user
        ]);
    }
    else {
        print_json([
            "status" => false,
            "code" => "user-pass-incorrect",
            "description" => "Password of this user didn't match"
        ]);
    }
}
else {
    print_json([
        "status" => false,
        "code" => "user-non-exist",
        "description" => "This user does not exist"
    ]);
}