<?php
include_once("../classes/webpage.php");
$gameId = $_GET['game_id'] ?? null;

$page = new Webpage;
$page->render();
?>