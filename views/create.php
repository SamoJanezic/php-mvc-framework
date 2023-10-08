<?php
use samojanezic\phpmvc\form\TextareaField;
?>

<h1>Create new blog</h1>

<?php $form = \samojanezic\phpmvc\form\Form::begin('', 'post') ?>
<?php echo $form->field($model, 'title') ?>
<?php echo new TextareaField($model, 'body') ?>
<?php echo $form->field($model, 'image') ?>
<button type="submit" class="btn btn-primary">Save</button>
<?php \samojanezic\phpmvc\form\Form::end(); ?>