<?php
//Class to send SMS and Calls through TXT LOCAL
class Beacon {
	protected $username;
	protected $mobile;
	protected $link;

	public function __construct(Array $user_details, string $link){
		$this->user_details = $user_details;
		$this->link = $link;
	}

	//Used to send SMS
	public function sendSMS(){
		$msg = "Hey, This is a Emergency. {$this->user_details['username']} has been recorded as in a threat, by TrustFall App. Please make sure he/she is fine. Know more info about him/her {$this->link}";
		$this->sendAPI($this->user_details['emergency_contact'], $msg);
	}

	//Used to send calls
	public function sendCall(){

	}

	//Sending CURL request to MSG91 API
	private function sendAPI($mobile_no, $msg){
		global $txtlocal_auth_key;
		$numbers = array($mobile_no);
    	$sender = urlencode('TXTLCL');
    	$message = rawurlencode($msg);
    	$numbers = implode(',', $numbers);
    	$data = array('apikey' => urlencode($txtlocal_auth_key), 'numbers' => $numbers, "sender" => $sender, "message" => $message);
    	$ch = curl_init('https://api.textlocal.in/send/');
    	curl_setopt($ch, CURLOPT_POST, true);
    	curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
    	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    	$response = curl_exec($ch);
    	curl_close($ch);
    	return $response;
	}
}
?> 
