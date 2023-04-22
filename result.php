<?php

  //②フォームからのデータを受け取ります

  $name = $_POST['name'];
  $num = $_POST['num'];

  //③受け取った数字に1~6までのランダムな数字を掛け合わせて
  //変数に入れてください
  //$rand = mt_rand(1, 6);
  //$num = $num * $rand;
  $num = $num * mt_rand(1, 6);
  //echo $num;

  //④掛け合わせた数字の結果によっておみくじを選び、変数に入れます
  $result;
  if($num >= 37){
    $result = "残念";
  }elseif($num >= 26){
    $result = "大吉";
  }elseif($num >= 21){
    $result = "中吉";
  }elseif($num >= 16){
    $result = "吉";
  }elseif($num >= 11){
    $result = "小吉";
  }elseif($num >= 1){
    $result = "凶";
  }

  //⑤今日の日付と、名前、番号、おみくじ結果を表示
  date_default_timezone_set ('Asia/Tokyo');
  echo date("Y-m-d H:i:s");
  echo '<br>';
  echo "名前は",$name,"です。";
  echo '<br>';
  echo "番号は",$num,"です。";
  echo '<br>';
  echo "結果は",$result,"です。";
  ?>
