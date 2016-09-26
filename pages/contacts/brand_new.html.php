
<div id="topo2">
    <h1>Contate-nos já!</h1> 
</div>
<div id="meio">
    <div id="conteudo">
		<?= render('flash_messages') ?>
		<form action="index.php?pagina=contatos&acao=criar" method="post">
		<div class="contato">
		  <h5 class="contato">Deixe seu contato</h2>
		  <form class="contato-container">
		    <p>
		    	<input type="text" placeholder="Nome" name="name" value="<?= $contact->name ?>">
		    	<div class="field-error"><?= $contact->errors_for('name') ?></div>
		    </p>
		    <p>
		    	<input type="text" placeholder="E-mail" name="email" value="<?= $contact->email ?>">
		    	<div class="field-error"><?= $contact->errors_for('email') ?></div>
	    	</p>
		    <p>
		    	<input type="text" placeholder="Telefone" name="phone" value="<?= $contact->phone ?>">
		    	<div class="field-error"><?= $contact->errors_for('phone') ?></div>
	    	</p>
		    <p>
		    	<textarea placeholder="Deixe seu comentário!!!" name="comment"><?= $contact->comment ?></textarea>
		    	<div class="field-error"><?= $contact->errors_for('comment') ?></div>
	    	</p>
		    <p><input type="submit" value="Enviar Mensagem"></p>
		  </form>
		</div>
    </div>
</div>
