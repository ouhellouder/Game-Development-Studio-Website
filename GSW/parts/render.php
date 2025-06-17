<?php
session_start();
include_once("../classes/webpage.php");

$game_id = 9999; 


if (isset($_GET['game_id']) && ctype_digit($_GET['game_id'])) {
    $id = (int) $_GET['game_id'];

    
    if ($id >= 0 && $id <= 4) {
        $game_id = $id;
    }
}


if ($game_id === 9999) {
    echo '<script>window.location.href = "http://localhost/gsw/parts/get_out.html";</script>';
    exit;
}


$page = new Webpage;
$page->render($game_id);

