<?php
    $info_data = file_get_contents("json/games_info.json");
    $sec_text = json_decode($info_data, true); 
    
for($i = 0; $i < sizeof($sec_text);$i++){
    echo('
    <div class="image-container">
        <h1 class="other-header">'.$sec_text[$i]["name"].'</h1>
        <img src="'.$sec_text[$i]["cover"].'" alt="logo" class="clickable-image" id="game_cover">
        <div class="hidden-content">
            <p>'.$sec_text[$i]["info"].'</p>
            <a href = ""><img src="'.$sec_text[$i]["main"].'" alt="where pixture?s"></img></a>
    
        </div>
    </div>
    
    ');
}
?>


