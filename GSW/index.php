<?php
include_once("parts/theme.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <title>Last Minute Game Studio</title>
    <link rel="stylesheet" type="text/css" href="css/<?php echo $theme ;?>.css">
    
</head>


<?php include_once "parts/header.php"?>


<body>
    
<?php echo('

<section class="main-page">
    <img src="'.$home.'" alt="Our logo and name here">
    <p> We are Last Minute Game Studio. Our goal is to create and release high quality games. </p>
    <p> Our team consist of 1 head programmer, 1 head designer, 1 lore master and 2 3D moddelers</p>
</section>

')?>


</body>

<?php include_once "parts/footer.html"?>

</html>