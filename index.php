<?php

// クラスの名簿の配列
ini_set( 'display_errors', 1 );
$list = array(
    '山田' => array(
        '氏名' => '山田',
        'ID' => '001',
        '出身' => '函館',
        'メールアドレス' => 'yamada@example.com',
        '性別' => '女性'
    ),
    '田中' => array(
        '氏名' => '田中',
        'ID' => '002',
        'メールアドレス' => 'tanaka@example.com',
        '性別' => '男性'
    ),
    '高橋' => array(
        '氏名' => '高橋',
        'ID' => '003',
        '出身' => '札幌',
        'メールアドレス' => 'takahasi@example.com',
        '性別' => '女性',
    ),
    '井上' => array(
        '氏名' => '井上',
        'ID' => '004',
        '出身' => '東京',
        'メールアドレス' => 'inoue@example.com',
        '性別' => '男性',
    ),
    '小林' => array(
        '氏名' => '小林',
        'ID' => '005',
        '出身' => '大阪',
        'メールアドレス' => 'kobayasi@example.com',
        '性別' => '男性',
    ),
    '森' => array(
        '氏名' => '森',
        'ID' => '006',
        '出身' => '沖縄',
        'メールアドレス' => 'mori@example.com',
        '性別' => '女性',
    )
);

// 取得したクラス名簿を表示するための処理

function getName($list) {
        $i = 0;
        echo "【Aクラスの名簿】" . '<br>';
        //配列の中の名前を出す。
        foreach ($list as $key => $member) {
            if ($i < count($list)) {
                echo $member['氏名'] . '<br>';
            }
            $i++;
        }
}

// クラスの一覧を表示
getName($list);
echo '<br>';
// 大阪出身の方を表示
getPeople($list);

// 大阪出身の方を抽出
function getPeople($list) {
    foreach ($list as $key => $member) {
        if (isset($member['出身']) && $member['出身'] === '大阪') {
            echo "☆クラスで大阪出身の子は" . $key . PHP_EOL . "さんです。";
        }
    }
}

?>