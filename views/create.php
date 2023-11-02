<?php
/** @var $model \app\models\user */

use samojanezic\phpmvc\form\TextareaField;
?>

<h1>Create new blog</h1>

<?php $form = \samojanezic\phpmvc\form\Form::begin('', 'post') ?>
    <?php echo $form->field($model, 'title') ?>
    <?php echo new TextareaField($model, 'content') ?>
    <?php echo $form->field($model, 'image') ?>
    <button type="submit" class="btn btn-primary">Submit</button>
<?php \samojanezic\phpmvc\form\Form::end(); ?>