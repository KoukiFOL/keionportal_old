<?
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
    <h2>部員紹介</h2>
    <table>
        <tr>
            <td>学生証番号</td>
            <td>学年</td>
            <td>名前</td>
            <td>パート</td>
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
        }
        ?>
    </table>

<?php

$db =null;
}catch(PDOException $e){
    echo "エラー。管理者に問い合わせてください。以下がエラー文です";
    echo $e->getMessage();
}
?>



</body>

</html>