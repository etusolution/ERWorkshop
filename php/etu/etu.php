<?php
    session_start();
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

