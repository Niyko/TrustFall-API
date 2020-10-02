<?php
//Load all essential framework compoents
require_once("../framework/config.php");
require_once("../model/user.php");
require_once("../framework/beacon.php");

//User given details
$mobile = $_GET["mobile"];
$password = $_GET["password"];

//Check if user exist
$existing_user = new UserModel($mobile, $password);
if($existing_user->isExist()){
    $tracking_link = "https://trustfall-tracking-link/476734673";
    $sms_call = new Beacon(
        $existing_user->details(),
        $tracking_link
    );
    $sms_call->sendSMS();
    
    print_json([
        "status" => true,
        "code" => "distress-call-sent",
    ]);
}
else {
    print_json([
        "status" => true,
        "code" => "user-not-found",
    ]);
}