<?php

require base_core("/models/mysql.class.php");

class CoreControls {

	private $path = "/views/";

	public function html($args) {

		echo($args);

	}

	public function render($args, $context=[]) {

		include base_app($this->path.$args);

	}

	public function redirect($args) {

		header("location:$args");
		
	}

}

?>
