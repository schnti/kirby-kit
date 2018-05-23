<div class="wrapper <?= str_replace('.', '__', $module->module()->template()); ?>">
    <div class="anchor" id="<?= $module->uid(); ?>"></div>
    <div class="container">

        <div class="row">
            <div class="col-md-push-6 col-md-6">
                <h2><?= $module->title()->html(); ?></h2>
                <p class="date"><?= $module->date('%d. %B %Y'); ?></p>

				<?= $module->text()->kirbytext(); ?>
            </div>
            <div class="col-md-pull-6 col-md-6">
				<?php if ($image = $module->picture()->toFile()) : ?>
                    <img src="<?= $image->crop(600, 400)->url(); ?>" class="img-responsive" alt=""/>
				<?php endif; ?>
            </div>
        </div>

    </div>
</div>