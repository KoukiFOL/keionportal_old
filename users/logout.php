<?
require("../frames/urlpointer.php");
require("../frames/urlchanger.php");
require('../frames/header.php'); 
?>
<?php
if (!isset($_SESSION)) {
    echo '<h2>ログインされていません。</h2>';
}else{

    // セッション変数をすべて削除
    $_SESSION = array();

    // セッションを破棄
    session_destroy();
    echo '<h2>ログアウトしました。</h2>';
}
?>