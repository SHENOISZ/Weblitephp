<?php

header ('Content-type: text/html; charset=UTF-8');

require "core/configs/configs.php";


$config = new globalConfig();

# ========= add request globals ========= #
if(isset($_REQUEST['path'])) {
	
	$url = $_REQUEST['path'];

} else {

	$url = 'home';
}

$request = "url:$url";
$request .= ','.$config->secretkey;
$request .= ','.$config->static.$config->selected_app."/assets";
# ======================================= #

require base_core('/exceptions/exceptions.php');
require base_core('/helpers/text.class.php');
require base_app("/routers/routers.php");

?>