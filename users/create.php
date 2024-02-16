

<?php

$database = new SQLite3("../keionportal.db");
if ($_SERVER['REQUEST_METHOD'] === 'POST'){
    $number = $_POST['number'];
    $grade = $_POST['grade'];
    $name = $_POST['name'];
    $part  = $_POST['part'];
    $birthday = $_POST['birthday'];
    if ($_POST['password'] == $_POST['password2']){
        $password = $_POST['password'];
    }else{
        $message =  'パスワードをもう一度確認してください。';
    }
    

    $stmt = $database->prepare('INSERT INTO users (number, grade, name, part, birthday, password) VALUES (:number, :grade, :name, :part, :birthday, :password)');
    $stmt->bindValue(':number', $number);
    $stmt->bindValue(':grade', $grade);
    $stmt->bindValue(':name', $name);
    $stmt->bindValue(':part', $part);
    $stmt->bindValue(':birthday', $birthday);
    $stmt->bindValue(':password', $password);
    if ($stmt->execute()) {
        session_start();
        $message =  "ユーザーが作成されました。";
        $_SESSION = $result;
        header("Location:../index-j.php");
    } else {
        $massage = "エラーが発生しました。";
        echo $part;
    }
}

?>

<?
require("../frames/urlpointer.php");
require("../frames/urlchanger.php");
require('../frames/header.php'); 
?>

<h2>アカウント作成</h2>
<form name="login" action="create.php" method="post" require>
    <p>学生証番号</p>
    <input name="number" type="text" require>
    <p>学年</p>
    <input name="grade" type="text" require>
    <p>名前</p>
    <input name="name" type="text" required>
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
    <input name="password" type="password" required>
    <p>パスワード（確認のため再度入力）</p>
    <input name="password2" type="password"><br>
    <br>
    <input type="submit" value="作成">
</form>