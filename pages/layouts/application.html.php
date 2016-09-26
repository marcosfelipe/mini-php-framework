<!DOCTYPE html>
<html lang="pt-br">
<head>
	<meta charset="utf-8">
    <link rel="shortcut icon" type="image/x-icon" href="/assets/imagens/favicon.png" />
    <link rel="icon" type="image/png" href="/assets/imagens/favicon.png">
    <title>Noticias EAD</title>
    <?= stylesheet('estilo') ?>
</head>
<body>
    <div id="tudo">
    	<div id="topo">   
        	<nav>
                <ul class="menu">
                    <li><a href="index.php">Home</a></li>
                    <?php foreach(category()->where(['actived' => true]) as $category){ ?>
                        <li><a href="index.php?pagina=conteudo&acao=ver&category_id=<?= $category->id ?>"><?= $category->title ?></a></li>
                    <?php } ?>
                    <li><a href="index.php?pagina=contatos&acao=novo">Contato</a></li>
                </ul>
            </nav> 
    	</div>
        <div id="topo1">
    		<div id="logo"><?= image_tag('logoCesumar.png') ?></div>
    	</div>   	

  		<?= render_action() ?>
        
    	<footer>
            <div class="col1">
                <h6>Institucional</h6>
                <div class="hr"></div>
                <ul>
                    <li><a href="index.php?pagina=institucional&acao=conheca">Conheça</a></li>
                    <li><a href="index.php?pagina=institucional&acao=trabalhe_conosco">Trabalhe Conosco</a></li>
                    <li>
                        <a href="index.php?pagina=sessao&acao=nova">Área Restrita</a> 
                        <?php if(current_user()){ ?>
                            <a href="index.php?pagina=sessao&acao=encerrar">(Sair)</a> 
                        <?php } ?>
                    </li>
                </ul>
            </div>
            <div class="col2">
                <h6>Graduação</h6>
                <div class="hr"></div>
                <ul>
                   <li><a href="index.php?pagina=graduacao&acao=cursos">Cursos</a></li>
                   <li><a href="index.php?pagina=graduacao&acao=alunos">Alunos</a></li>
                   <li><a href="index.php?pagina=graduacao&acao=pesquisa">Pequisa</a></li>
                </ul>
            </div>
            <div class="col3">
                <h6>Pós - Graduação</h6>
                <div class="hr"></div>
                <ul>
                   <li><a href="index.php?pagina=pos_graduacao&acao=cursos">Cursos</a></li>
                   <li><a href="index.php?pagina=pos_graduacao&acao=alunos">Alunos</a></li>
                   <li><a href="index.php?pagina=pos_graduacao&acao=pesquisa">Pequisa</a></li>
                </ul>
            </div>                       
          <?= image_tag('faleConosco.png'); ?>
    	</footer>	
    </div>
</body>
</html>