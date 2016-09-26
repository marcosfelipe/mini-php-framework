<?php
class Flash{
	private $current_key = 'notice';

	function __construct($flash_key){
		if(!isset($_SESSION['flash'])) $_SESSION['flash'] = [];
		$this->current_key = $flash_key;
	}

	public function add($message){
		$_SESSION['flash'][$this->current_key] = $message;
	}

	public static function messages(){
		$messages = isset($_SESSION['flash']) ? $_SESSION['flash'] : [];
		unset($_SESSION['flash']);
		return $messages;
	}
}

function flash($key){
	return new Flash($key);
}

function flash_messages(){
	return Flash::messages();	
}
