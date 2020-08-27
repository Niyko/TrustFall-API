<?php
//Load all essential framework compoents
require_once("../framework/config.php");
require_once("../model/user.php");

//User given details
$mobile = $_GET["mobile"];
$password = $_GET["password"];

//Check if user exist
$existing_user = new UserModel($mobile, $password);
if($existing_user->isExist()){
    if($existing_user->details()['password']==$password){
        print_json([
            "status" => true,
            "code" => "user-found",
            "user_details" => $existing_user->details()
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