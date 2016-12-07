<?php


class UserModel extends Mysql {

	# ========== add fields of table ========= #
	public function fields() {

		// 'type_user' => 1 simple, 2 moderator, 3 admin

		return array(
			'nickname' => Models::charField('nickname', 80, 'not null', 'unique'),
			'name' => Models::charField('name', 80, 'not null'),
			'middlename' => Models::charField('middlename', 80, 'not null'),
			'password' => Models::passwordField('password', 150, 'not null'),
			'email' => Models::emailField('email', 150, 'not null', 'unique'),
			'type_user' => Models::integerField('type_user', 3, 'not null'),
			'description' => Models::textField('description', 'null')
		);
	}
}

?>