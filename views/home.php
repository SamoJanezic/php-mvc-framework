<style><?php include 'css/home.css'; ?></style>

<?php
  use app\models\Post;
?>

<h1>Home</h1>
<h3>Welcome to <? echo $name ?></h3>

<div class="postsContainer">
  <?
  $post = new Post;
  $allPosts = $post->getPosts();
  forEach($allPosts as $idx=>$single) {
  ?>
  <? if($idx === 0) { ?>
    <div  class="firstPost">
      <div>published by:  <? echo $post->getPublisher($single->user_id) ?></div>
      <div>on:            <? echo $single->created_on ?></div>
      <img src=           <? echo $single->image ?> alt= 'no image found' class='img-thumbnail'>
      <h5>                <? echo $single->title ?></h5>
      <div>               <? echo substr($single->content, 0, 100) ?>...
        <form action="/postPage" method="get">
          <input type="hidden" name="url_name" value="<? echo $single->url_name; ?>">
          <button type="submit" class= "btn btn-link">[read more]</button>
        </form>
      </div>
    </div>
  <? } else { ?>
    <div class="postBox">
      <div>published by:  <? echo $post->getPublisher($single->user_id) ?></div>
      <div>on:            <? echo $single->created_on ?></div>
      <img src=           <? echo $single->image ?> alt= 'no image found' class='img-thumbnail'>
      <h5>                <? echo $single->title ?></h5>
      <div>               <? echo substr($single->content, 0, 100) ?>...
        <form action="/postPage" method="get">
          <input type="hidden" name="url_name" value="<? echo $single->url_name; ?>">
          <button type="submit" class= "btn btn-link">[read more]</button>
        </form>
      </div>
    </div>
  <? }} ?>
</div>