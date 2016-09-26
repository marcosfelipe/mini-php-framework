<?php

using('flash_helper.php');

function brand_new(){
	if(current_user()) redirect_to('index.php?pagina=admin&acao=painel');
	$auth = auth(user());
	require 'brand_new.html.php';
}

function create(){
	$auth = auth(user(), params('login'), params('password'));
	if($auth->create()){
		flash('success')->add('Usuário logado!');
		redirect_to('index.php?pagina=admin&acao=painel');
	}else{
		flash('error')->add('Usuário incorreto!');
		require 'brand_new.html.php';
	}
}

function destroy(){
	auth(user())->destroy();
	flash('success')->add('Usuário Deslogado!');
	redirect_to('index.php');
}
