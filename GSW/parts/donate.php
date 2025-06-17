<?php
session_start();
require_once("../classes/coffee.php");

try {
    $coffee = new Coffee();
    $coffee->CoffeeDonated();

    $data = $coffee->GetMeCoffee();
    $_SESSION['coffee_count'] = $data->coffee_count;

    header("Location: /GSW/cafeteria.php");
    exit;

} catch (Exception $e) {
    header("Location: /GSW/cafeteria.php?error=" . urlencode($e->getMessage()));
    exit;
}
