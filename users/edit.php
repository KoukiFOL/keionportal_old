<?
require("../frames/urlpointer.php");
require("../frames/urlchanger.php");
require('../frames/header.php');
?>

<?php
session_start();
$database = new SQLite3("../keionportal.db");

$_number = $_SESSION['number'];
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $grade = $_POST['grade'];
    $name = $_POST['name'];
    $part = $_POST['part'];
    $birthday = $_POST['birthday'];
}
?>

<h2>アカウント編集</h2>
<form name="edit" action="edit.php" method="post">
    <p>学生証番号</p>
    <p>
        <?php echo "$number"; ?>
    </p>
    <p>名前</p>
    <input name="name" type="text" value="<?php echo $_SESSION["name"]; ?>">
    <p>生年月日(例:20030526)</p>
    <input name="birthday" type="text" value="<?php echo $_SESSION["birthday"]; ?>">
    <p>パート</p>
    <p>現在のパート:
        <?php echo showpart($_SESSION['part']); ?>
    </p>

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

</form>
