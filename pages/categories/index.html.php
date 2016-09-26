<div id="topo2">
    <h1>Categorias</h1> 
</div>
<div id="meio">
    <?= render('admin_menu') ?>
    <div id="conteudo">
        <?= render('flash_messages') ?>
        <table>
            <thead>
                <th>Titulo</th>
                <th>Descrição</th>
                <th>Usuário</th>
                <th>Criado em</th>
                <th>Ações</th>
            </thead>
            <?php foreach($categories as $category){ ?>
                <tr>
                    <td><?= $category->title ?></td>
                    <td><?= $category->description ?></td>
                    <td><?= user()->find($category->user_id)->name ?></td>
                    <td><?= format_date($category->created_at) ?></td>
                    <td>
                        <a href='index.php?pagina=categorias&acao=alterar&id=<?= $category->id ?>'>Alterar</a>
                        <a href='index.php?pagina=categorias&acao=excluir&id=<?= $category->id ?>'>Excluir</a>
                    </td>
                </tr>
            <?php } ?>
            <tr><td colspan='6'><a href='index.php?pagina=categorias&acao=nova'>Nova categoria</a></td></tr>
        </table>
    </div>
</div>
