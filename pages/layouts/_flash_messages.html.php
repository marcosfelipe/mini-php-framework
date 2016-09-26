<div>
	<?php foreach(flash_messages() as $key => $message){ ?>
		<div class='flash <?= $key ?>'><?= $message ?></div>
	<?php } ?>
</div>
