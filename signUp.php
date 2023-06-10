<?php

// db_connect.phpの読み込みFILL_IN
include_once("db_connect.php");

$message = '';

// POSTで送られていれば処理実行
if (isset($_POST["signUp"])){

    // nameとpassword両方送られてきたら処理実行
    if (!empty($_POST["name"]) && !empty($_POST["password"])){
        $user = $_POST["name"];
        $password = $_POST["password"];

        // PDOのインスタンスを取得FILL_IN
        $pdo = db_connect();

        try {
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
<html>
<head>
    <title></title>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
</head>
<body>
    <h1>新規登録</h1>
    <div><font color="#ff0000"><?php echo htmlspecialchars($message, ENT_QUOTES); ?></font></div>
    <form method="POST" action="">
        user:<br>
        <input type="text" name="name" id="name">
        <br>
        password:<br>
        <input type="password" name="password" id="password"><br>
        <input type="submit" value="submit" id="signUp" name="signUp">
    </form>
</body>
</html>