<?php
class User extends DBObject {

	protected static $table = 'users';

	protected $id;
	protected $create_time;
	protected $login;
	protected $password;

	public function getVar($name){
		return $this->$name;
	}
}
