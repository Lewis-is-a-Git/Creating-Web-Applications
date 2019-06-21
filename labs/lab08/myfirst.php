<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Using PHP variables and operators</title>
</head>
<body>
    <h1>Creating web applications - lab08</h1>

<?php
    $marks = array(85, 85, 95); //declare and initialise array
    $marks[1] = 90; //modify second element
    $ave = 0;
    for ($i=0; $i < sizeof($marks) ; $i++) { 
        $ave += $marks[$i];
    }
    $ave /= sizeof($marks);

    if ($ave > 50) {
        $status = "PASSED";
    } else {
        $status = "FAILED";
    }
    echo "<p>The average score is $ave. You $status.</p>";

?>
    
</body>
</html>
