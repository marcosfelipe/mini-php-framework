<?php
class Validator{
	public static $presence_of_message = 'Obrigatório';
	
	public static function presence_of($value){
	  return !empty($value);
	}
}
