<?php
session_start();

if (!$_GET) {
    header("Location: ./index.php");
    exit();
} elseif (!$_SESSION) {
    header("Location: ../users/login.php");
    $message = "ログインしてください。";
    exit();
}

require("../frames/urlpointer.php");
require("../frames/urlchanger.php");
require('../frames/header.php');

$name = $_SESSION['name'];
$date = $_GET['date'];
$time = $_GET['time'];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // データベースへの接続
    $db = new SQLite3('../keionportal.db');
    if (!$db) {
        echo("データベースに接続できません: " . $db->lastErrorMsg());
    }

    $query = "UPDATE reserves SET {$date} = :name WHERE time = :time";
    $stmt = $db->prepare($query);
    $stmt->bindValue(':name', $name, SQLITE3_TEXT);
    $stmt->bindValue(':time', $time, SQLITE3_TEXT);
    $result = $stmt->execute();

    if ($result) {
        $message = "予約が完了しました。";
    } else {
        $message = "もう一度やり直してください。 " . $db->lastErrorMsg();
    }

    // データベースを閉じる
    $db->close();
}
?>

<html>

<body>
    <h2>予約内容</h2>
    <p>日程:
        <?php echo $date ?>
    </p>
    <p>時間:
        <?php echo $time ?>
    </p>
    <h3>予約しますか？</h3>
    <form name="confirm" action="confirm.php" method="post">
        <input type="submit" value="はい">
        <p><a href="./index.php">戻る</a></p>
    </form>
</body>

</html>