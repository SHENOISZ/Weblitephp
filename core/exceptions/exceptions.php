<?php

function error_indice($array=[], $indice) {

	if ($indice > sizeof($array) - 1) {

		throw new Exception('<h4 id="exception">Not exists this indice in array!</h4>');

	} else {
		return $array[$indice];

	}
}


function undefined($args) {

	if (isset($args)) {

		return $args;	

	} else {

		throw new Exception('<h4 id="exception">Variable undefined!</h4>');
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