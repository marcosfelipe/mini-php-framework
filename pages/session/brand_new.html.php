<div id="topo2">
    <h1>Área Restrita</h1> 
</div>
<div id="meio">
    <div id="conteudo">
		<?= render('flash_messages') ?>
		<form action="index.php?pagina=sessao&acao=criar" method="post">
		  <h5 class="contato">Entrar</h2>
		<div class="form-container">
		    <p>
		    	<input type="text" placeholder="Login" name="login" value="<?= $auth->login ?>">
		    	<div class="field-error"><?= $auth->errors_for('login') ?></div>
		    	<i>Padrão: 'admin'</i>
		    </p>
		    <p>
		    	<input type="password" placeholder="Senha" name="password">
		    	<div class="field-error"><?= $auth->errors_for('password') ?></div>
		    	<i>Padrão: '123'</i>
	    	</p>
		    <p><input type="submit" value="Entrar"></p>
		</div>
    </div>
</div>
