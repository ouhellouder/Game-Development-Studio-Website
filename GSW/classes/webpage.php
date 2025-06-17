<?php

class Webpage
{
    public function render($id): void
    {

        $individual_data = file_get_contents("../json/individual.json");
        $individual_info = json_decode($individual_data, true);
        $name = $individual_info[$id]["name"];
        include_once("../parts/theme.php");

        echo ('<!DOCTYPE html>
        <html lang="en">
        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
            <title>' . $name . '</title>
            <link rel="stylesheet" type="text/css" href="../css/' . $theme . '.css">
            <style>
                .basic-block{ width: 100%; }
                #stationary{ margin: auto; display: block; }
                #rotate { animation: spin 10s linear infinite; display: block; margin: auto; }
                @keyframes spin {
                    from { transform: rotate(0deg); }
                    to { transform: rotate(360deg); }
                }
                .floatin{ display: flex; width: 100%; height: 100%; }
            </style>
        </head>');

        include $_SERVER['DOCUMENT_ROOT'] . '/GSW/parts/header.php';
        require("coffee.php");

        $coffee = new Coffee();
        $game_array = ["Anna", "Fritz", "Lilith", "SpaceMerks", "RTS"];
        $game_name = $game_array[$id];

        
        if (isset($_POST['buy_game']) && isset($_SESSION['email'])) {
            $coffee->GameBought($game_name);
        }

        $owns_game = false;
        if (isset($_SESSION['email'])) {
            try {
                $coffee_ingredients = $coffee->GetMeCoffee();

            $owns_game = false;
            if ($coffee_ingredients && property_exists($coffee_ingredients, $game_name)) {
                $owns_game = $coffee_ingredients->$game_name == 1;
            }
            } catch (Exception $e) {
                
                error_log("Error in GetMeCoffee(): " . $e->getMessage());
            }
        }

        $state_text = $owns_game ? "You already own this game" : "Wanna get this game?";
        $button_html = "";

        if (!isset($_SESSION['email'])) {
            $button_html = '<button type="button" disabled>Please log in to get the game</button>';
        } elseif (!$owns_game) {
            $button_html = '
                <form method="POST">
                    <input type="hidden" name="buy_game" value="1">
                    <button type="submit">Get this game!</button>
                </form>';
        }

        echo ('
        <body style="margin-top: 64px;">
            <div style="display: flex; width: 100vw; height: auto;">
                <div style="width: 20%; display: flex;">
                    ' . $this->sidebar($id) . $this->sidebar($id) . '
                </div>

                <div style="width: 60%; display: flex; flex-direction: column; align-items: center; text-align: center;">
                    <div id="head-image">
                        <img src="' . $individual_info[$id]["head"] . '" alt="headline">
                        <hr>
                    </div>
                    <div class="basic-block" id="About">
                        <h1>' . $individual_info[$id]["hearmeout"] . '</h1>
                        <p>' . $individual_info[$id]["actualabout"] . '</p>
                        <hr>
                    </div>
                    <div class="basic-block" id="Gameplay">
                        <h1>Gameplay</h1>
                        <p>' . $individual_info[$id]["gameplay"] . '</p>
                        <hr>
                    </div>
                    <div class="basic-block" style="width: 100%;" id="Development">
                        <h1>Development</h1>
                        <p>' . $individual_info[$id]["development"] . '</p>
                        <hr>
                    </div>
                    <div class="basic-block">
                        <h1>' . $state_text . '</h1>
                        ' . $button_html . '
                        <hr>
                    </div>
                </div>

                <div style="width: 20%; display: flex; position: relative">
                    ' . $this->sidebar($id) . $this->sidebar($id) . '
                </div>
            </div>
        </body>');

        include_once("../parts/footer.php");
    }

    public function sidebar($id)
    {
        $individual_data = file_get_contents("../json/individual.json");
        $individual_info = json_decode($individual_data, true);

        $image__random_number = rand(1, 4);
        $image = $individual_info[$id][strval($image__random_number)];
        $random_delay = rand(60, 180);
        $random_number = rand(0, 1);
        $image_array = [
            '<marquee behavior="scroll" direction="up" scrolldelay="' . $random_delay . '" scrollamount="10" class="floatin"><img src="' . $image . '" id="rotate"></marquee>',
            '<marquee behavior="scroll" direction="up" scrolldelay="' . $random_delay . '" scrollamount="10" class="floatin"><img src="' . $image . '" id="stationary"></marquee>'
        ];
        return $image_array[$random_number];
    }
}
?>
