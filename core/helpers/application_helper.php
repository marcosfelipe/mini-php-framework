<?php

function stylesheet($path){
	$path = "/assets/css/{$path}.css";
	echo "<link rel='stylesheet' type='text/css' href='$path'>";
}

function image_tag($path){
	$path = "/assets/imagens/$path";
	echo "<img src='$path'>";
}

function params($param_name){
	return isset($_REQUEST[$param_name]) ? $_REQUEST[$param_name] : '';
}

function require_params(){
	$params = [];
	foreach(func_get_args() as $param) $params[$param] = params($param);
	return $params;
}

function using($file){
	require find_file($file);
}

function render($partial){
	require find_file("_$partial.html.php");
}

function render_action(){
	global $dispatcher;
	call_user_func($dispatcher->route['action']);
}

function auth($user, $login = '', $pass = ''){
	require_once find_file('auth.php');
	return new Auth($user, $login, $pass);
}

function redirect_to($path){
	header("Location: $path");
}

function current_user(){
	return auth(user())->current_user();
}

function format_date($date, $format = 'd/m/Y H:i:s'){
	$date = date_create($date);
	return date_format($date, $format);
}

function authenticate(){
	if(!current_user()) redirect_to('index.php?pagina=sessao&acao=nova');
}
