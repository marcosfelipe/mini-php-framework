<p>
	<input type="text" placeholder="Titulo" name="title" value="<?= $content->title ?>">
	<div class="field-error"><?= $content->errors_for('title') ?></div>
</p>
<p>
	<textarea placeholder='Conteudo' name="body"><?= $content->body ?></textarea>
	<div class="field-error"><?= $content->errors_for('body') ?></div>
</p>
<p>
	<select name="category_id">
		<?php foreach(category()->where(['actived' => true]) as $category){ ?>
			<option value='<?= $category->id ?>' <?= $content->category_id == $category->id ? 'selected' : 'false' ?>><?= $category->title ?></option>
		<?php } ?>
	</select>	
	<div class="field-error"><?= $content->errors_for('category_id') ?></div>
</p>
<p><input type="submit" value="Salvar"></p>
