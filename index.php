
<?php
        require_once("getData.php");

        try {
            $data = new getData(); //クラスのインスタンス化
            $userdata = $data->getUserData(); //ユーザー情報取得の関数実行
            $postdata = $data->getPostData(); //記事情報取得の関数実行

        } catch(PDOException $e){
            echo 'Error: ' . $e->getMessage();
            die();
        } 
?> 

<!DOCTYPE html>
<html>
    <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <link rel="stylesheet" href="style.css">
    </head>

    <body>
    <header>
        <div class="logo">
            <img src="1599315827_logo.png" alt="">
        </div>
        <div class="info">
            <div class="name">
                <p class="info_p">ようこそ <?php echo $userdata['last_name']. $userdata['first_name']; ?> さん</p>
            </div>
            <div class="time">
                <p class="info_p">最終ログイン日：<?php echo $userdata['last_login'];?></p>

            </div>
        </div>
    </header>

    <main>
        <div>
            
        </div>
        <table>
            <tr>
                <th>記事ID</th>
                <th>タイトル</th>
                <th>カテゴリ</th>
                <th>本文</th>
                <th>投稿日</th>
            </tr>

            <?php
                //記事情報の書き出し（連想配列にする）
                while($row = $postdata->fetch(PDO::FETCH_ASSOC)){ ?>
                    <tr>
                        <td><?php echo $row['id'];?></td>
                        <td><?php echo $row['title'];?></td>
                        <td>
                            <?php
                                if($row['category_no'] == '1'){
                                    echo '食事';
                                } elseif ($row['category_no'] == '2'){
                                    echo '旅行';
                                } else {
                                    echo 'その他';
                                }
                            ?>
                        </td>
                        <td><?php echo $row['comment'];?></td>
                        <td><?php echo $row['created'];?></td>
                    </tr>
            <?php } ?>
        </table>
    </main>

    <footer>
        <p>Y&I group.inc</p>
    </footer>
</body>
</html>
