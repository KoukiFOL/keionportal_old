<?php
session_start();
if (!$_SESSION){
    header('Location:../users/login.php');
    $message = "ログインしてください。";
    exit();
}
?>
<? require("frames/urlpointer.php"); ?>
<? require("./frames/header.php"); ?>

<html>
    <body>
        <div class="home">
            <h2>Welcome back KSU Keion Portal Site</h2>
            <img src="./images/background.jpg" alt="homeimage">
        </div>
    </body>
</html>