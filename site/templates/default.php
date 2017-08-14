<?php snippet('header'); ?>

    <div class="container">
        <h1><?= $page->title()->html(); ?></h1>
		<?= $page->text()->kirbytext(); ?>
    </div>

<?php snippet('footer'); ?>