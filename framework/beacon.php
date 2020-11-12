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
		$this->sendAPI($this->user_details['emergency_contact'], $this->user_details['username']);
	}

	//Used to send calls
	public function sendCall(){

	}

	//Sending CURL request to MSG91 API
	private function sendAPI($mobile_no, $varname){
		$numbers = array($mobile_no);
    	$sender = urlencode('TRSFAL');
    	$numbers = implode(',', $numbers);
    	$data = array(
			'From' => $sender, 
			'To' => $numbers, 
			'TemplateName' => 'Trustfall', 
			'VAR1' => $varname
		);
    	$ch = curl_init('http://2factor.in/API/V1/390135f1-2461-11eb-83d4-0200cd936042/ADDON_SERVICES/SEND/TSMS');
    	curl_setopt($ch, CURLOPT_POST, true);
    	curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
    	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    	$response = curl_exec($ch);
    	curl_close($ch);
    	return $response;
	}
}
?> 
