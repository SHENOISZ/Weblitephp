<?php 

class globalConfig {

	# ============ appkey =========== #
	public $secretkey = "secretkey:fklriyp673uazlçp80837264gjlkprjehdhauq2i96klobbpupmdor";
	# ========== path static ========= #
	public $static = "static:/apps/";
	# ============ selected app ============ #
	public $selected_app = "example";
}

# ============ return absolute path =========== #

function base_app($path) {

	$config = new globalConfig();

	return $_SERVER['DOCUMENT_ROOT']."/apps/".$config->selected_app.$path;
}

function base_core($path) {

	return $_SERVER['DOCUMENT_ROOT']."/core/".$path;
}

function base_path() {

	return $_SERVER['DOCUMENT_ROOT'];
}

# ============================================== #

?>