<style><?php include 'css/home.css'; ?></style>

<?php
  use app\models\Post;
?>

<h1>Home</h1>
<h3>Welcome to <? echo $name ?></h3>

<div class="postsContainer">
  <?
  $post = new Post;
  forEach($allPosts as $idx=>$single) {
  ?>
  <? if($idx === 0) { ?>
    <div class= "firstPost">
      <form action="/postPage" method="get">
        <input type="hidden" name="url_name" value="<? echo $single->url_name; ?>">
        <button type="submit">
          <div>published by:  <? echo $post->getPublisher($single->user_id)['firstname'] . ' ' .
                                      $post->getPublisher($single->user_id)['firstname']?>
            <img src=<?echo $post->getPublisher($single->user_id)['user_pic']?> alt="" class="user_pic">
          </div>
          <div>on:            <? echo $single->created_on ?></div>
          <img src=           <? echo $single->image ?> alt= 'no image found' class='img-thumbnail'>
          <h5>                <? echo $single->title ?></h5>
          <div>               <? echo substr($single->content, 0, 200) ?>...</div>
        </button>
      </form>
    </div>
  <? } else { ?>
    <div class= "postBox">
      <form action="/postPage" method="get">
        <input type="hidden" name="url_name" value="<? echo $single->url_name; ?>">
        <button type="submit">
          <div>published by:  <? echo $post->getPublisher($single->user_id)['firstname'] ?></div>
          <div>on:            <? echo $single->created_on ?></div>
          <img src=           <? echo $single->image ?> alt= 'no image found' class='img-thumbnail'>
          <h5>                <? echo $single->title ?></h5>
          <div>               <? echo substr($single->content, 0, 200) ?>...</div>
        </button>
      </form>
    </div>
  <? }} ?>
</div>