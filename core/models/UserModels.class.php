<?php


class UserModel extends Mysql {

	# ========== add fields of table ========= #
	public function fields() {

		return array(
			'nickname' => Models::charField('nickname', '80', 'not null', 'unique'),
			'name' => Models::charField('name', '80', 'not null'),
			'middlename' => Models::charField('middlename', '80', 'not null'),
			'email' => Models::emailField('email', '150', 'not null'),
			'description' => Models::textField('description', 'null')
		);
	}
}

?>