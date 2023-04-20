<h1>Create an account</h1>

<!-- <?php $form = \app\core\form\Form::begin('', "post") ?>
  <?php echo $form->field($model, 'firstname') ?>
  <?php echo $form->field($model, 'lastname') ?>
  <?php echo $form->field($model, 'email') ?>
  <?php echo $form->field($model, 'password') ?>
  <?php echo $form->field($model, 'confirmPassword') ?>
<?php echo \app\core\form\Form::end() ?>

<button type="submit" class="btn btn-primary">Submit</button> -->
<form action="" method="post">
  <div class="row">
    <div class="mb-3 col">
      <label>First name</label>
      <input type="text" name="firstname" value="<?php echo $model->firstname ?>"
             class="form-control<?php echo $model->hasError('firstname') ? ' is-invalid ' : ''?>">
             <div class="invalid-feedback">
              <?php echo $model->getFirstError('firstname')?>
             </div>
    </div>
    <div class="mb-3 col">
      <label>Last name</label>
      <input type="text" name="lastname" class="form-control">
    </div>
  </div>
  <div class="mb-3">
    <label>E-mail</label>
    <input type="text" name="email" class="form-control">
  </div>
  <div class="mb-3">
    <label>Password</label>
    <input type="password" name="password" class="form-control"></input>
  </div>
  <div class="mb-3">
    <label>Confirm password</label>
    <input type="password" name="confirmPassword" class="form-control"></input>
  </div>
  <button type="submit" class="btn btn-primary">Submit</button>
</form>