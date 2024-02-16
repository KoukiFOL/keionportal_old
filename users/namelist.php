<?
session_start();
require("../frames/urlpointer.php");
require("../frames/urlchanger.php");
require('../frames/header.php'); 
?>

<?php
try{
    $db = new PDO('sqlite:../keionportal.db');
    $query = "select * from users";
    $result = $db -> query($query);

?>

<html>

<body>
    <h2>名簿</h2>
    <table>
        <tr>
            <td>学生証番号</td>
            <td>学年</td>
            <td>名前</td>
            <td>パート</td>
            <td>password</td>
        </tr>

        <?php
        while ($row = $result ->fetch(PDO::FETCH_ASSOC)){
            echo "<tr>";
            echo "<td>".$row['number']."</td>";
            echo "<td>".$row['grade']."</td>";
            echo "<td>".$row['name']."</td>";
            echo "<td>";
            echo showpart($row['part']);
            echo "</td>";
            echo "<td>".$row['password']."</td>";
        }
        ?>
    </table>

<?php

$db =null;
}catch(PDOException $e){
    $message = "エラー。管理者に問い合わせてください。エラー文です{$e->getMessage()};";
    }
?>



</body>

</html>