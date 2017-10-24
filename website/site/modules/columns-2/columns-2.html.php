<div class="wrapper <?= str_replace('.', '__', $module->module()->template()); ?>">
    <div class="container">

		<?php if ($module->titleDisplay()->bool()): ?>
            <h2><?= $module->title()->html(); ?></h2>
		<?php endif; ?>

        <div class="row">
            <div class="col-md-6">
				<?= $module->text()->kirbytext(); ?>
            </div>
            <div class="col-md-6">
				<?= $module->text2()->kirbytext(); ?>
            </div>
        </div>

    </div>
</div>