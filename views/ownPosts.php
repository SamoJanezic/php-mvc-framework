<style><?php include 'css/ownPosts.css'; ?></style>
<?php
use app\models\Post;
use samojanezic\phpmvc\Application;
use samojanezic\phpmvc\form\Form;

$this->title = 'ownPosts';

?>

<h1>My Posts</h1>
<table class=mainTable>
        <thead>
            <tr>
                <th>ID</th>
                <th>Created on</th>
                <th>Title</th>
                <th>Content</th>
                <th>Image</th>
                <th>Edit</th>
                <th>Delete</th>
            </tr>
        </thead>
<?
$post = new Post;
$user_id = Application::$app->user->getId();
$userPosts = $post->getAllPosts($user_id);
forEach($userPosts as $single) {
?>
        <tbody class="contentBox">
            <tr class="contentRow">
                <td><? echo $single->id ?></td>
                <td><? echo $single->created_on ?></td>
                <td><? echo $single->title ?></td>
                <td><? echo substr($single->content, 0, 100) ?>...</td>
                <td class="image-container">
                    <img src=<? echo $single->image ?> alt= 'no image found' class='table-image'>
                </td>
                <td><a href="">edit</a></td>
                <td>
                    <?
                    $form = Form::begin('/delete', 'post');
                    var_dump($model);
                    // $form->field($model, 'id');
                    ?>
                    <button type="submit" class="btn btn-link"></button>
                    <?
                    $form::end();
                    ?>
                    <!-- <button type="submit" class="btn btn-link">delete</button> -->
                    <form action="/delete" method="post">
                        <input type="hidden" name="id" value="<?php echo $single->id; ?>">
                        <button type="submit" class="btn btn-link">Delete</button>
                    </form>
                    <?// \samojanezic\phpmvc\form\Form::end(); ?>
                </td>
            </tr>
        </tbody>
    <? } ?>
    </table>