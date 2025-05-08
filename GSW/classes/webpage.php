<?php
class Webpage {
    public $name = "something";
    public function render(): void {
include_once("../parts/theme.php");

echo('<!DOCTYPE html>
<html lang="en">
<head>
    
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <title>'.$this->$name.'</title>
    <link rel="stylesheet" type="text/css" href="../css/'.$theme.'.css">
    
</head>');


include_once("../parts/header.php");

echo('<body>
    <div style="display: flex; align-items: center; flex-flow: column; margin-left: 20%; margin-right: 20%; ">
        <div id="head-image" style="margin-top: 64px;">
            <img src="" alt="headline">
            <hr>
        </div>
        <div id="About">
            <h1>Something about the game</h1>
            <p> Basic info</p>
            <hr>
        </div>
        <div id="Gameplay">
            <h1>Supposed way to play</h1>
            <p>There is none:D</p>
            <hr>
        </div>
        <div id="Development">
            <h1>The way of the jedai</h1>
            <p>This was our journey to make the game</p>
            <hr>
        </div>
    </div>
    
</body>

</html>');


include_once("../parts/footer.php");


    }
}
?>

