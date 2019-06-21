<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Search Result</title>
    <link rel="stylesheet" href="addcar.css" type="text/css" />
</head>
<body>
    <?php
    require_once("settings.php");
    $conn = @mysqli_connect(
        $host,
        $user,
        $pwd,
        $sql_db
    );
    if (!$conn) {
        //display an error message
        echo "<p>Database connection failure</p>";
    } else {
        //Set table
        $sql_table = "cars";

        // SQL command
        $query = "";

        // Set the data
        if ($_GET["carmake"]!=""){
            $make = htmlspecialchars(trim($_GET["carmake"]));
            if ($query != ""){
                $query .= "AND ";
            }
            $query .= " make='$make' ";
        }
        if ($_GET["carmodel"]!=""){
            $model = htmlspecialchars(trim($_GET["carmodel"])); 
            if ($query != ""){
                $query .= "AND ";
            }
            $query .= "model='$model' ";
        }
        if ($_GET["price"]!=""){
            $price = htmlspecialchars(trim($_GET["price"]));
            if ($query != ""){
                $query .= "AND ";
            }
            $query .= "price='$price' ";
        }
        if ($_GET["yom"]!=""){
            $yom = htmlspecialchars(trim($_GET["yom"]));
            if ($query != ""){
                $query .= "AND ";
            }
            $query .= "yom='$yom' ";
        }
        if ($query == ""){
            echo "<p>Please enter search terms <a href=\"searchcar.html\">Here.</a></p>";
        } else {
            $query = "SELECT make, model, price, yom FROM cars WHERE " . $query . ";";
        // store the result in a result pointer
        $result = mysqli_query($conn, $query);
        //check if the query was successful
        if (!$result) {
            echo "<p class=\"wrong\">Something is wrong with the query.</p>";
        } else {
            // create a table to desipaly the result
            echo "<table>\n";
            echo "<tr>\n"
            . "<th scope =\"col\">Make</th>\n"
            . "<th scope =\"col\">Model</th>\n"
            . "<th scope =\"col\">Price</th>\n"
            . "<th scope =\"col\">Year</th>\n"
            . "</tr>\n";

            // Display the result
            while ($row = mysqli_fetch_assoc($result)) {
                echo "<tr>\n";
                echo "<td>",$row["make"],"</td>\n";
                echo "<td>",$row["model"],"</td>\n";
                echo "<td>",$row["price"],"</td>\n";
                echo "<td>",$row["yom"],"</td>\n";
                echo "</tr>\n";
            }
            echo "</table>\n";

            //free memory after displaying result
            mysqli_free_result($result);
        }
        //close database
        mysqli_close($conn);
    }
    }
    ?>
</body>
</html>
