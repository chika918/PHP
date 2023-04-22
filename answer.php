<link rel="stylesheet" href="php3-4.css">
<body>
    <?php 
    //[question.php]から送られてきた名前の変数、選択した回答、問題の答えの変数を作成
    //名前
        $name = $_POST['name'];
    //選択した回答
        $port = $_POST['port'];
        $lang = $_POST['lang'];
        $sql = $_POST['sql'];
    //問題の答え
        $port_answer = $_POST['port_answer'];
        $lang_answer = $_POST['lang_answer'];
        $sql_answer = $_POST['sql_answer'];
    ?>

    <!--名前を表示-->
    <p><?php echo $name; ?>さんの結果は・・・？</p>

    <!--①〜③の結果を表示-->
    <!--選択した選択肢と正解の変数を関数の引数に入れて条件分岐-->
    <!--選択した回答と正解が一致していれば「正解！」、一致していなければ「残念・・・」を出力-->
    <p>①の答え</p>
    <?php
        function get1($port,$port_answer){
            if($port == $port_answer){
                return "正解！";
            }else{
                return "残念・・・";
            }
        }
        //関数呼び出しして返り値を表示
        echo get1($port,$port_answer);
    ?>

    <p>②の答え</p>
    <?php
    function get2($lang,$lang_answer){
        if($lang == $lang_answer){
            return "正解！";
        }else{
            return "残念・・・";
        }
    }
    echo get2($lang,$lang_answer);
    ?>

    <p>③の答え</p>
    <?php
    function get3($sql,$sql_answer){
        if($sql == "select"){
            return "正解！";
        }else{
            return "残念・・・";
        }
    }
    echo get3($sql,$sql_answer)
    ?>
</body>


