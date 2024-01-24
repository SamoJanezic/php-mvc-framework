<?php
/** @var $model \app\models\user */
use samojanezic\phpmvc\form\Form;
?>

<h1>Create an account</h1>

<? $form = Form::begin('', "post", 'enctype="multipart/form-data"') ?>
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
<? echo Form::end() ?>