<?php
include_once("parts/theme.php");
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




    <body style="overflow-y: hidden;">
        <br>
        <br>
        <div style="display: flex; flex-flow: column; ">
            <div class = "full-screen-div">
                <img src="images/cafeteria_prototype.png" alt="something went wrong if you see this" class="full-screen-image">
                <img src="images/door.png" alt="THE DOOR" style=" z-index: 1; position: absolute ; margin-left: 21.5%; margin-top: 10.25%;">
                <button onclick="scrollToZoom('table-zoom')" style=" z-index: 2; position: absolute; margin-left: 47.5%; margin-top: 20%; opacity: 0;"><img src="images/table.png" alt="table" ></button>
                <img src="images/table.png" alt="table" style=" z-index: 1; position: absolute; margin-left: 47.5%; margin-top: 20%;">
                <img src="images/coffee.png" alt="coffee" style=" z-index: 1; position: absolute; margin-left: 55%; margin-top: 24%;">
                <img src="images/news.png" alt="news" style=" z-index: 1; position: absolute; margin-left: 65%; margin-top: 24%;">
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
            data: [30, 15],
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

