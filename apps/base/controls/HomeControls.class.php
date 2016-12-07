<?php

require base_core('/controls/controls.class.php');
require base_app('/models/HomeModels.class.php');

class Controls extends CoreControls {
	

	function index($request=[]) {

		$request['title'] = "Home";

		return $this->render("home/index.html", $request);
	}

	function about($request=[]) {

		return $this->html("<h1>about</h1>");
	}

}


?>