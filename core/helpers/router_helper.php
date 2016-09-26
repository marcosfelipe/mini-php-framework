<?php

function router(){
	global $router;
	return $router;
}

function root(){
	global $router;
	return $router->root();
}

function get($pagina, $acao = ''){
	global $router;
	return $router->get($pagina, $acao);
}

function post($pagina, $acao){
	global $router;
	// TODO: change get to post
	return $router->get($pagina, $acao);
}
