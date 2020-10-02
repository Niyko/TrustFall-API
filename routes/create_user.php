<?php
//Load all essential framework compoents
require_once("../framework/config.php");
require_once("../model/user.php");

//User given details
$username = $_POST["username"];
$mobile = $_POST["mobile"];
$password = $_POST["password"];
$emergency_contact = $_POST["emergency_contact"];

//Check if user exist
$existing_user = (new UserModel($mobile, $password))->isExist();
if(!$existing_user){
    $user_data = Array (
        "username" => $username,
        "mobile" => $mobile,
        "password" => $password,
        "emergency_contact" => $emergency_contact
    );
    $id = $db->insert ('users', $user_data);
    if($id){
        print_json([
            "status" => true,
            "code" => "user-created",
            "user_id" => $id,
            "user_mobile" => $mobile,
            "description" => "User is successfully created"
        ]);
    }
    else{
        print_json([
            "status" => false,
            "code" => "error",
            "description" => "Something went wrong while registering"
        ]);
    }
}
else {
    print_json([
        "status" => false,
        "code" => "user-exist",
        "description" => "This user already exists"
    ]);
}