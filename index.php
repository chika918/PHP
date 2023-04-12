<?php
  //商品の税込価格を計算しましょう
  //①税率を定数TAXで作成しましょう。消費税は10%とします。
  //②商品の情報を連想配列に入れましょう。
  //③税率を計算する関数を用意します。
  //引数には値段を受け取り、税込価格を返答します。
  //④繰り返し文を使って画面に指定の文字を表示しましょう！

  define("TAX",1.1);
  define("text1","の税込価格は");
  define("text2","円です");

  $products = ["鉛筆" => 100 , "消しゴム" => 150, "物差し" => 500];

  function get($item,$value){
    $value = $value * TAX;
    echo $item.text1.$value.text2;
    echo '<br>';

  }

  foreach($products as $key => $value){
    get($key,$value);
  }
  
  ?>