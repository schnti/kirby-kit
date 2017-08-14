<?php if ($errors = $form->error($field)): ?>
    <span class="help-block"><?php echo implode('<br>', $errors) ?></span>
<?php endif; ?>