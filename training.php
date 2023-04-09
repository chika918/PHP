<?php
$name = "taro";
$pwd = "pass";

if ($name == 'taro' && $pwd == 'pass'){
    echo "ログイン成功です";
} else if ($name == 'taro' && $pwd != 'pass'){
    echo "パスワードが間違っています。";
} else if ($name != 'taro' && $pwd == 'pass'){
    echo "名前が間違っています。";
} else if ($name != 'taro' && $pwd != 'pass'){
    echo "入力情報が間違っています ";
}



for($i=0;$i<101;$i++){
    echo $i;
    echo '<br>';
}
?>