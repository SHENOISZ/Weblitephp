<?php 

# ========= yours includes views ========= #
require base_core("/routers/routers.class.php");
require base_app("/controls/HomeControls.class.php");
# ======================================= #

$routers = new Routers($request);
$controls = new Controls();

# ========== add yours routers ============== #
switch ($url) {

	case "home":
		$controls->index($routers->request());
		break;

	case "about":
		$controls->about($routers->request());
		break;	

	default:
		$controls->index($routers->request());
}
# ============================================ #

?>