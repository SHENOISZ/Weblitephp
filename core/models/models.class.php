<?php 

class Models {

	private $obj;

	function __construct($obj) {

		return $this->obj = $obj;
	}

	public function fetchArray() {

		$dados = [];
		$count = 0;
		
		while ($dado = mysqli_fetch_array($this->obj)) {

			$dados[$count] = $dado;
			$count++;
		}

		return $dados;
	}

	public static function integerField(
		$name='integer',
		$maxlengh=11,
		$value='NOT NULL',
		$unique=''
	) {

		$value = strtoupper($value);
		$unique = strtoupper($unique);

		return "$name int($maxlengh) $value $unique";
	}

	public static function charField(
		$name='name',
		$maxlengh=100,
		$value='NOT NULL',
		$unique=''
	) {

		$value = strtoupper($value);
		$unique = strtoupper($unique);

		return "$name varchar($maxlengh) $value $unique";
	}

	public static function emailField(
		$name='email',
		$maxlengh=150,
		$value='NOT NULL',
		$unique=''
	) {

		$value = strtoupper($value);
		$unique = strtoupper($unique);

		return "$name varchar($maxlengh) $value $unique";
	}

	public static function passwordField(
		$name='password',
		$maxlengh=150,
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

	public static function slugField(
		$name='slug',
		$maxlengh=250,
		$value='NOT NULL',
		$unique=''
	) {

		$value = strtoupper($value);
		$unique = strtoupper($unique);

		return "$name varchar($maxlengh) $value $unique";
	}

	public static function booleanField(
		$name='bool',
		$value='NOT NULL',
		$unique=''
	) {

		$value = strtoupper($value);
		$unique = strtoupper($unique);

		return "$name boolean $value $unique";
	}
}

?>