<div class="<?= str_replace('.', '__', $module->module()->template()); ?>">
    <div class="anchor" id="<?= $module->uid(); ?>"></div>
    <div class="container">

        <h2><?= $module->title()->html(); ?></h2>
		<?= $module->text()->kirbytext(); ?>

    </div>
</div>