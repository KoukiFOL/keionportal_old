<?php
session_start();
if (!$_GET) {
    header("Location:./index.php");
    exit();
}
if (!$_SESSION) {
    header("Location:../users/login.php");
    $message = "ログインしてください。";
    exit();
}
?>
<?php
require("../frames/urlpointer.php");
require("../frames/urlchanger.php");
require('../frames/header.php');
?>

<?php
$date = $_GET['date'];
$time = $_GET['time'];

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
    <form name="confirm" action="confirm.php" method="post" require>
        <input type="submit" value="はい" ;>
        <p><a href="./index.php">戻る</a></p>
    </form>
</body>

</html>