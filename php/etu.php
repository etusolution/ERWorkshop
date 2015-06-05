<?php
    session_start();
    $product_list = array(
        "prd_001" => "小紅帽大野狼筆袋",
        "prd_002" => "小紅帽大野狼零錢包",
        "prd_003" => "小紅帽大野狼面紙包",
        "prd_004" => "BELLE CHANTE 飾品木盒",
        "prd_005" => "HUMANIA 小人萬萬歲迴紋針",
        "prd_006" => "木匙 – 簡約",
        "prd_007" => "CONCOMBRE 動物小頭木製夾",
        "prd_008" => "鄉村白瓷筆筒",
        "prd_009" => "鄉村奶白小物罐",
        );
    $row_length = 3;
    if ($_GET['login'] == 1 && !isset($_SESSION['uid'])){
        $_SESSION['uid'] = 'user_00'.rand(1,9);
    } else if ($_GET['login'] === '0' && isset($_SESSION['uid'])){
        unset($_SESSION['uid']);
    }

    if (!isset($_GET['login'])){
        $login_url = $_SERVER['REQUEST_URI'].(count($_GET) == 0 ? '?' : '&').'login='. (isset($_SESSION['uid']) ? 0 : 1);
    } else {
        $login_url = preg_replace('/login=(\d)/i','login='.(isset($_SESSION['uid']) ? 0 : 1),$_SERVER['REQUEST_URI']);
    }        

    $model['uid'] = $_SESSION['uid']; 
    $model['pid'] = $_GET['prd'];
    $model['cat'] = 'cat_001';
?>

