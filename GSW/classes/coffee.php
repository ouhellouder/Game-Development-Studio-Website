<?php
require_once("database.php");


class Coffee extends Database {
    private $db;

    public function __construct(){
        $this->db = $this->connect(); 
    }

public function GetMeCoffee() {
    if (!isset($_SESSION['email'])) {
        return null; 
    }

    $stmt = $this->db->prepare("
        SELECT Anna, Fritz, Lilith, SpaceMerks, RTS, coffee_count 
        FROM user_info 
        WHERE email = :email
    ");
    $stmt->bindParam(":email", $_SESSION['email'], PDO::PARAM_STR);
    $stmt->execute();

    return $stmt->fetch(PDO::FETCH_OBJ); 
}

    public function GameBought($game_name) {
        if (!isset($_SESSION['email'])) {
            throw new Exception("User not logged in.");
        }

        
        $allowed_games = ['Anna', 'Fritz', 'Lilith', 'SpaceMerks', 'RTS'];
        if (!in_array($game_name, $allowed_games)) {
            throw new Exception("Invalid game name.");
        }

        
        $sql = "UPDATE user_info SET $game_name = 1 WHERE email = :email";
        $stmt = $this->db->prepare($sql);
        $stmt->bindParam(":email", $_SESSION['email'], PDO::PARAM_STR);
        $stmt->execute();

        return $stmt->rowCount();
    }

public function CoffeeDonated(){
    if (!isset($_SESSION['email'])) {
        throw new Exception("User not logged in.");
    }

    $sql = "UPDATE user_info SET coffee_count = coffee_count + 1 WHERE email = :email";
    $stmt = $this->db->prepare($sql);
    $stmt->bindParam(":email", $_SESSION['email'], PDO::PARAM_STR);
    $stmt->execute();
}



    public function getUserStats() {
    if (!isset($_SESSION['email'])) {
        throw new Exception("User not logged in.");
    }

    $stmt = $this->db->prepare("
        SELECT Anna, Fritz, Lilith, SpaceMerks, RTS, coffee_count 
        FROM user_info 
        WHERE email = :email
    ");
    $stmt->bindParam(":email", $_SESSION['email'], PDO::PARAM_STR);
    $stmt->execute();
    $data = $stmt->fetch(PDO::FETCH_OBJ);

    if (!$data) {
        throw new Exception("User data not found.");
    }

    $games_owned = 0;
    $game_array = ['Anna', 'Fritz', 'Lilith', 'SpaceMerks', 'RTS'];
    foreach ($game_array as $game) {
        $games_owned += $data->$game;
    }

    return [
        'games_owned' => $games_owned,
        'coffee_count' => $data->coffee_count
    ];
}
}
?>