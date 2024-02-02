<?php require("./frames/urlpointer.php"); ?>
<? require('./frames/header.php'); ?>
<?php


?>

<h2>ログイン</h2>
<form name="login" action="login.php" method="get">
    <p>UserId</p>
    <input name="id" type="text">
    <p>Password</p>
    <input name="password" type="text"><br>
    <input type="submit" value="ログイン">
</form>