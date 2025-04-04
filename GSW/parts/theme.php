<?php

$theme = 'style';
$img = 'images/DarkTheme.svg';
$intro = '';
$home = 'images/logo_dark.png';

if(isset($_COOKIE['theme'])){
    $theme = $_COOKIE['theme'];
}
if(isset($_COOKIE['img'])){
    $img = $_COOKIE['img'];
}
if(isset($_COOKIE['home'])){
    $home = $_COOKIE['home'];
}

if(isset($_GET['toggle'])){
    $theme = ($theme === 'style') ? 'style_dark' : 'style';
    $img = ($img ==='images/DarkTheme.svg') ? 'images/LightTheme.svg' : 'images/DarkTheme.svg';
    $home = ($home === 'images/Logo_dark.png') ? 'images/Logo_light.png' : 'images/Logo_dark.png';
    
    setcookie('theme', $theme, time() + (8640 *30),'/');
    setcookie('img', $img, time() + (8640 *30),'/');
    setcookie('home', $home, time() + (8640 *30),'/');
    header("Location: " .$_SERVER['PHP_SELF']);
    exit;
}

?>