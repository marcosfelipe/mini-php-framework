<div id="topo2">
    <h1>Conteudos</h1> 
</div>
<div id="meio">
    <?= render('admin_menu') ?>
    <div id="conteudo">
        <?= render('flash_messages') ?>
        <table>
            <thead>
                <th>Titulo</th>
                <th>Categoria</th>
                <th>Usuário</th>
                <th>Criado em</th>
                <th>Ações</th>
            </thead>
            <?php foreach($contents as $content){ ?>
                <tr>
                    <td><?= $content->title ?></td>
                    <td><?= category()->find($content->category_id)->title ?></td>
                    <td><?= user()->find($content->user_id)->name ?></td>
                    <td><?= format_date($content->created_at) ?></td>
                    <td>
                        <a href='index.php?pagina=conteudos&acao=ver&id=<?= $content->id ?>'>Ver</a>
                        <a href='index.php?pagina=conteudos&acao=alterar&id=<?= $content->id ?>'>Alterar</a>
                        <a href='index.php?pagina=conteudos&acao=excluir&id=<?= $content->id ?>'>Excluir</a>
                    </td>
                </tr>
            <?php } ?>
            <tr><td colspan='6'><a href='index.php?pagina=conteudos&acao=novo'>Novo conteudo</a></td></tr>
        </table>
    </div>
</div>
