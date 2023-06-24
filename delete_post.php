<?php
require_once("db_connect.php");

$id = $_GET['id'];

// PDOのインスタンスを取得
$pdo = db_connect();

try {
    // SQL文の準備
    $sql = "DELETE FROM books WHERE id = :id";
    // プリペアドステートメントの作成
    $stmt = $pdo->prepare($sql);
    // idのバインド
    $stmt->bindParam(':id', $id);
    // 実行
    $stmt->execute();
    // main.phpにリダイレクト
    header("Location: main.php");
    exit;
} catch (PDOException $e) {
    // エラーメッセージの出力
    echo 'Error: ' . $e->getMessage();
    // 終了
    die();
}

?>
