<div class="wrapper <?= str_replace('.', '__', $module->module()->template()); ?>">
    <div class="anchor" id="<?= $module->uid(); ?>"></div>
    <div class="container">
		<?= $module->legal()->legal(); ?>
    </div>
</div>