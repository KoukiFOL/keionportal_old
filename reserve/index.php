<?php
session_start();
if (!$_SESSION){
    header('Location:../users/login.php');
    $message = "ログインしてください。";
    exit();
}
?>

<?php
// SQLite3データベースへの接続
$db = new SQLite3('../keionportal.db');
if (!$db) {
    die("データベースに接続できません: " . $db->lastErrorMsg());
}
// テーブルからデータを取得
$result = $db->query('SELECT * FROM reserves');
if (!$result) {
    die("クエリの実行に失敗しました: " . $db->lastErrorMsg());
}
?>

<?php
require("../frames/urlpointer.php");
require("../frames/urlchanger.php");
require('../frames/header.php');
?>

<html>

<body>
    <h2>スタジオ予約</h2>
    <table>
        <tr>
            <td></td>
            <td>水</td>
            <td>木</td>
            <td>金</td>
            <td>土</td>
            <td>日</td>
            <td>月</td>
            <td>火</td>
        </tr>

        <?php
        while ($row = $result->fetchArray(SQLITE3_ASSOC)) {
            echo "<tr>";
            echo '<td>' . $row['time'] . "</td>";
            echo "<td>" . '<a href="./confirm.php?date=wednesday&time=' . $row['time'] . '">' . $row['wednesday'] . "</a></td>";
            echo "<td>" . '<a href="./confirm.php?date=thursday&time=' . $row['time'] . '">' . $row['thursday'] . "</a></td>";
            echo "<td>" . '<a href="./confirm.php?date=friday&time=' . $row['time'] . '">' . $row['friday'] . "</a></td>";
            echo "<td>" . '<a href="./confirm.php?date=saturday&time=' . $row['time'] . '">' . $row['saturday'] . "</a></td>";
            echo "<td>" . '<a href="./confirm.php?date=sunday&time=' . $row['time'] . '">' . $row['sunday'] . "</a></td>";
            echo "<td>" . '<a href="./confirm.php?date=monday&time=' . $row['time'] . '">' . $row['monday'] . "</a></td>";
            echo "<td>" . '<a href="./confirm.php?date=tuesday&time=' . $row['time'] . '">' . $row['tuesday'] . "</a></td>";
            echo "</tr>";
        }
        ?>
    </table>

</body>

</html>

<?php
$db->close();
?>