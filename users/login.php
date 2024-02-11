<?
require("../frames/urlpointer.php");
require("../frames/urlchanger.php");
require('../frames/header.php'); 
?>

<?php
try{
    $db = new PDO('sqlite:../keionportal.db');

$number = $_POST['number'];
$password = $_POST['password'];

$stmt = $db -> prepare('select * from users where number = :number');
$stmt -> bindParam(':number',$number);
$result = $stmt->execute();
$user = $result -> fetchArray(SQLITE3_ASSOC); 

if ($user && password_verify($password, $user['password'])) {
    echo '<p>ログイン成功！</p>';
    $_SESSION['number'] = $user['number'];
    header("Location: ../index-j.php");

} else {
    echo '<p>ユーザー名またはパスワードが間違っています。</p>';
    header("Location: ./login.php");
}
}catch(PDOException $e){
    echo "エラー。管理者に問い合わせてください。以下がエラー文です";
    echo $e->getMessage();
}
?>
?>


?>

<h2>ログイン</h2>
<form name="login" action="login.php" method="post">
    <p>UserId</p>
    <input name="number" type="text">
    <p>Password</p>
    <input name="password" type="password"><br>
    <input type="submit" value="ログイン">
</form>