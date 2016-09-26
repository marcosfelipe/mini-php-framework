<?php

class MysqlConnection{
	private $link;
	public static $host = 'localhost';
	public static $username = 'root';
	public static $password = 'root';
	public static $dbname = 'mapa';

	function __construct(){
		$this->connect();
	}

	public function connect(){
		$this->link = new mysqli(self::$host, self::$username, self::$password);
		if(!empty(self::$dbname)) $this->link->select_db(self::$dbname);
		if (!$this->link) {
		    die('Não foi possível conectar: ' . mysqli_connect_error());
		}
		$this->link->set_charset('utf8');
	}

	public function query($query){
		$result = $this->link->query($query);
		return $result;
	}

	public function prepare($query){
		return $this->link->prepare($query);
	}

	public function use_db($dbname){
		$this->link->select_db($dbname);
	}

	public function error(){
		return $this->link->error;
	}

	public function multi_query($queries){
		$result = $this->link->multi_query($queries);
		return $result;
	}
}
