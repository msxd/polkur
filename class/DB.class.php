<?php
/**
 * To jest klasa odpowiedzialna za wykonywanie zapytań do bazy danych
 */
class DB {

	private $pdo;

	/* nawiązanie połączenia PDO z bazą danych w konstruktorze */
	public function __construct($dbtype, $dbhost, $dbname, $dbuser, $dbpass) {

		$dsn = "$dbtype:host=$dbhost;dbname=$dbname";
		$this->pdo = new \PDO($dsn, $dbuser, $dbpass);
		$this->pdo->exec("SET NAMES 'utf8';");
	}

	/* wykonanie zapytania PDO */
	public function query($query, $parameters = array()) {

//		print_r($query); print_r($parameters);

		$statement = $this->pdo->prepare($query);

		foreach($parameters as $key => &$value) {
            $statement->bindParam($key, $value);
        }

        if (false !== $statement->execute()) {
        	return $statement;
        } else {
        	throw new ErrorException(print_r($statement->errorInfo(), true));
        }
	}

	public function lastInsertId($name = NULL) {
		return $this->pdo->lastInsertId($name);
	}
}
