<link rel="stylesheet" href="style.css">

<body>
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
                while($row = $postdata->fetch(PDO::FETCH_ASSOC)){
                    $id = $row['id'];
                    $title = $row['title'];
                    $no = $row['category_no'];
                    $comment = $row['comment'];
                    $day = $row['created'];?>

                <tr>
                    <td>
                        <?php 
                            echo $id;
                            echo '<br>';
                        ?>
                    </td>
                    <td>
                        <?php
                            echo $title;
                            echo '<br>';
                        ?>
                    </td>
                    <td>
                        <?php
                            if($no == '1'){
                                echo '食事';
                            } elseif ($no == '2'){
                                echo '旅行';
                            } else {
                                echo 'その他';
                            }
                            echo '<br>';
                        ?>
                    </td>
                    <td>
                        <?php
                            echo $comment;
                            echo '<br>';
                        ?>
                    </td>
                    <td>
                        <?php
                            echo $day;
                            echo '<br>';
                        ?>
                    </td>
            <?php } ?>
        </table>
    </main>

    <footer>
        <p>Y&I group.inc</p>
    </footer>
</body>
</html>







