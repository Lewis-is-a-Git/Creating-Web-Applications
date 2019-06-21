<!DOCTYPE html>
<html lang="en"> 
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Retrieving records to HTML</title>
        <meta name="description" content="web apps lab10">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="addcar.css" type="text/css" />
    </head>
    <body>
        <h1>Creating Web apps Lab 10</h1>
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
            // successful connection
            $sql_table = "cars";

            // SQL command
            $query = "SELECT make, model, price FROM cars ORDER BY make, model";

            // store the result in a result pointer
            $result = mysqli_query($conn, $query);

            //check if the query was successful
            if (!$result) {
                echo "<p>Something is wrong with " , $query, "</p>";
            } else {
                // create a table to desipaly the result
                echo "<table>\n";
                echo "<tr>\n"
                . "<th scope =\"col\">Make</th>\n"
                . "<th scope =\"col\">Model</th>\n"
                . "<th scope =\"col\">Price</th>\n"
                . "</tr>\n";

                // Display the result
                while ($row = mysqli_fetch_assoc($result)) {
                    echo "<tr>\n";
                    echo "<td>",$row["make"],"</td>\n";
                    echo "<td>",$row["model"],"</td>\n";
                    echo "<td>",$row["price"],"</td>\n";
                    echo "</tr>\n";
                }
                echo "</table>\n";

                //free memory after displaying result
                mysqli_free_result($result);

            }
            //close database
            mysqli_close($conn);
        }
        ?>
    </body>
</html>
