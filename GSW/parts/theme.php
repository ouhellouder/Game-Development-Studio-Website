<?php
$base_path = '/GSW';
$theme = 'style';
$img = $base_path . '/images/DarkTheme.svg';
$home = $base_path . '/images/logo_dark.png';

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
    $theme = ($theme === 'style') 
        ? 'style_dark' 
          : 'style';

    $img = ($img === $base_path . '/images/LightTheme.svg')
        ? $base_path . '/images/DarkTheme.svg'
        : $base_path . '/images/LightTheme.svg';

    $home = ($home === $base_path . '/images/Logo_light.png')
        ? $base_path . '/images/Logo_dark.png'
        : $base_path . '/images/Logo_light.png';

    setcookie('theme', $theme, time() + (8640 * 30), '/');
    setcookie('img', $img, time() + (8640 * 30), '/');
    setcookie('home', $home, time() + (8640 * 30), '/');

    
}
?>
