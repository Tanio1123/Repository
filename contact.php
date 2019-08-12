<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Dragonball_contact</title>
    <link rel="stylesheet" href="style.css">
    <link href="https://fonts.googleapis.com/css?family=Noto+Serif+JP&display=swap" rel="stylesheet">
</head>

<body>
    <div id="contact" class="big-bg-a">
        <header class="page-header wrapper">
            <h1><a href="index.php"><img class="logo" src="img/logo_dragonball.gif" alt="dragonballz"></a></h1>
            <nav>
                <ul class="main-nav">
                    <li><a href="index.php">ホーム</a></li>
                    <li><a href="character.php">キャラクター</a></li>
                    <li><a href="contact.php">お問い合わせ</a></li>
                    <li><a href="user.php">ユーザー登録</a></li>
                    <li><a href="login.php">ログイン</a></li>
                </ul>
            </nav>
        </header>

        <div class="wrapper">
            <h2 class="page-title">お問い合わせ</h2>

            <form action="" method="post">
                <div class="form-group">
                    <label for="">名前：任意<span class="help-block"></span></label>
                    <input type="text" id="name" class="valid-text" name="name" placeholder="名前" value="">
                </div>

                <div class="form-group">
                    <label for="">Eメール：＊必須<span class="help-block"></span></label>
                    <input type="email" id="email" class="valid-email" name="email" placeholder="Email" value="">
                </div>

                <div class="form-group">
                    <label for="">メッセージ：＊必須<span class="help-block"></span></label>
                    <textarea name="message" class="valid-textarea" id="message" cols="30" rows="10"></textarea>
                </div>

                <input type="submit" class="button" value="送信">
            </form>
        </div>

    </div>

    <footer id="footer">
        Copyright<a href="">Dragonball練習ページ.</a>All Rights Reserved.
    </footer>
    <script src="https://code.jquery.com/jquery-3.4.1.slim.js"></script>
    <script src="main.js"></script>
</body>

</html>
