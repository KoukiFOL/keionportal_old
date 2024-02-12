<?
require("../frames/urlpointer.php");
require("../frames/urlchanger.php");
require('../frames/header.php'); 
?>

<?php
$database = new SQLite3("../keionportal.db");

$_number = $_SESSION['number'];
if ($_SERVER['REQUEST_METHOD'] === 'POST'){
    $grade = $_POST['grade'];
    $name = $_POST['name'];
    $part  = $_POST['part'];
    $birthday = $_POST['birthday'];
    if ($_POST['password'] == $_POST['password2']){
        $password = $_POST['password'];
    }else{
        echo 'パスワードをもう一度確認してください。';
    }


}
?>

<h2>アカウント編集</h2>
<form name="edit" action="edit.php" method="post">
    <p>学生証番号</p>
    <p><?php echo "$number"; ?></p>
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

    <p>生年月日(例:20030526)</p>
    <input name="birthday" type="text">
    <p>パスワード</p>
    <input name="password" type="password">
    <p>パスワード（確認のため再度入力）</p>
    <input name="password" type="password"><br>
    <br>
    <input type="submit" value="作成">
</form>
