<?php

using('flash_helper.php');

function index(){
	authenticate();
	$contacts = contact()->all();
	require 'index.html.php';
}

function brand_new(){
	$contact = contact();
	require 'brand_new.html.php';
}

function create(){
	$contact = contact(contact_params());
	if($contact->save()){
		flash('success')->add('Contato foi salvo!');
		header('Location: index.php?pagina=contatos&acao=novo');
	}else{
		flash('error')->add('Erro ao salvar o contato, verifique o formulário!');
		require 'brand_new.html.php';
	}
}

function delete(){
	authenticate();
	if(contact()->delete(params('id'))){
		flash('success')->add('Contato foi excluido!');
		header('Location: index.php?pagina=contatos');
	}else{
		flash('error')->add('Erro ao excluir o contato!');
		header('Location: index.php?pagina=contatos');
	}
}

function contact_params(){
	return require_params('name', 'email', 'phone', 'comment');
}
