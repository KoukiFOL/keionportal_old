<?
require("../frames/urlpointer.php");
require("../frames/urlchanger.php");
require('../frames/header.php');
?>
<?php
if ($_POST['old_password'] == $SESSION['password']) {
    echo '現在のパスワードが正しくありません。<br>
            パスワードを忘れてしまった場合は管理者に問い合わせてください。';
} elseif ($_POST['new_password'] != $_POST['new_password']) {
    echo '新しいパスワードが一致しません。もう一度入力してください。';
} else {
    $password = $_POST['new_password'];
}
?>
<h2>パスワード変更</h2>
<form name="passwordchange" action="passwordchange.php" method="post">
    <p>現在のパスワード</p>
    <input name="password" type="old_password">
    <p>新しいパスワード</p>
    <input name="password" type="new_password">
    <p>新しいパスワード（確認のため再度入力）</p>
    <input name="password" type="new_password2"><br>
    <br>
    <input type="submit" value="作成">
</form>