<?php
class Dispatcher{
	public $route;

	function __construct(Router $router){
		$controller = isset($_GET['pagina']) ? $_GET['pagina'] : '';
		$action = isset($_GET['acao']) ? $_GET['acao'] : '';
		$this->route = $router->find_route($controller, $action);
	}

	public function boot(){
		$controller = find_file("{$this->route['controller']}_controller");
		require $controller;
	}
}
