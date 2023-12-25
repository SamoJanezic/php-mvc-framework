<?php
/** @var $model \app\models\user */
?>

<h1>Create an account</h1>

<? $form = \samojanezic\phpmvc\form\Form::begin('', "post") ?>
  <div class="row">
    <div class="col">
      <? echo $form->field($model, 'firstname') ?>
    </div>
    <div class="col">
      <? echo $form->field($model, 'lastname') ?>
    </div>
  </div>
  <?
  echo $form->field($model, 'email');
  echo $form->field($model, 'password')->passwordField();
  echo $form->field($model, 'confirmPassword')->passwordField();
  echo $form->field($model, 'user_pic')->fileField();
  ?>
  <button type="submit" class="btn btn-primary">Submit</button>
<? echo \samojanezic\phpmvc\form\Form::end() ?>