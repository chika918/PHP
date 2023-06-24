<?php
require_once("db_connect.php");
require_once("function.php");

//ログイン状態確認の関数実行
check_user_logged_in();

//「登録」ボタンクリック時に処理実行
if(!empty($_POST)){
    //入力値チェック
    if(empty($_POST["title"])) {
        echo '本のタイトルを入力してください';
    } else if (empty($_POST["date"])) {
        echo '本の日付を入力してください';
    } else if (empty($_POST["stock"])){
        echo '登録数を選択してください';
    }

    if(!empty($_POST["title"] && !empty($_POST["date"]) && !empty($_POST["stock"]))){
        $title = $_POST["title"];
        $date = $_POST["date"];
        $stock = $_POST["stock"];

        if($stock == '選択してください'){
            echo '登録数を選択してください';
        } else {
            //PDOインスタンス取得
            $pdo = db_connect();

            try {
                $stmt = $pdo->prepare("INSERT INTO books(title, date, stock) VALUES (?, ?, ?)");
                $stmt->execute(array($title, $date, $stock));
                $message = '登録が完了しました';
            } catch (PDOException $e) {
                $errorMessage = 'データベースエラー';
                echo $e->getMessage();
            }
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
    <title>本 登録</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <h1>本登録画面</h1>
    <form action="" method="post">
        <input type="text" name="title" class="input" placeholder="タイトル"><br>
        <input type="text" name="date" class="input" onfocus="this.type='date'" onfocus="this.type='text'" placeholder="発売日"><br>
        <div>在庫数</div>
        <input name="stock" class="stock" type="number" min="1" placeholder="選択してください"><br>
        <input type="submit" class="in" value="登録"><br>
        <a href="main.php">一覧画面へ戻る</a>
    </form>
    
</body>
</html>