<?php

function error_indice($array=[], $indice) {

	if ($indice > sizeof($array) - 1) {

		throw new Exception('<h4 id="exception">Not exists this indice in array!</h4>');

	} else {
		return $array[$indice];

	}
}

// use isset
function undefined($args) {

	if (!$args) {

			throw new Exception('<h4 id="exception">Variable undefined!</h4>');

	} else {

		return $args;
	}
}

function create_table($args) {
	
	if ($args == NULL) {

			throw new Exception('<h4 id="exception">Table not created!</h4>');

	} else {

		return $args;
	}
}

?>