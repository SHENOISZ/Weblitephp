<?php


class CoreControls {

	private $path = "/views/";

	public function html($args) {

		echo($args);

	}

	public function render($args, $context=[]) {

		if (isset($_SESSION['user'])) {

			$context['user'] = $_SESSION['user'];
			$context['user_attr'] = $_SESSION['user_attr'];

		} else {

			$context['user'] = '';
			$context['user_attr'] = '';
		}

		include base_app($this->path.$args);

	}

	public function redirect($args) {

		header("location:$args");
		
	}

}

?>
