<?
require("../frames/urlpointer.php");
require("../frames/urlchanger.php");
require('../frames/header.php'); 
?>

<?php

    $dbh = new PDO('sqlite:keionportal.db',",");
    $sth



?>

<h2>アカウント作成</h2>
<form name="login" action="login.php" method="get">
    <p>学生証番号</p>
    <input name="id" type="text">
    <p>名前</p>
    <input name="name" type="text">
    <p>パート</p>
    <table>
        <tr>
            <th>ボーカル</th>
            <th><input name="part" type="radio" value="0"></th>
        </tr>
        <tr>
            <th>ギター</th>
            <th><input name="part" type="radio" value="1"></th>
        </tr>
        <tr>
            <th>キーボード</th>
            <th><input name="part" type="radio" value="2"></th>
        </tr>
        <tr>
            <th>ベース</th>
            <th><input name="part" type="radio" value="3"></th>
        </tr>
        <tr>
            <th>ドラム</th>
            <th><input name="part" type="radio" value="4"></th>
        </tr>
    </table>
    <p>パスワード</p>
    <input name="password" type="password">
    <p>パスワード（確認のため再度入力）</p>
    <input name="password" type="password"><br>
    <br>
    <input type="submit" value="作成">
</form>