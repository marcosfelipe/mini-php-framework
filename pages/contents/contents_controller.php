<?php

authenticate();

using('flash_helper.php');

function index(){
	$contents = content()->where(['actived' => true]);
	require 'index.html.php';
}

function brand_new(){
	$content = content();
	require 'brand_new.html.php';
}

function create(){
	$content = content(content_params());
	$content->created_at = date("Y-m-d H:i:s"); 
	$content->user_id = current_user()->id;
	if($content->save()){
		flash('success')->add('Conteudo salva!');
		header('Location: index.php?pagina=conteudos');
	}else{
		flash('error')->add('Erro ao salvar o conteudo, verifique o formulário!');
		require 'brand_new.html.php';
	}
}

function delete(){
	$content = content()->find(params('id')); 
	if($content->update(['actived' => false])){
		flash('success')->add('Conteudo excluido!');
		header('Location: index.php?pagina=conteudos');
	}else{
		flash('error')->add('Erro ao excluir o conteudo!');
		header('Location: index.php?pagina=conteudos');
	}
}

function edit(){
	$content = content()->find(params('id'));
	require 'edit.html.php';
}

function update(){
	$content = content()->find(params('id')); 
	if($content->update(content_params())){
		flash('success')->add('Conteudo atualizado!');
		header('Location: index.php?pagina=conteudos');
	}else{
		flash('error')->add('Erro ao alterar o conteudo, verifique o formulário!');
		require 'edit.html.php';
	}
}

function show(){
	$content = content()->find(params('id'));
	require 'show.html.php';
}

function content_params(){
	return require_params('title', 'body', 'category_id');
}
