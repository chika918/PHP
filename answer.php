<link rel="stylesheet" href="php3-4.css">
<body>
    <?php 
    //[question.php]から送られてきた名前の変数、選択した回答、問題の答えの変数を作成

    $name = $_POST['name'];
    $port = $_POST['port'];
    $lang = $_POST['lang'];
    $sql = $_POST['sql'];

    //選択した回答と正解が一致していれば「正解！」、一致していなければ「残念・・・」と出力される処理を組んだ関数を作成する

    ?>
    <p><?php echo $name; ?>さんの結果は・・・？</p>

    <p>①の答え</p>
    <!--作成した関数を呼び出して結果を表示-->
    <?php
        function get1($port){
            if($port == 80){
                return "正解！";
            }else{
                return "残念・・・";
            }
        }
        echo get1($port);
    ?>

    <p>②の答え</p>
    <!--作成した関数を呼び出して結果を表示-->
    <?php
    function get2($lang){
        if($lang == "HTML"){
            return "正解！";
        }else{
            return "残念・・・";
        }
    }
    echo get2($lang);
    ?>

    <p>③の答え</p>
    <!--作成した関数を呼び出して結果を表示-->
    <?php
    function get3($sql){
        if($sql == "select"){
            return "正解！";
        }else{
            return "残念・・・";
        }
    }
    echo get3($sql)
    ?>
</body>


