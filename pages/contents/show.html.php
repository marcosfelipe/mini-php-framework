<div id="topo2">
    <h1>Conteudos</h1> 
</div>
<div id="meio">
	<?= render('admin_menu') ?>
    <div id="conteudo">
		<h5>Detalhes</h5>
		<h4>Titulo:</h4> <?= $content->title ?>
		<h4>Categoria:</h4> <?= category()->find($content->category_id)->title ?>
		<h4>Conteudo:</h4> <?= $content->body ?>
		<h4>Criado em:</h4> <?= format_date($content->created_at) ?>
		<h4>Usuário:</h4> <?= user()->find($content->user_id)->name ?>
    </div>
</div>
