<?php 
require_once("db_connect.php");
require_once('function.php');

//ログイン状態を確認する関数実行
check_user_logged_in();

$pdo = db_connect();

try {
    $sql = "SELECT * FROM books";
    $stmt = $pdo->prepare($sql);
    $stmt->execute();
} catch (PDOException $e) {
    echo 'Error:' .$e->getMessage();
    die();
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>在庫一覧</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <h1>在庫一覧画面</h1>
    <div>
        <input class="new" type="submit" value="新規登録" onclick="location.href='./create_book.php'">
        <input class="logout" type="submit" value="ログアウト" onclick="location.href='./logout.php'">
    </div>
    <table>
        <tr class="t-head">
            <td>タイトル</td>
            <td>発売日</td>
            <td>在庫数</td>
            <td></td>
        </tr>
        <?php while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) { ?>
            <tr>
                <td><?php echo $row['title']; ?></td>
                <td><?php echo $row['date']; ?></td>
                <td><?php echo $row['stock']; ?></td>
                <td><button class="del" onclick="location.href='delete_post.php?id=<?php echo $row['id']; ?>'">削除</button></td>
                
            </tr>
        <?php } ?>
    </table>
</body>
</html>