<?php
error_reporting(E_ALL); //E_STRICTレベル以外のエラーを報告する
ini_set('display_errors','On'); //画面にエラーを表示させるか

session_start();

//ログインしてなければ、login画面へ戻す
if(empty($_SESSION['login'])) header("Location:login.php");

?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>ホームページタイトル</title>
    <style>
        body {
            margin: 0 auto;
            padding: 150px;
            width: 25%;
            background: #fbfbfb;
        }

        h1 {
            color: #545454;
            font-size: 20px;
        }

        a {
            color: #545454;
            display: block;
        }

        a:hover {
            text-decoration: none;
        }

    </style>
    <link href="https://fonts.googleapis.com/css?family=Noto+Serif+JP&display=swap" rel="stylesheet">
</head>

<body>
    <?PHP if(!empty($_SESSION['login'])){ ?>
    <h1>マイページ</h1>
    <section>
        <p>
            あなたのemailは yuyajapan1123@gmail.com です。<br />
            あなたのpassは password です。
        </p>
        <a href="index.php">ホームへ</a>
    </section>
    <?php }else{ ?>
    <p>ログインしていないと見れません</p>
    <?php } ?>

</body>

</html>
