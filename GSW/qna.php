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

<?php 
    require("classes/qnac.php");
    $qna = new Qna();
    $data = $qna->Qnagoin();
  ?>

<?php 
    echo('<section class="main-page"><p>The most common questions and answers:</p></section>');
    for($i=0;$i<3;$i++){
        echo('
            <section class="main-page">
                <div><p>'.$data[$i]["questions"].'</p></div>
                <div><p>'.$data[$i]["answers"].'</p></div>
            </section>
        ');
    };
?>
<?php echo('')?>


</body>

<?php include_once "parts/footer.php"?>

</html>