<style><? include 'css/editPost.css' ?></style>
<?
use samojanezic\phpmvc\form\Form;
use samojanezic\phpmvc\form\TextareaField;
?>

<h2>Edit your post</h2>
<div class="edit-box">
    <div class="form-box">
    <?
        $form = Form::begin('', 'post');
        echo $form->field($model, 'title');
        echo new TextareaField($model, 'content');
        echo $form->field($model, 'image');
    ?>
    <input type="hidden" name="id" value="<? echo $id?>">
        <button type="submit" class="btn btn-primary">Save</button>
    <? $form::end(); ?>
    </div>
    <div>
        <p>Current image:</p>
        <img class="img-box" src="<?echo $image?>" alt="no-image">
    </div>
</div>