<?php

/*
# ================== Examples of consult: ============== #
//$obj = new HomeModel();
//$result = $obj->selectAll("name='shenoisz'");
//$result = $obj->insert("name='shenoisz', email='mk@dev.com', comments=''");
//$result = $obj->update("comments='developer php', name='MK'", "id=3");
//$result = $obj->updateAll("comments='developer php'");
//$result = $obj->delete("comments='developer php',name='MK', id=3");
//$result = $obj->deleteAll();
//print_r($res->fetchArray());
# ====================================================== #
*/

require base_core('/controls/controls.class.php');
require base_app('/models/HomeModels.class.php');
require base_core('/helpers/user.class.php');

class Controls extends CoreControls {
	

	function index($request=[]) {

		$obj = new User();
		$obj->logout();
		//$obj->login('shenoisz', 'kamikazi');

		$request['title'] = "Home";

		return $this->render("home/index.html", $request);
	}

	function about($request=[]) {

		$obj = new User();
		$obj->login('shenoisz', 'kamikazi');

		return $this->html("<h1>about</h1>".$_SESSION['shenoisz']);
	}

}


?>