<p>
	<input type="text" placeholder="Titulo" name="title" value="<?= $category->title ?>">
	<div class="field-error"><?= $category->errors_for('title') ?></div>
</p>
<p>
	<input type="text" placeholder="Descrição" name="description" value="<?= $category->description ?>">
	<div class="field-error"><?= $category->errors_for('description') ?></div>
</p>
<p><input type="submit" value="Salvar"></p>
