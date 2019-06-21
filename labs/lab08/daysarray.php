<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>

<?php
    $days = array("Monday", "Tuesday", "Wednesday", "Thursday", "Friday");
    echo "The days of the week in english are: ";
    for ($i=0; $i < sizeof($days); $i++) {
        echo $days[$i], " ";
    }
    echo "<br/>";
    $days_in_french = array("Lundi", "Mardi", "Mercredi", "Jeudi", "Vendredi", "Samedi", "Dimanche");
    echo "The days of the week in french are: ";
    for ($i=0; $i < sizeof($days_in_french); $i++) {
        echo $days_in_french[$i], " ";
    }
    
?>
</body>
</html>
