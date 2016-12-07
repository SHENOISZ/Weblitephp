<?php 

require base_core('/models/UserModels.class.php');

class User {

	private $obj;

	function __construct() {

		$this->obj = new UserModel();
	}


	public function exists($user) {

		$this->obj->select("nickname='$user'");

		if ($this->obj->count() > 0) {

			return true;

		} else {
			return false;
		}
	}

	public function is_logged() {
		
	}

	public function login() {

	}

	public function logout() {

	}

	public function register($nickname, $name, $middlename, $email, $description='') {

		$this->obj->insert("nickname='$nickname', name='$name',middlename='$middlename', email='$email', description='$description'");
	}
}

?>