<?php

error_reporting(E_ALL);
ini_set('display_errors','On');

if(!empty($_POST)){
    
    define('MSG01','入力必須です');
    define('MSG02', 'Emailの形式で入力してください');
    define('MSG03','パスワード（再入力）が合っていません');
    define('MSG04','半角英数字のみご利用いただけます');
    define('MSG05','6文字以上で入力してください');
    
    $err_msg = array();
    
    if(empty($_POST['email'])){
        
        $err_msg['email'] = MSG01;
    }
    if(empty($_POST['pass'])){
        
        $err_msg['pass'] = MSG01;
    }
    if(empty($_POST['pass_retype'])){
        
        $err_msg['pass_retype'] = MSG01;
    }
    
    if(empty($err_msg)){
        
        $email = htmlspecialchars($_POST['email'],ENT_QUOTES);
        $pass = htmlspecialchars($_POST['pass'],ENT_QUOTES);
        $pass_retype = htmlspecialchars($_POST['pass_retype'],ENT_QUOTES);
        
        if(!preg_match("/^([a-zA-Z0-9])+([a-zA-Z0-9\._-])*@([a-zA-Z0-9_-])+([a-zA-Z0-9\._-]+)+$/", $email)){
            
            $err_msg['email'] = MSG02;
        }

        if($pass !== $pass_retype){
            
             $err_msg['pass'] = MSG03;

        }

        if(empty($err_msg)){

            if(!preg_match("/^[a-zA-Z0-9]+$/", $pass)){

                $err_msg['pass'] = MSG04;
                
            }elseif(mb_strlen($pass) < 6){

                $err_msg['pass'] = MSG05;
            }

            if(empty($err_msg)){

                $dsn = 'mysql:dbname=dragonball01;host=localhost;charset=utf8';
                $user = 'root';
                $password = 'root';
                $options = array(
                    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION, 
                    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
                    PDO::MYSQL_ATTR_USE_BUFFERED_QUERY => true,
                );

                $dbn = new PDO($dsn, $user , $password , $options);

                $stmt = $dbn ->prepare('INSERT INTO users (email,pass,login_time) VALUES (:email,:pass,:login_time)');

                $stmt->execute(array(':email' => $email, ':pass' => $pass, ':login_time' => date('Y-m-d H:i:s')));
                
                header("Location:mypage.php");
            }

        }
    }

}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Dragonball_login</title>
    <link rel="stylesheet" href="style.css">
    <link href="https://fonts.googleapis.com/css?family=Noto+Serif+JP&display=swap" rel="stylesheet">
</head>

<body>
    <div id="user" class="big-bg-a">
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
            <h2 class="page-title">ユーザー登録</h2>

            <form action="" method="post">
                <div class="form-group">
                    <label for="">Eメール：<span class="err_msg"><?php if(!empty($err_msg['email'])) echo $err_msg['email']; ?></span></label>
                    <input type="email" id="email" name="email" placeholder="email" value="<?php if(!empty($_POST['email'])) echo $_POST['email'];?>">
                </div>

                <div class="form-group">
                    <label for="">パスワード：<span class="err_msg"><?php if(!empty($err_msg['pass'])) echo $err_msg['pass']; ?></span></label>
                    <input type="password" id="email" name="pass" placeholder="パスワード" value="<?php if(!empty($_POST['pass'])) echo $_POST['pass']; ?>">
                </div>

                <div class="form-group">
                    <label for="">パスワード(再入力)：<span class="err_msg"><?php if(!empty($err_msg['pass_retype'])) echo $err_msg['pass_retype']; ?></span></label>
                    <input type="password" id="email" name="pass_retype" placeholder="パスワード（再入力）" value="<?php if(!empty($_POST['pass_retype'])) echo $_POST['pass_retype']; ?>">
                </div>

                <input type="submit" class="button" value="送信">
            </form>
        </div>

    </div>

    <footer id="footer">
        Copyright<a href="">Dragonball練習ページ.</a>All Rights Reserved.
    </footer>

</body>

</html>
