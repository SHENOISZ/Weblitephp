<?php

/*
# ================== Examples of consult ============== #
//$obj = new HomeModel();
//$result = $obj->select("name=shenoisz");
//$result = $obj->select_("name=shenoisz");
//$result = $obj->selectAll("name=shenoisz");
//$result = $obj->selectAll_("name=shenoisz");
//$obj->insert("name=shenoisz, email=mk@dev.com, password=123456, slug=url de teste ,comments=");
//$obj->update("comments=developer php, name=MK", "id=3");
//$obj->updateAll("comments=developer php");
//$obj->delete("comments=developer php,name=MK, id=3");
//$obj->deleteAll();
//print_r($result->fetchArray());
//echo $obj->count();
# ====================================================== #
*/

/*
# ================== Examples class User ============== #
//$obj = new User();
//$obj->create_user("nickname=mk, name=mk, middlename=mk, password=123, email=mk@dev.com, type_user=1, description=");
//$obj->logout();
//$obj->sessionClear();
//$obj->login("email=dev@dev.com, password=kamikazi");
//$obj->login("nickname=shenoisz, password=123");
# ====================================================== #
*/

require base_core('/controls/controls.class.php');
require base_app('/models/HomeModels.class.php');
//require base_core('/helpers/user.class.php');

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