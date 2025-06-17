<?php
    if(!isset($_SESSION)) 
    { 
        session_start(); 
    } 




// Define base URL
$base_url = '/GSW';
$game_id = isset($_GET['game_id']) ? $_GET['game_id'] : null;
$toggle_url = '?toggle=true';

if ($game_id !== null) {
    $toggle_url .= '&game_id=' . urlencode($game_id);
}


$name = "not logged";
$state = "log in";
$link = "/GSW/parts/login.php";

if(isset($_SESSION['email']) && $_SESSION['email'] == true){
    $name = $_SESSION['nickname'];
    $link = "/GSW/parts/logout.php";
    $state = "log out";
}

echo('
<header>
    <section>
        <a href="'.$base_url.'/index.php">Home Page</a>
        <a href="'.$base_url.'/game_info.php">Games</a>
        <a href="'.$base_url.'/cafeteria.php">Cafeteria</a>
    </section>
    <section>
        <a href="'.$toggle_url.'"><img src="'. $img.'" alt="switch" style="height: 50px;"></a>
    </section>
    <section>
        <p style="margin: 0;">'.$name.'</p>
        <a href="'.$link.'" style="font-size: 16px; text-decoration: none; color: coral;">'.$state.'</a>
    </section>
</header>

');
?>









