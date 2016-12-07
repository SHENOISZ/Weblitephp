<?php

function error_indice($array=[], $indice) {

	if ($indice > sizeof($array) - 1) {

		throw new Exception("<h4 style='color:red;'>Not exists this indice in array!</h4>");

	} else {
		return $array[$indice];

	}
}

// use with isset
function undefined($args) {

	if ($args == NULL) {

			throw new Exception("<h4 style='color:red;'>Variable undefined!</h4>");

	} else {

		return $args;
	}
}

function create_table($args) {
	
	if ($args == NULL) {

			throw new Exception("<h4 style='color:red;'>Table not created!</h4>");

	} else {

		return $args;
	}
}

?>