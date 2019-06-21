<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Guessing Game</title>
</head>

<body>
    <h1>Guessing Game</h1>
    <p>Enter a number Between 1 and 100</p>
    <p>then press the Guess Button</p>
    <form action="guessinggame.php" method="get">
        <input type="text" />
        <input type="button" value="Guess" />
    </form>
    <?php
        session_start();
        $guess = $_GET["guess"];
        $randNum = $_SESSION["answer"];
        if ($randNum == 0){
            $randNum = rand(1, 100);
        }
        
        if ($guess == $randNum){
            echo "<p>Correct</p>";
            
        }
        elseif ($guess < $randNum) {
            echo "<p>Higher</p>";
        } else {
            echo "<p>Lower</p>";
        }
        $_SESSION["answer"] = $randNum;

    ?>
    <p><a href="giveup.php">Up &#x2191</a></p>
    <p><a href="startover.php">Down &#x2193</a></p>
</body>

</html>
