<?php

require base_core("/models/mysql.class.php");


class HomeModel extends Mysql {

	# ========== add fields of table ========= #
	public function fields() {

		return array(
			'name' => Models::charField('name', 80, 'not null'),
			'email' => Models::emailField('email', 150, 'not null'),
			'comments' => Models::textField('comments', 'NULL')
		);
	}
}

?>