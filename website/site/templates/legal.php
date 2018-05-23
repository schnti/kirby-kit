<?php snippet('header'); ?>

    <div class="container">
        <h1><?= $page->title()->html(); ?></h1>
		<?= $page->legal()->legal(); ?>
    </div>

<?php snippet('footer'); ?>