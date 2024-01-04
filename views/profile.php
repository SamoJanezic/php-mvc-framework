
<style><?php include 'css/profile.css'; ?></style>
<?php
use samojanezic\phpmvc\Application;

$user = Application::$app->user;

?>

<h1>Profile</h1>

<div class="info-box">
    <div>
        <span class="element">
            <span>Email</span>
            <span><? echo $user->email ?? false;?></span>
        </span>
        <span class="element">
            <span>First name</span>
            <span><? echo $user->firstname?></span>
        </span>
        <span class="element">
            <span>Last name</span>
            <span><? echo $user->lastname?></span>
        </span>
        <span class="element">
            <span>Password</span>
            <span>reset password</span>
        </span>
    </div>
    <div class="image-box">
        <img src=<? echo $user->user_pic ?> alt="placeholder" class="user-pic">
    </div>
</div>
