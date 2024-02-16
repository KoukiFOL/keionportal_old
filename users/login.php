<?php

session_start();

// データベース接続
$database = new SQLite3('../keionportal.db');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    
    // フォームから受け取ったユーザー名とパスワード
    $number = $_POST['number'];
    $password = $_POST['password'];

    // データベースからユーザーを取得
    $stmt = $database->prepare("SELECT * FROM users WHERE number = :number");
    $stmt->bindValue(':number', $number, SQLITE3_TEXT);
    $result = $stmt->execute()->fetchArray(SQLITE3_ASSOC);
    
    
    
    // パスワードの検証
    if ($result && $password == $result['password']) {
        
        $_SESSION = $result;

        header('Location:../index-j.php');
        
        $message = "{$_SESSION['name']} さん，ログインが完了しました。サービスをご利用いただけます。";
    } else{
        $message = "学生証番号かパスワードが正しくありません";
    }
}
?>

<?
require("../frames/urlpointer.php");
require("../frames/urlchanger.php");
require('../frames/header.php'); 
?>



<html>
    <body>
<h2>ログイン</h2>
<form name="login" action="login.php" method="post">
    <p>学生証番号</p>
    <input name="number" type="text" required>
    <p>Password</p>
    <input name="password" type="password" required><br>
    <br>
    <input type="submit" value="ログイン">
</form>
<p class ="button"><a href="create.php">アカウント作成</a></p>
</body>
</html>