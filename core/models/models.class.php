<?php 

class Models {

	private $obj;

	function __construct($obj='') {

		return $this->obj = $obj;
	}

	public function fetchArray() {

		return mysqli_fetch_array($this->obj);
	}


	public static function charField(
		$name='name',
		$maxlengh='100',
		$value='NOT NULL',
		$unique=''
	) {

		$value = strtoupper($value);
		$unique = strtoupper($unique);

		return "$name varchar($maxlengh) $value $unique";
	}

	public static function emailField(
		$name='email',
		$maxlengh='150',
		$value='NOT NULL',
		$unique=''
	) {

		$value = strtoupper($value);
		$unique = strtoupper($unique);

		return "$name varchar($maxlengh) $value $unique";
	}

	public static function textField(
		$name='comments',
		$value='NOT NULL',
		$unique=''
	) {

		$value = strtoupper($value);
		$unique = strtoupper($unique);

		return "$name text $value $unique";
	}
}

?>