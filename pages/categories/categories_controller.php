<?php

authenticate();

using('flash_helper.php');

function index(){
	$categories = category()->where(['actived' => true]);
	require 'index.html.php';
}

function brand_new(){
	$category = category();
	require 'brand_new.html.php';
}

function create(){
	$category = category(category_params());
	$category->created_at = date("Y-m-d H:i:s"); 
	$category->user_id = current_user()->id;
	if($category->save()){
		flash('success')->add('Categoria salva!');
		header('Location: index.php?pagina=categorias');
	}else{
		flash('error')->add('Erro ao salvar a categoria, verifique o formulário!');
		require 'brand_new.html.php';
	}
}

function delete(){
	$category = category()->find(params('id')); 
	if($category->update(['actived' => false])){
		flash('success')->add('Categoria excluida!');
		header('Location: index.php?pagina=categorias');
	}else{
		flash('error')->add('Erro ao excluir a categoria!');
		header('Location: index.php?pagina=categorias');
	}
}

function edit(){
	$category = category()->find(params('id'));
	require 'edit.html.php';
}

function update(){
	$category = category()->find(params('id')); 
	if($category->update(category_params())){
		flash('success')->add('Categoria atualizada!');
		header('Location: index.php?pagina=categorias');
	}else{
		flash('error')->add('Erro ao alterar a categoria, verifique o formulário!');
		require 'edit.html.php';
	}
}

function category_params(){
	return require_params('title', 'description');
}
