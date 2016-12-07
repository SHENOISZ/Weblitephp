<?php

header ('Content-type: text/html; charset=UTF-8');

require "core/configs/configs.php";

$config = new globalConfig();

# ========= add request globals ========= #
$url = $_REQUEST['path'];
$request = "url:$url";
$request .= ','.$config->secretkey;
$request .= ','.$config->static.$config->selected_app."/assets";
# ======================================= #

require base_core('/exceptions/exceptions.php');
require base_app("/routers/routers.php");

?>