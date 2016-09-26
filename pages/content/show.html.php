<div id="topo2">
    <h1><?= $category->title ?></h1> 
</div>
<div id="meio">
    <div id="menu_esq">
       <nav id="menuesq">
            <ul>
               <?php foreach($contents as $c){ ?>
                    <li><a href='index.php?pagina=conteudo&acao=ver&category_id=<?= params('category_id') ?>&id=<?= $c->id ?>'><?= $c->title ?></a></li>
               <?php } ?>
            </ul>
        </nav>
    </div>
    <div id="conteudo">
        <?php if(isset($content)){ ?>
            <h3><?= $content->title ?></h3>
            <p><?= $content->body ?></p>
        <?php } ?>
    </div>
</div>