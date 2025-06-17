<style>
    .full-screen-div{
        width: 100%;
        height: 100vh;
        position: relative;
    }

    .full-screen-image{
        top: 0%;
        left: 0%;
        width: 100%;
        height: 100%;
        position: absolute;
        object-fit: fill;
        z-index: 0;
    }
</style>

<?php
include_once("parts/theme.php");
require_once("classes/coffee.php");

session_start();

// Redirect if not logged in
if (!isset($_SESSION["email"])) {
    echo '<script>window.location.replace("/GSW/parts/login.php");</script>';
    exit;
}

$onlick = '<script>window.location.replace("/GSW/cafeteria.php");</script>';
$coffee = new Coffee();
$stats;

try {
    $stats = $coffee->getUserStats();
    $_SESSION['games_owned'] = $stats['games_owned'];
    $_SESSION['coffee_count'] = $stats['coffee_count'];
} catch (Exception $e) {
    die("Error: " . $e->getMessage());
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cafeteria</title>
    <link rel="stylesheet" href="css/<?php echo $theme?>.css">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>




<?php include_once "parts/header.php"?>


    <body style="overflow-y: hidden;">
        <br>   
            
        <div style="display: flex; flex-flow: column; ">
            <div class = "full-screen-div">
                <img src="images/cafeteria_prototype.png" alt="something went wrong if you see this" class="full-screen-image">
                <button style=" z-index: 1; position: absolute ; margin-left: 21.5%; margin-top: 12.25%; background: none; border: none;" onclick="door()"><img src="images/door.png" alt="THE DOOR"></button>
                <button onclick="scrollToZoom('table-zoom')" style=" z-index: 2; position: absolute; margin-left: 47.5%; margin-top: 20%; opacity: 0;"><img src="images/table.png" alt="table" ></button>
                <img src="images/table.png" alt="table" style=" z-index: 1; position: absolute; margin-left: 47.5%; margin-top: 20%;">
                <img src="images/coffee.png" alt="coffee" style=" z-index: 1; position: absolute; margin-left: 55%; margin-top: 24%;">
                <img src="images/news.png" alt="news" style=" z-index: 1; position: absolute; margin-left: 65%; margin-top: 24%;">
                <form method="POST" action="parts/donate.php" onsubmit="return confirm('Would you like to buy the dev team a coffee? ☕');">
                    <button type="submit" style="z-index: 1; position: absolute; margin-left: 10%; margin-top: 16%; transform: scale(0.75); background: none; border: none;">
                        <img src="images/Kefir.png" alt="robot" />
                    </button>
                </form>
            </div>

            <div class="full-screen-div" id="table-zoom">
                <img src="images/zoomed_table.png" alt="zoomed table" class="full-screen-image">
                <button onclick="scrollToZoom('coffee-zoom')" style=" z-index: 2; position: absolute; margin-left: 30%; margin-top: 20%; opacity: 0;"><img src="images/table.png" alt="table" ></button>
                <img src="images/coffee_zoomed.png" alt="coffee" style=" z-index: 1; position: absolute; margin-left: 30%; margin-top: 20%;">
                <button onclick="scrollToZoom('news-zoom')" style=" z-index: 2; position: absolute; margin-left: 60%; margin-top: 18%; opacity: 0;"><img src="images/table.png" alt="table" ></button>
                <img src="images/news_zoomed.png" alt="news" style=" z-index: 1; position: absolute; margin-left: 60%; margin-top: 18%;">
            </div>

            <div class="full-screen-div" id="coffee-zoom">
                <img src="images/table_final.png" alt="zoomed table" class="full-screen-image">
                <img src="images/cup_empty.png" alt="coffee" style=" z-index: 1; position: absolute; margin-left: 25%; margin-top: 5.75%; transform: scale(0.75); ">
                <canvas id="myPieChart" style="max-width: 500px; margin: auto; position: relative; margin-top: 15.7%; margin-left: 41.25%; z-index: 3; transform: scale(1.35);"></canvas>
            </div>

            <div class="full-screen-div" id="news-zoom">
                <img src="images/table_final.png" alt="zoomed table" class="full-screen-image">
                <img src="images/news_empty.png" alt="news" style=" z-index: 1; position: absolute; margin-left: 43%; margin-top: 12%; transform: scale(1.5);">

            


            </div>
            
            
        </div>
        



<script>

function door(){
    window.location.replace("/GSW/index.php");
}



function donateCoffee() {
    if (confirm("Would you like to buy the dev team a coffee? ☕")) {
        fetch('parts/donate.php', {
            method: 'POST',
            credentials: 'include'
        })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                alert("Thank you for the coffee! ☕");
                document.getElementById('coffee-count').textContent = data.coffee_count;
            } else {
                alert("Error: " + data.message);
            }
        })
        .catch(error => alert("Something went wrong: " + error));
    }
}




function scrollToZoom(id){
    document.getElementById(id).scrollIntoView({behavior: "instant"});
}


const ctx = document.getElementById('myPieChart').getContext('2d');
const myPieChart = new Chart(ctx, {
    type: 'pie',
    data: {
        labels: ['Coffee contributed', 'Games owned'],
        datasets: [{
            label: 'Stats',
            data: [<?php echo($_SESSION['coffee_count'])?>, <?php echo($_SESSION['games_owned'])?>],
            backgroundColor: [
                'rgb(225, 171, 84)',
                'rgb(185, 132, 47)'
            ],
            borderColor: [
                'rgb(168, 126, 58)',
                'rgb(148, 106, 39)'

            ],
            borderWidth: 1
        }]
    },
    options: {
        responsive: true,
        plugins: {
            legend: {
                display: false
            },
            tooltip: {
                enabled: true
            }
        }
    }
});

</script>


</body>






<?php include_once "parts/footer.php"?>

</html>

