<?php

class DB {

	private $pdo;

	public function __construct() {

		$dsn = DB_TYPE.":host=".DB_HOST.";dbname=".DB_NAME;
		$this->pdo = new \PDO($dsn, DB_USER, DB_PASS);
		$this->pdo->exec("SET NAMES 'utf8';");
	}

	
	public function query($query, $parameters = array()) {

//		print_r($query); print_r($parameters);

		$statement = $this->pdo->prepare($query);
		if(!empty($parameters)){
			foreach($parameters as $key => &$value) {
				$statement->bindParam($key, $value);
			}
		}
        if (false !== $statement->execute()) {
			return $statement;
        } else {
        	throw new ErrorException(print_r($statement->errorInfo(), true));
        }
	}

	public function lastInsertId($name) {
		return $this->pdo->lastInsertId($name);
	}
}
