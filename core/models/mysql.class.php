<?php

require base_core("/models/models.class.php");
require base_app("/config/config.class.php");

class Mysql extends localConfig {

	public $table;
	private $count;
	private $filter;
	private $configs;


	# ======= create table if not exists ==========#
	function __construct() {

		$this->count = 0;
		$this->table = get_class($this);
		$this->filter = new Text();
		$this->configs = new globalConfig();

		$create = "CREATE TABLE IF NOT EXISTS ".$this->table." ( id int(11) NOT NULL UNIQUE AUTO_INCREMENT";

		foreach ($this->fields() as $field) {
			$create .= ",".$field;
		}

		$create .= ",PRIMARY KEY (id) );";
		
		try {

			create_table($this->connect()->query($create));

		} catch (Exception $e) {
			
			echo $e->getMessage();
		}
	
	}

	# ========== return object mysqli ========= #
	public function connect() {

		$conn = new mysqli(
			$this->server, 
			$this->user, 
			$this->password, 
			$this->database
		);

		return $conn;
	}

	# =========== retorn fieds, values, where+fields+values =========== #
	private function sql($fields) {

		$field = " WHERE ";
		$field_ = '';
		$values = '';

		foreach (explode(',', $fields) as $item) {

			$tmp = explode('=', $item);

			$campos = trim($tmp[0]);

			if ($campos == 'slug') {

				$filted = $this->filter->slugfy($tmp[1]);

			} else if ($campos == 'password') {

				$filted = $this->filter->passwordfy($this->configs->get_secretkey(), $tmp[1]);

			} else {

				$filted = $this->filter->sql_verify($tmp[1]);
			}	 


			$field .= $campos."="."'$filted'"." AND ";
			$values .= "'$filted'".", ";

			$field_ .=  $campos.", ";
			
		}

		$field_ = substr($field_, 0, strlen($field_) - 2);
		$values = substr($values, 0, strlen($values) - 2);
		$field = substr($field, 0, strlen($field) - 5);

		//print_r([$field_, $values, $field]);

		return [$field_, $values, $field];
	}

	# =========== make a query in mysql =========== #
	public function query($sql) {

		$result = $this->connect()->query($sql);
		
		try {

			$this->count = undefined(isset($result->num_rows));

		} catch(Exception $e) {

			$this->count = 0;
		}

		$this->connect()->close();
		
		return $result;
	}

	# ============ return consult in mysql with limit 1 ===== #
	public function select($fields) {

		$fields_ = $this->sql($fields);
		$sql = "SELECT ".$fields_[0]." FROM ".$this->table.$fields_[2]." LIMIT 1;";
		$result = $this->connect()->query($sql);

		try {

			$this->count = undefined($result->num_rows);

		} catch(Exception $e) {

			$this->count = 0;
		}
		
		$this->connect()->close();

		return new Models($result);
	}

	# ============ return consult in mysql with limit 1 ===== #
	public function select_($fields) {

		$fields_ = $this->sql($fields);
		$sql = "SELECT * FROM ".$this->table.$fields_[2]." LIMIT 1;";
		$result = $this->connect()->query($sql);

		try {

			$this->count = undefined($result->num_rows);

		} catch(Exception $e) {

			$this->count = 0;
		}
		
		$this->connect()->close();

		return new Models($result);
	}

	# ============ return consult in mysql ========= #
	public function selectAll($fields) {

		$fields_ = $this->sql($fields);
		$sql = "SELECT ".$fields_[0]." FROM ".$this->table.$fields_[2].";";
		$result = $this->connect()->query($sql);
		
		try {

			$this->count = undefined($result->num_rows);

		} catch(Exception $e) {

			$this->count = 0;
		}

		$this->connect()->close();

		return new Models($result);
	}

	# ============ return consult in mysql ===== #
	public function selectAll_($fields) {

		$fields_ = $this->sql($fields);
		$sql = "SELECT * FROM ".$this->table.$fields_[2].";";
		$result = $this->connect()->query($sql);
		
		try {

			$this->count = undefined($result->num_rows);

		} catch(Exception $e) {

			$this->count = 0;
		}

		$this->connect()->close();

		return new Models($result);
	}

	# ========= do insert in mysql ============ #
	public function insert($fields) {

		$fields_ = $this->sql($fields);
		$sql = "INSERT INTO ".$this->table." (".$fields_[0].") VALUES (".$fields_[1].");";
		$result = $this->connect()->query($sql);
		$this->count = 0;
		$this->connect()->close();

		return $result;
	}

	# ========= do update in mysql ============ #
	public function update($fields, $where='id=1') {

		$where = str_replace(",", " AND ", $where);
		$sql = "UPDATE ".$this->table." SET ".$fields." WHERE ".$where.";";
		$result = $this->connect()->query($sql);
		$this->count = 0;
		$this->connect()->close();

		return $result;
	}

	# ========= update all in mysql ============ #
	public function updateAll($fields) {

		$sql = "UPDATE ".$this->table." SET ".$fields.";";
		$result = $this->connect()->query($sql);
		$this->count = 0;
		$this->connect()->close();

		return $result;
	}

	# ========= do delete in mysql ============ #
	public function delete($where='') {

		$where = str_replace(",", " AND ", $where);
		$sql = "DELETE FROM ".$this->table." WHERE ".$where.";";
		$result = $this->connect()->query($sql);
		$this->count = 0;
		$this->connect()->close();

		return $result;
	}

	# ========= delete all in mysql ============ #
	public function deleteAll() {

		$sql = "DELETE FROM ".$this->table.";";
		$result = $this->connect()->query($sql);
		$this->count = 0;
		$this->connect()->close();

		return $result;
	}

	# ========= retun total de items ============ #
	public function count() {
		return $this->count;
	}
}


?>