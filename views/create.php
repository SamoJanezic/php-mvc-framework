<?php
/** @var $model \app\models\user */
use samojanezic\phpmvc\form\Form;
use samojanezic\phpmvc\form\TextareaField;
?>

<h1>Create new blog</h1>

<?
    $form = Form::begin('', 'post', 'enctype="multipart/form-data"');
    echo $form->field($model, 'title');
    echo new TextareaField($model, 'content');
    echo $form->field($model, 'image')->fileField();
?>
    <button type="submit" class="btn btn-primary">Submit</button>
<?  $form::end(); ?>