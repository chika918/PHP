<?php
include_once("db_connect.php");

//「新規登録」ボタンクリック時に処理実行
if(isset($_POST['signup'])){
    //ユーザー名、パスワードの入力値チェック
    if(!empty($_POST["name"] && !empty($_POST["password"]))){
        $user = $_POST["name"];
        $password = $_POST["password"];

        //PDOインスタンス取得
        $pdo = db_connect();

        try{
            $stmt = $pdo->prepare("INSERT INTO users(name, password) VALUES (?, ?)");
            $stmt->execute(array($user, password_hash($password, PASSWORD_DEFAULT)));
            $message = '登録が完了しました';
        } catch (PDOException $e) {
            $errorMessage = 'データベースエラー';
            echo $e->getMessage();
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
    <title>ユーザー新規登録画面</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <h1>ユーザー登録画面</h1>
    <div><?php echo htmlspecialchars($message, ENT_QUOTES); ?></div>
    <form method="post">
        <input type="text" name="name" class="input" placeholder="ユーザー名">
        <br>
        <input type="text" name="password" class="input" placeholder="パスワード">
        <br>
        <input type="submit" name="signup" class="in" value="新規登録">
        <input type="button" class="new-user" onclick="location.href='./login.php'" value="ログイン画面へ">
    </form>
</body>
</html>