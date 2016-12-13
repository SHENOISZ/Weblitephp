<?php 


class User {

	private $obj;

	function __construct() {

		$this->obj = new UserModel();
	}
	
	public function create_user($sql) {

		$nickname = '';
		$email = '';
		$auth = new Auth();

		foreach (explode(',', $sql) as $item) {

			$tmp = explode('=', $item);

			if (trim($tmp[0]) == 'nickname') {

				$nickname = $tmp[1];

			} else if (trim($tmp[0]) == 'email') {

				$email = $tmp[1];

			}
		}

		if (!$auth->exists("nickname=$nickname, email=$email")) {
			
			$this->obj->insert($sql);

			return true;
		}

		return false;
	}
}

?>