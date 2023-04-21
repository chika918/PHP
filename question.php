<link rel="stylesheet" href="php3-4.css">
<body>

    <?php
    //POST送信で送られてきた名前を受け取って変数を作成
    $name = $_POST['name'];

    //①画像を参考に問題文の選択肢の配列を作成
    $port = ["80","22","20","21"];
    $lang = ["PHP","Python","JAVA","HTML"];
    $sql = ["join","select","insert","update"];

    //② ①で作成した、配列から正解の選択肢の変数を作成

    ?>

    <p>お疲れ様です<?php echo $name; ?>さん</p>
    <!--フォームの作成 通信はPOST通信で-->

    <form action="answer.php" method="post">
        <h2>①ネットワークのポート番号は何番？</h2>
        <?php
            foreach($port as $value){ ?>
            <input type="radio" name="port" value="<?php echo $value;?>">
            <?php echo "<FONT COLOR=\"white\"> $value </FONT>";
        }
        ?>

        <h2>②Webページを作成するための言語は？</h2>
        <?php
        foreach($lang as $value){?>
            <input type="radio" name="lang" value="<?php echo $value;?>">
            <?php echo "<FONT COLOR=\"white\"> $value </FONT>";
        }
        ?>

        <h2>③MySQLで情報を取得するためのコマンドは？</h2>
        <?php
        foreach($sql as $value){?>
            <input type="radio" name="sql" value="<?php echo $value;?>">
            <?php echo "<FONT COLOR=\"white\"> $value </FONT>";
        }
        echo '<br>';
        ?>

        <!--名前の変数を[answer.php]へ送る-->
        <input type="hidden" name="name" value="<?php echo $name;?>"/>

        <input type="submit">

        <!--問題の正解の変数と名前の変数を[answer.php]に送る-->


    </form>







</body>
