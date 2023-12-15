
<style><?php include 'css/profile.css'; ?></style>
<?php
use samojanezic\phpmvc\Application;

$user = Application::$app->user;

echo $user->getDisplayName();



$this->title = 'Profile';

?>

<h1>Profile</h1>

<div class="info-box">
    <span class="em">
        <span>Email</span>
        <span><?echo $user->email?></span>
    </span>
    <span class="em">
        <span>First name</span>
        <span><?echo $user->firstname?></span>
    </span>
    <span class="em">
        <span>Last name</span>
        <span><?echo $user->lastname?></span>
    </span>
</div>