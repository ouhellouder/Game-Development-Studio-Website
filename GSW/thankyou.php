<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thank you</title>
</head>

<?php include_once "parts/header.html"?>



<body style="display: flex; background-color: rgb(61, 61, 61); justify-content: center; align-items: center; height: 100vh;">
    <div style="display: flex; background-color: crimson; width: 25%; justify-content: center; align-items: center; height: 200px;">
        <h1 style="color: rgb(61, 61, 61); display: flex; align-items: center; justify-content: center; flex-direction: column; text-align: center;" >
            Thank you for your submission.
            Redirecting to main page in <div id="counter">5</div> seconds
        </h1>
    </div>
</body>


    <script>
        setInterval(function() {
            var div = document.querySelector("#counter");
            var count = div.textContent * 1 - 1;
            div.textContent = count;
            if (count <= 0) {
                window.location.replace("/index.html");
            }
        }, 1000);
    </script>
</html>