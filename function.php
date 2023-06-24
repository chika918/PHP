<?php
//アクセス時にログイン状態を確認
//セッションに値がなければ未ログイン状態を判定。ログイン画面へ遷移する
function check_user_logged_in() {
    // セッション開始
    session_start();
    // セッションにuser_nameの値がなければlogin.phpにリダイレクト
    if (empty($_SESSION["user_name"])) {
        header("Location: login.php");
        exit;
    }
}

?>