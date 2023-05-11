<?php
/** @var $model \app\models\user */
?>

<h1>Login</h1>

<?php $form = \samojanezic\phpmvc\form\Form::begin('', "post") ?>
  <?php echo $form->field($model, 'email') ?>
  <?php echo $form->field($model, 'password')->passwordField() ?>
  <button type="submit" class="btn btn-primary">Submit</button>
<?php echo \samojanezic\phpmvc\form\Form::end() ?>