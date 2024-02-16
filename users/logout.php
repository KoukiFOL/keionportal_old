<?php
session_start();
if (!isset($_SESSION)) {
    $message = 'ログインされていません。';
}else{

    // セッション変数をすべて削除
    $_SESSION = array();

    // セッションを破棄
    session_destroy();
    $message =  'ログアウトしました。';
    header('Location:../index-j.php');
}
?>

<?

require("../frames/urlpointer.php");
require("../frames/urlchanger.php");
require('../frames/header.php'); 
?>