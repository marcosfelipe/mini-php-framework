<?php

class MysqlConnection{
	private $link;

	function __construct(){
		$this->connect();
	}

	public function connect(){
		$this->link = new mysqli('localhost', 'root', 'root', 'mapa');
		if (!$this->link) {
		    die('Não foi possível conectar: ' . mysqli_connect_error());
		}
		mysqli_set_charset($this->link, 'utf8');
	}

	public function query($query){
		return $this->link->query($query);
	}

	public function prepare($query){
		return $this->link->prepare($query);
	}
}
