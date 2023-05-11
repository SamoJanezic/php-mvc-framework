<?php
use samojanezic\phpmvc\form\TextareaField;

$this->title = 'Contact';

?>


<h1>Contact us!</h1>

<?php $form = \samojanezic\phpmvc\form\Form::begin('', 'post') ?>
<?php echo $form->field($model, 'subject') ?>
<?php echo $form->field($model, 'email') ?>
<?php echo new TextareaField($model, 'body') ?>
<button type="submit" class="btn btn-primary">Submit</button>
<?php \samojanezic\phpmvc\form\Form::end(); ?>