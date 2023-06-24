<?php
require_once('db_connect.php');
session_start();

//「ログイン」ボタンクリック時の処理
if (!empty($_POST)){
    //ユーザー名、パスワード入力確認
    if (empty($_POST["name"])){
        echo "名前を入力してください。";
    }
    if (empty($_POST["password"])){
        echo "パスワードを入力してください。";
    }

    //ユーザー名、パスワードともに入力されている時の処理
    if (!empty($_POST["name"]) && !empty($_POST["password"])){
        $name = htmlspecialchars($_POST['name'], ENT_QUOTES);
        $password = htmlspecialchars($_POST['password'], ENT_QUOTES);
        $pdo = db_connect();

        try{
            $sql = "SELECT * FROM users WHERE name = :name";
            $stmt = $pdo->prepare($sql);
            $stmt->bindParam(':name', $name);
            $stmt->execute();
        } catch (PDOException $e) {
            echo 'Error: ' . $e->getMessage();
            die();
        }

        if ($row = $stmt->fetch(PDO::FETCH_ASSOC)){
            if (password_verify($password, $row['password'])){
                //セッションに値を保存
                $_SESSION["user_id"] = $row['id'];
                $_SESSION["user_name"] = $row['name'];
                
                header("Location: main.php");
                exit;
            } else {
                echo "パスワードに誤りがあります";
            }
        } else {
            echo "ユーザー名かパスワードに誤りがあります";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ログイン画面</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="head">
        <h1 class="title">ログイン画面</h1>
        <input class="new-user" type="submit" onclick="location.href='./signup.php'" value="新規ユーザー登録">
    </div>

    <form method="post">
        <input type="text" name="name" class="input" placeholder="ユーザー名">
        <br>
        <input type="text" name="password" class="input" placeholder="パスワード">
        <br>
        <input type="submit" class="in" value="ログイン">
    </form>
</body>
</html>