<?php

function showpart($part){
    switch ($part){
        case 0:
            return "ボーカル";
        case 1:
            return "ギター";
        case 2:
            return "キーボード";
        case 3:
            return "ベース";
        case 4:
            return "ドラム";   
    }
}

function showdate($date){
    
}
?>
<!DOCTYPE html>
<html lang="ja">

<head>
    <title>【部員用】京都産業大学軽音楽部</title>
    <meta charset="utf-8">
    <link rel="stylesheet" href="..\style.css">
    <link rel="stylesheet" href=".\style.css">
    <link rel="stylesheet" href=".\frames\style.css">
</head>

<body>
    

    <div id="header">
        <h1 class="title"><a href="<?php echo $urls["home"]; ?>">KSU軽音ポータルサイト</a></h1>
    </div>
    <ul class="navi">
        <li><a href="<?php echo $urls["home"]; ?>">ホーム</a></li>
        <li><a href="<?php echo $urls["reserve"]; ?>">スタジオ予約</a></li>
        <li><a href="<?php echo $urls["info"]; ?>">部員紹介</a></li>
        <?php
        if (!$_SESSION){
            echo '<li><a href="';
            echo $urls['login'];
            echo '">ログイン</a></li>';
        }else{
            echo '<li><a href="';
            echo $urls['edit'];
            echo '">アカウント編集</a></li>';
            echo '<li><a href="';
            echo $urls['logout'];
            echo '">ログアウト</a></li>';
        }
        ?>
        <li><a href="<?php echo $urls["admin"]; ?>">管理者</a></li>
    </ul>
    <?php
    if ($_SESSION){
        $message = "こんにちは，{$_SESSION['name']} さん。";
    }
    ?>
    <?php
    echo '<p>'. $message .'</p>';
    ?>
</body>

</html>