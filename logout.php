<?
// セッション開始
session_start();
// セッション変数の初期化(配列を空にする)
$_SESSION = array();
// セッションクリア（session_destroyメソッドで、セッションを完全にクリアする）
session_destroy();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ログアウト</title>
</head>
<body>
    <h1>ログアウト画面</h1>
    ログアウトしました。<br>
    <a href="login.php">ログイン画面へ戻る</a>
</body>
</html>