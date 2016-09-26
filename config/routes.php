<?php
function routes(){
	// root
	root()->controller('home')->action('index');
	
	// contatos 
	get('contatos')->controller('contacts')->action('index');
	get('contatos', 'novo')->controller('contacts')->action('brand_new');
	post('contatos', 'criar')->controller('contacts')->action('create');
	get('contatos', 'excluir')->controller('contacts')->action('delete');

	// conteudo
	get('conteudo', 'ver')->controller('content')->action('show');
	get('conteudos')->controller('contents')->action('index');
	get('conteudos', 'novo')->controller('contents')->action('brand_new');
	get('conteudos', 'criar')->controller('contents')->action('create');
	get('conteudos', 'alterar')->controller('contents')->action('edit');
	get('conteudos', 'atualizar')->controller('contents')->action('update');
	get('conteudos', 'ver')->controller('contents')->action('show');
	get('conteudos', 'excluir')->controller('contents')->action('delete');

	// login
	get('sessao', 'nova')->controller('session')->action('brand_new');
	get('sessao', 'criar')->controller('session')->action('create');
	get('sessao', 'encerrar')->controller('session')->action('destroy');

	// admin
	get('admin', 'painel')->controller('admin')->action('index');

	// institucional
	get('institucional', 'conheca')->controller('institucional')->action('conheca');
	get('institucional', 'trabalhe_conosco')->controller('institucional')->action('trabalhe_conosco');

	// graduacao
	get('graduacao', 'cursos')->controller('graduacao')->action('cursos');
	get('graduacao', 'alunos')->controller('graduacao')->action('alunos');
	get('graduacao', 'pesquisa')->controller('graduacao')->action('pesquisa');

	// pos graduacao
	get('pos_graduacao', 'cursos')->controller('pos_graduacao')->action('cursos');
	get('pos_graduacao', 'alunos')->controller('pos_graduacao')->action('alunos');
	get('pos_graduacao', 'pesquisa')->controller('pos_graduacao')->action('pesquisa');
	
	// categories 
	get('categorias')->controller('categories')->action('index');
	get('categorias', 'nova')->controller('categories')->action('brand_new');
	post('categorias', 'criar')->controller('categories')->action('create');
	get('categorias', 'excluir')->controller('categories')->action('delete');
	get('categorias', 'alterar')->controller('categories')->action('edit');
	get('categorias', 'atualizar')->controller('categories')->action('update');
}
