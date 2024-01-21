<style><?php include 'css/home.css'; ?></style>
<script><?php include 'script/infiniteScroll.js'; ?></script>

<?php
  use app\models\Post;
?>
<div id="app"></div>

<script><?php include 'script/script.vue'; ?></script>
<h1>Home</h1>
<h3>Welcome to <? echo $name ?></h3>
<div class="posts-container">
  <?
  $post = new Post;
  forEach($allPosts as $idx=>$single) {
  ?>
  <? if($idx === 0) { ?>
    <div class= "post-box--first">
      <form action="/postPage" method="get">
        <input type="hidden" name="url_name" value="<? echo $single->url_name; ?>">
        <button type="submit">
          <div>published by:
            <?
              echo $post->getPublisher($single->user_id)['firstname'] . ' ' .
              $post->getPublisher($single->user_id)['lastname']
            ?>
            <img src=<?echo $post->getPublisher($single->user_id)['user_pic']?> alt="" class="user-pic">
          </div>
          <div>on:            <? echo $single->created_on ?></div>
          <img src=           <? echo $single->image ?> alt= 'no image found' class='img-thumbnail--first'>
          <h5>                <? echo $single->title ?></h5>
          <div>               <? echo substr($single->content, 0, 200) ?>...</div>
        </button>
      </form>
    </div>
  <? } else { ?>
    <div class= "post-box">
      <form action="/postPage" method="get">
        <input type="hidden" name="url_name" value="<? echo $single->url_name; ?>">
        <button type="submit">
          <div>published by:
            <? 
              echo $post->getPublisher($single->user_id)['firstname'] . ' ' .
              $post->getPublisher($single->user_id)['lastname']
            ?>
            <img src=<?echo $post->getPublisher($single->user_id)['user_pic']?> alt="../assets/no-image.png" class="user-pic">
          </div>          <div>on:            <? echo $single->created_on ?></div>
          <img src=           <? echo $single->image ?> alt= 'no image found' class='img-thumbnail'>
          <h5>                <? echo $single->title ?></h5>
          <div class="post-text">               <? echo substr($single->content, 0, 100) ?>...</div>
        </button>
      </form>
    </div>
  <? }} ?>
</div>