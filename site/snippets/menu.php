<nav class="navbar navbar-default navbar-static-top">
    <div class="container">
        <a class="navbar-brand" href="<?= url(); ?>">
			<?php if ($logo = $site->image('logo.svg')): ?>
                <img class="img-responsive" src="<?= $logo->url(); ?>" width="100" alt=""/>
			<?php else: ?>
                LOGO
			<?php endif; ?>
        </a>
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
        </div>

        <!--Collect the nav links, forms, and other content for toggling-->
        <div class="collapse navbar-collapse" id="navbar">
            <ul class="nav navbar-nav">
				<?php foreach ($pages->visible() as $p): ?>
                    <li class="<?php e($p->isOpen(), 'active'); ?>"><a href="<?= $p->url(); ?>"><span><?= $p->title()->html(); ?></span></a></li>
				<?php endforeach ?>
            </ul>
        </div>
    </div>
</nav>

