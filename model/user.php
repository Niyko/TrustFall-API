<?php
class UserModel {
	protected $mobile;
	protected $password;
	protected $user_data;

	public function __construct(string $mobile, string $password){
		global $db;
		$this->mobile = $mobile;
		$this->password = $password;
		$this->user_data = $db->where("mobile", $mobile)->getOne("users");
	}

	public function isExist(){
		return !is_null($this->user_data);
	}

	public function details(){
		return $this->user_data;
	}
}
?>