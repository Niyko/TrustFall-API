<?php
//Class to send SMS and Calls through MSG91
class Beacon {
	protected $username;
	protected $mobile;
	protected $link;

	public function __construct(string $username, string $mobile, string $link){
		$this->username = $username;
		$this->mobile = $mobile;
		$this->link = $link;
	}

	//Used to send SMS
	public function sendSMS(){
		$this->sendAPI("5f47aefad6fc0524a50b8937");
	}

	//Used to send calls
	public function sendCall(){

	}

	//Sending CURL request to MSG91 API
	private function sendAPI($flow_id){
		global $msg91_auth_key;
		$curl = curl_init();

		curl_setopt_array($curl, array(
		CURLOPT_URL => "https://api.msg91.com/api/v5/flow/",
		CURLOPT_RETURNTRANSFER => true,
		CURLOPT_ENCODING => "",
		CURLOPT_MAXREDIRS => 10,
		CURLOPT_TIMEOUT => 30,
		CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
		CURLOPT_CUSTOMREQUEST => "POST",
		CURLOPT_POSTFIELDS => '{
			"flow_id":"$flow_id",
			"sender" : "TRUSTFALL",
			 "recipients" : [
			   {
				 "mobiles":"$this->mobile",
				 "username":"$this->username",
				 "link" : "$this->link"
			   }
		   ]
		}',
		CURLOPT_SSL_VERIFYHOST => 0,
		CURLOPT_SSL_VERIFYPEER => 0,
		CURLOPT_HTTPHEADER => array(
			"authkey: $msg91_auth_key",
			"content-type: application/json"
		),
		));

		$response = curl_exec($curl);
		$err = curl_error($curl);

		curl_close($curl);

		if ($err) {
			return $err;
		} else {
			return $response;
		}
	}
}
?> 
