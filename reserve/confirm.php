<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
session_start();
//URLパラメータから曜日&時間を取得
if (!$_GET) {
    header("Location: ./index.php");
    exit();
    //ログインしていなかったらログイン画面へ遷移
} elseif (!$_SESSION) {
    header("Location: ../users/login.php");
    $message = "ログインしてください。";
    exit();
}
//ヘッダーの呼び出し
require("../frames/urlpointer.php");
require("../frames/urlchanger.php");
require('../frames/header.php');

// データベースへの接続
$db = new SQLite3('../keionportal.db');

//データベースに接続できなかった場合の処理
if (!$db) {
    die ("データベースに接続できません: " . $db->lastErrorMsg());
}

//名前、日付、時間の定義
$name = $_SESSION['name'];
$date = $_GET['date'];
$time = $_GET['time'];
$movement = "e";

//予約状況を取得
$status_query = "SELECT {$date} from reserves where time = :time";
$status_stmt = $db->prepare($status_query);
$status_stmt->bindValue(':time', $time, SQLITE3_TEXT);
$status_result = $status_stmt->execute();
$status_result->fetchArray(); 

if ($status_result) {
    $status = $status_result;
} else {
    echo "予約状況を取得できませんでした。";
}


if ($status == "空") {
    $movement = "予約";
    $query = "UPDATE reserves SET {$date} = :name WHERE time = :time";
    $stmt = $db->prepare($query);
    $stmt->bindValue(':name', $name, SQLITE3_TEXT);
    $stmt->bindValue(':time', $time, SQLITE3_TEXT);
    $result = $stmt->execute();
}
if ($result) {
    $message = "予約が完了しました。";
} else {
    $message = "もう一度やり直してください。 " . $db->lastErrorMsg();
}

// データベースを閉じる
$db->close();

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
    <h3>
        <?php echo $movement ?>しますか？
    </h3>
    <form name="confirm" action="confirm.php" method="post">
        <input type="submit" value="はい">
        <p><a href="./index.php">戻る</a></p>
    </form>
</body>

</html>
<?php
