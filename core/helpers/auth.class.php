<?php 

require base_core("/models/mysql.class.php");
require base_core('/models/UserModels.class.php');

class Auth {

	private $obj;

	function __construct() {

		session_start();
		$this->obj = new UserModel();
	}


	public function exists($dados) {

		$result = $this->obj->select($dados);

		if ($this->obj->count() > 0) {

			return true;

		} 

		return false;
	}

	public function is_logged($user) {

		if (isset($_SESSION[$user])) {

			if ($_SESSION['user'] == $user) {

				return true;
			}

			return false;
		}

		return false;
		
	}

	public function login($dados) {

		if ($this->exists($dados)) {

			$result = $this->obj->select_($dados);
			$_SESSION['user'] = $result->fetch_array()['nickname'];
			$_SESSION['user_attr'] = $result->fetch_array();

			return true;
		}

		return false;
	}

	public function logout() {

		if (isset($_SESSION['user'])) {

			unset($_SESSION['user']);

			return true;
		}

		return false;
	}

	public function sessionClear() {

		session_destroy();
	}
}

?>