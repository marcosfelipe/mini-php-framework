
<div id="topo2">
    <h1>Categorias</h1> 
</div>
<div id="meio">
	<?= render('admin_menu') ?>
    <div id="conteudo">
		<?= render('flash_messages') ?>
		<form action="index.php?pagina=categorias&acao=criar" method="post" class="form">
		  <h5>Nova categoria</h2>
		  <div class="form-container">
		    <?php require '_form.html.php' ?>
		  </div>
		</form>
    </div>
</div>
