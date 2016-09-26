<?php

class Auth{
	public $default_username_column = 'login';
	public $default_password_column = 'password';
	private $model;
	public $errors = [];

	function __construct($model, $login, $password){
		$this->model = $model;
		$this->{$this->default_username_column} = $login;
		$this->{$this->default_password_column} = $password;
	}

	public function create(){
		$login = $this->{$this->default_username_column};
		$pass = $this->{$this->default_password_column};
		if(empty($login) || empty($pass)){
			$this->errors[$this->default_username_column] = 'Obrigatório';
			$this->errors[$this->default_password_column] = 'Obrigatório';
			return false;
		}
		$user = $this->model->find_by([$this->default_username_column => $login, $this->default_password_column => $pass]);
		if(!$user){
			$this->errors[$this->default_username_column] = 'Usuário ou Senha incorreta!';
			return false;
		}
		$_SESSION['id'] = $user->id;
		return true;
	}

	public function destroy(){
		if(isset($_SESSION['id'])) unset($_SESSION['id']);
	}


  public function errors_for($field_name){
    return isset($this->errors[$field_name]) ? $this->errors[$field_name] : '';
  }

  public function current_user(){
  	if(isset($_SESSION['id'])){
  		$user = $this->model->find($_SESSION['id']);
  		return $user;
  	}
  	return false;
  }
}
