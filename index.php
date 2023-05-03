<?php
    class Taiyaki {
        public $content;
    
        public function __construct($nakami) {
            $this->content = $nakami;
        } 
    
        public function whatIsContent() {
            echo '中身は'.$this->content.'だよ。';
        }
    }


    // あんこのたい焼き 
    $taiyaki_anko = new Taiyaki("あんこ"); 
    $taiyaki_anko->whatIsContent(); 

    // クリームのたい焼き
    $taiyaki_cream = new Taiyaki("クリーム");
    $taiyaki_cream->whatIsContent();
    ?>