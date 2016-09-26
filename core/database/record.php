<?php

require 'mysql_connection.php';
require 'validator.php';

class Record extends MysqlConnection {
  private $methods = [];
  public $table_name;
  public $attributes = [];
  public $errors = [];
  private $attributes_to_check = [];
  private $attribute_values = [];

  function __construct($table_name, $attribute_values = []){
    parent::__construct();
	  $this->table_name = $table_name;
    $this->attribute_values = $attribute_values;
  }

  public function register($method, $function) {
    $this->methods[$method] = \Closure::bind($function, $this, get_class());
  }

  function __call($method, $args) {
    if(is_callable($this->methods[$method])){
      return call_user_func_array($this->methods[$method], $args);
    }
  }

  public function all(){
		$result = $this->query("select * from {$this->table_name}");
  	$tuples = [];
  	while ($row = mysqli_fetch_object($result)) $tuples[] = $row;
  	mysqli_free_result($result);
  	return $tuples;
  }

  public function attributes(){
    foreach(func_get_args() as $attribute){
      $this->attributes[] = $attribute;
      $this->{$attribute} = '';
    }
    $this->assign_attributes($this->attribute_values);
  }

  public function is_valid(){
    $this->validate_attributes();
    return count($this->errors) == 0;
  }

  public function save(){
    if(!$this->is_valid()) return false;
    $attributes = join(',', $this->attributes);
    $values = [];
    foreach($this->attributes as $attribute){
      $value = $this->{$attribute};
      if(empty($value)) next;
      $values[] = "'$value'";
    }
    $values = join(',', $values);
    return $this->query("insert into {$this->table_name} ({$attributes}) values ($values)");
  }

  public function validates_presence_of(){
    foreach(func_get_args() as $attribute) $this->attributes_to_check[$attribute] = 'presence_of';
  }

  private function validate_attributes(){
    foreach($this->attributes_to_check as $attr => $validation){
      if($validation == 'presence_of'){
        if(!Validator::presence_of($this->{$attr})) $this->errors[$attr] = Validator::$presence_of_message;
      }
    }
  }

  public function errors_for($field_name){
    return isset($this->errors[$field_name]) ? $this->errors[$field_name] : '';
  }

  public function assign_attributes($attribute_values){
    if(empty($attribute_values)) return;
    foreach($attribute_values as $attribute => $value) $this->{$attribute} = $value;
  }

  public function where($conditions){
    $where = [];
    foreach($conditions as $column => $value) $where[] = "$column = '$value'";
    $where = join(' and ', $where);
    $result = $this->query("select * from {$this->table_name} where {$where}");
    $tuples = [];
    while ($tuple = mysqli_fetch_object($result)) $tuples[] = $tuple;
    mysqli_free_result($result);
    return $tuples;
  }

  public function find($id){
    $result = $this->where(['id' => $id]);
    $record = isset($result[0]) ? $result[0] : false;
    if(!$record) return false;
    $this->id = $record->id;
    foreach($this->attributes as $attribute) $this->{$attribute} = $record->{$attribute};
    return $this;
  }

  public function find_by($conditions){
    $result = $this->where($conditions);
    return isset($result[0]) ? $result[0] : false;
  }

  public function delete($id){
    if(empty($id)) return false;
    return $this->query("delete from {$this->table_name} where id = $id");
  }

  public function update($attribute_values){
    if(empty($attribute_values)) return true;
    $updates = [];
    foreach($attribute_values as $key => $value) $updates[] = "$key = '$value'";
    $updates = join(',', $updates);
    return $this->query("update {$this->table_name} set {$updates} where id = {$this->id}");
  }
}
