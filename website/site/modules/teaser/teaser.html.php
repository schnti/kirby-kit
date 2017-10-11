<div class="<?= str_replace('.', '__', $module->module()->template()); ?>">
    <div class="container">

        <h2><?= $module->title()->html() ?></h2>
		<?= $module->text()->kirbytext() ?>

    </div>
</div>