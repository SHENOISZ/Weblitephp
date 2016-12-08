<?php 

require base_core('/models/UserModels.class.php');

class User {

	private $obj;

	function __construct() {

		session_start();
		$this->obj = new UserModel();
	}


	public function exists($dados) {


		$this->obj->select($dados);

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
			$_SESSION['user'] = $result->fetchArray()['nickname'];
			$_SESSION['user_attr'] = $result->fetchArray();

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

	public function create_user(
		$nickname, 
		$name, 
		$middlename='Doe', 
		$password, 
		$email, 
		$type_user=1, 
		$description=''
	) {

		if (!$this->exists("nickname='$nickname', email='$email'")) {

			$this->obj->insert(
				"nickname='$nickname', 
				name='$name', 
				middlename='$middlename', 
				password='$password', 
				email='$email', 
				type_user='$type_user', 
				description='$description'"
			);

			return true;
		}

		return false;
	}
}

?>