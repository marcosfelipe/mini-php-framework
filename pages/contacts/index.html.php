<div id="topo2">
    <h1>Contatos</h1> 
</div>
<div id="meio">
    <?= render('admin_menu') ?>
    <div id="conteudo">
        <?= render('flash_messages') ?>
        <table>
            <thead>
                <th>Nome</th>
                <th>E-Mail</th>
                <th>Telefone</th>
                <th>Comentário</th>
                <th>Ações</th>
            </thead>
            <?php foreach($contacts as $contact){ ?>
                <tr>
                    <td><?= $contact->name ?></td>
                    <td><?= $contact->email ?></td>
                    <td><?= $contact->phone ?></td>
                    <td><?= $contact->comment ?></td>
                    <td><a href='index.php?pagina=contatos&acao=excluir&id=<?= $contact->id ?>'>Excluir</a></td>
                </tr>
            <?php } ?>
        </table>
    </div>
</div>
