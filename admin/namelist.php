<? require("../frames/header.php"); ?>
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
            switch ($row['part']){
                case 0:
                    echo "<td>ボーカル</td>";
                    break;
                case 1:
                    echo "<td>ギター</td>";
                    break;
                case 2:
                    echo "<td>キーボード</td>";
                    break;
                case 3:
                    echo "<td>ベース</td>";
                    break;
                case 4:
                    echo "<td>ドラム</td>";
                    break;


            }
            echo "<td>".$row['password']."</td>";
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