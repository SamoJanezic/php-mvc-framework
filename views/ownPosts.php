<style><?php include 'css/ownPosts.css'; ?></style>
<?php
use app\models\Post;
use samojanezic\phpmvc\Application;

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
$userPosts = $post->getPosts('user_id', $user_id);
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
                    <form action="/delete" method="post">
                        <input type="hidden" name="id" value="<? echo $single->id; ?>">
                        <button type="submit" class="btn btn-link">Delete</button>
                    </form>
                </td>
            </tr>
        </tbody>
    <? } ?>
    </table>