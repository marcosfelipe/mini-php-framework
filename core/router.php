<?php
class Router{
	public $gets = [];
	private $current_path;
	private $current_controller;

	public function get($controller, $action){
		$this->gets["$controller/$action"] = [];
		$this->current_path = "$controller/$action";
		return $this;
	}

	// TODO: implement post method
	public function post($controller, $action){
		return get($controller, $action);
	}

	// TODO: implement delete method
	public function delete($controller, $action){
		return get($controller, $action);
	}

	// TODO: implement patch method
	public function patch($controller, $action){
		return get($controller, $action);
	}

	public function controller($name){
		$this->gets[$this->current_path]['controller'] = $name;
		$this->current_controller = $name;
		return $this;
	}

	public function action($name){
		$this->gets[$this->current_path]['action'] = $name;
	}

	public function find_route($controller, $action){
		$index = "$controller/$action";
		if(!isset($this->gets[$index])) throw new Exception('Route not found.');
		return $this->gets[$index];
	}

	public function root(){
		$this->gets['/'] = [];
		$this->current_path = '/';
		return $this;
	}
}
