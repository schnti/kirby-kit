<div class="wrapper <?= str_replace('.', '__', $module->module()->template()); ?>">
    <div class="container">

		<?php if ($module->titleDisplay()->bool()): ?>
            <h2><?= $module->title()->html() ?></h2>
		<?php endif; ?>

        <div class="row">
            <div class="col-md-10">
				<?= $module->text()->kirbytext() ?>
            </div>
        </div>

    </div>
</div>