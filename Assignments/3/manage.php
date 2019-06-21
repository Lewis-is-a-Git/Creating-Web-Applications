<?php
include('session.php');
?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">

<head>
    <?php include 'header.inc' ?>
    <title>Manage EOI's</title>
    <!-- Description: Manage the applicants -->
    <!-- Author: lewis 101533222 -->
    <!-- Date: 19/05/19 -->
    <!-- Validated: OK <19/05/19> -->
</head>

<body>
    <div id="page-container">
        <div id="content-wrap">
            <?php include 'menu.inc'; ?>
            <main class="container-fluid">
                <h1>Manage Applicants</h1>
                <h2>Welcome <?php echo $row['username']; ?></h2>
                <p><a href="logout.php">Sign Out</a></p>
                <h2>Search Applicant</h2>
                <!-- Search for EOI's-->
                <form method="post" action="manage.php">
                    <fieldset>
                        <legend>Search for a member or leave blank to display all</legend>
                        <p> <label for="eoinumber">EOI Number: </label>
                            <input type="text" name="eoinumber" id="eoinumber" /></p>
                        <p> <label for="jobid">Job ID: </label>
                            <input type="text" name="jobid" id="jobid" /></p>
                        <p> <label for="givenname">Given Name: </label>
                            <input type="text" name="givenname" id="givenname" /></p>
                        <p> <label for="familyname">Family Name: </label>
                            <input type="text" name="familyname" id="familyname" /></p>
                        <p>
                            <label for="order">Order Results By</label>
                            <select name="order" id="order">
                                <option hidden="hidden" value="">Select field...</option>
                                <option value="jobid">Job ID</option>
                                <option value="givenname">Given Name</option>
                                <option value="familyname">Family Nsame</option>
                                <option value="dob">Date of Birth</option>
                                <option value="gender">Gender</option>
                                <option value="streetaddress">Address</option>
                                <option value="suburb">Suburb</option>
                                <option value="stateterritory">State or Territory</option>
                                <option value="postcode">Post Code</option>
                                <option value="email">Email</option>
                                <option value="phone">Phone</option>
                                <option value="app_date">Date</option>
                                <option value="appstatus">Application Status</option>
                            </select>
                        </p>
                    </fieldset>
                    <input class="button" type="submit" value="Search" name="Search" />
                </form>
                <hr />
                <?php
                // Check if this form was submitted
                if (!empty($_POST["Search"])) {
                    if (
                        // check if the data is empty
                        isset($_POST["eoinumber"]) || isset($_POST["jobid"]) ||
                        isset($_POST["givenname"]) || isset($_POST["familyname"])
                    ) {

                        /**
                         * Sanitised the input data
                         * @return sanitised data
                         */
                        function sanitise_input($data)
                        {
                            $data = trim($data);
                            $data = stripslashes($data);
                            $data = htmlspecialchars($data);
                            return $data;
                        }
                        //set variables
                        $eoi_number  = sanitise_input($_POST["eoinumber"]);
                        $jobid       = sanitise_input($_POST["jobid"]);
                        $given_name  = sanitise_input($_POST["givenname"]);
                        $family_name = sanitise_input($_POST["familyname"]);
                        $order       = sanitise_input($_POST["order"]);
                        // import settings
                        require_once('settings.php');
                        $conn = @mysqli_connect(
                            $host,
                            $user,
                            $pwd,
                            $sql_db
                        );

                        // Checks if connection is successful
                        if (!$conn) {
                            // Displays an error message
                            echo "<p>Database connection failure</p>";
                        } else {
                            // Upon successful connection

                            $sql_table = "eoi";
                            // define search conditions
                            $conditions = "";
                            if ($eoi_number != "") {
                                if ($conditions != "") {
                                    $conditions .= "AND ";
                                }
                                $conditions .= "eoinumber LIKE '$eoi_number'";
                            }
                            if ($jobid != "") {
                                if ($conditions != "") {
                                    $conditions .= "AND ";
                                }
                                $conditions .= "jobid LIKE '$jobid'";
                            }
                            if ($given_name != "") {
                                if ($conditions != "") {
                                    $conditions .= "AND ";
                                }
                                $conditions .= "givenname LIKE '$given_name%'";
                            }
                            if ($family_name != "") {
                                if ($conditions != "") {
                                    $conditions .= "AND ";
                                }
                                $conditions .= "familyname LIKE '$family_name%'";
                            }
                            if ($conditions != "") {
                                $conditions = " WHERE " . $conditions;
                            }
                            // oder the table by a specific field
                            if ($order != "") {
                                $order = " ORDER BY " . $order;
                            }
                            // Set up the SQL command to add the data into the table
                            $query = "SELECT * FROM $sql_table" . $conditions . $order;
                            // execute the query and store result into the result pointer
                            $result = @mysqli_query($conn, $query);

                            // checks if the execuion was successful
                            if (!$result) {
                                echo "<p>Database cannot be accessed.</p>";
                            } else {
                                if (@mysqli_num_rows($result) > 0) {
                                    // Display the retrieved records
                                    echo "<div class=\"search-table-outer\">";
                                    echo "<table >";
                                    echo "<tr>\n"
                                        . "<th scope=\"col\">EOI Number</th>\n"
                                        . "<th scope=\"col\">job ID</th>\n"
                                        . "<th scope=\"col\">Given Name</th>\n"
                                        . "<th scope=\"col\">Family Name</th>\n"
                                        . "<th scope=\"col\">DoB (Y-M-D)</th>\n"
                                        . "<th scope=\"col\">Gender</th>\n"
                                        . "<th scope=\"col\">Address</th>\n"
                                        . "<th scope=\"col\">Suburb</th>\n"
                                        . "<th scope=\"col\">State/Territory</th>\n"
                                        . "<th scope=\"col\">Post Code</th>\n"
                                        . "<th scope=\"col\">Email</th>\n"
                                        . "<th scope=\"col\">Phone Number</th>\n"
                                        . "<th scope=\"col\">Skills</th>\n"
                                        . "<th scope=\"col\">Other Skills</th>\n"
                                        . "<th scope=\"col\">Date Applied</th>\n"
                                        . "<th scope=\"col\">App Status</th>\n"
                                        . "</tr>\n";
                                    // retrieve current record pointed by the result pointer

                                    while ($row = @mysqli_fetch_assoc($result)) {
                                        echo "<tr>";
                                        echo "<td>", $row["eoinumber"], "</td>";
                                        echo "<td>", $row["jobid"], "</td>";
                                        echo "<td>", $row["givenname"], "</td>";
                                        echo "<td>", $row["familyname"], "</td>";
                                        echo "<td>", $row["dob"], "</td>";
                                        echo "<td>", $row["gender"], "</td>";
                                        echo "<td>", $row["streetaddress"], "</td>";
                                        echo "<td>", $row["suburb"], "</td>";
                                        echo "<td>", $row["stateterritory"], "</td>";
                                        echo "<td>", $row["postcode"], "</td>";
                                        echo "<td>", $row["email"], "</td>";
                                        echo "<td>", $row["phone"], "</td>";
                                        echo "<td>", $row["skills"], "</td>";
                                        echo "<td>", $row["otherskills"], "</td>";
                                        echo "<td>", $row["app_date"];
                                        echo "<td>", $row["appstatus"], "</td>";
                                        echo "</tr>";
                                    }
                                    echo "</table>";
                                    echo "</div>";
                                    // Frees up the memory, after using the result pointer
                                    @mysqli_free_result($result);
                                } // if successful query operation
                            } // end if no rows
                            // close the database connection
                            @mysqli_close($conn);
                        } // if successful database connection
                    } // if data posted
                }
                ?>
                <hr />
                <h2>Update EOI Status</h2>
                <!-- Update the status of an EOI, can only choose New, Current or Final -->
                <form class="container" id="apply_form" method="post" action="manage.php">
                    <fieldset>
                        <legend>Update the status of an EOI</legend>
                        <p>
                            <label for="eoinumber2">EOI Number:</label>

                            <input type="text" name="eoinumber" id="eoinumber2" pattern="^[0-9]+$" required="required" />
                        </p>
                        <p>
                            <label for="appstatus">Application Status</label>
                            <select name="appstatus" id="appstatus">
                                <option hidden="hidden" value="">Select Status...</option>
                                <option value="New">New</option>
                                <option value="Current">Current</option>
                                <option value="Final">Final</option>
                            </select>
                        </p>
                    </fieldset>
                    <input class="button" type="submit" value="Update" name="Update" />
                </form>
                <hr />
                <?php
                // Checks if this form was submitted
                if (!empty($_POST["Update"])) {
                    // import settings and connect to database
                    require_once('settings.php');
                    $conn = @mysqli_connect(
                        $host,
                        $user,
                        $pwd,
                        $sql_db
                    );

                    // Checks if connection is successful
                    if (!$conn) {
                        // Displays an error message
                        echo "<p>Database connection failure</p>"; // Might not show in a production script 
                    } else {
                        // Upon successful connection

                        $sql_table = "eoi";
                        // define variables
                        $appstatus = trim(stripslashes(htmlspecialchars($_POST["appstatus"])));
                        if ((strpos($appstatus, 'New') !== false) && (strpos($appstatus, 'Current') !== false) && (strpos($appstatus, 'Final') !== false)) {
                            $appstatus = "New";
                        }
                        $eoinumber = trim(stripslashes(htmlspecialchars($_POST["eoinumber"])));

                        // Set up the SQL command to add the data into the table
                        $query = "UPDATE $sql_table SET appstatus='$appstatus' WHERE eoinumber='$eoinumber'";

                        // execute the query and store result into the result pointer
                        $result = @mysqli_query($conn, $query);

                        // checks if the execuion was successful
                        if (!$result) {
                            echo "<p>Something is wrong with ", $query, "</p>";
                        } else {
                            echo "<p>Successfully updated " . @mysqli_affected_rows($conn) . " EOI</p>";
                        } // if successful query operation
                        // close the database connection
                        @mysqli_close($conn);
                    } // if successful database connection
                }
                ?>
                <hr />
                <h2>Delete Job</h2>
                <!-- Delete a complete job from the database -->
                <form action="manage.php" method="POST">
                    <fieldset>
                        <legend>Delete all EOI's for a specific Job ID:</legend>
                        <p>
                            <label for="jobid2">Enter Job ID</label>
                            <input type="text" name="jobid" id="jobid2" />
                        </p>
                    </fieldset>
                    <input class="button" type="submit" value="Delete" name="Delete" />
                </form>
                <hr />
                <?php
                // check if this form was submitted
                if (!empty($_POST["Delete"])) {
                    // import settings and connet to database
                    require_once('settings.php');
                    $conn = @mysqli_connect(
                        $host,
                        $user,
                        $pwd,
                        $sql_db
                    );
                    // Checks if connection is successful
                    if (!$conn) {
                        // Displays an error message
                        echo "<p>Database connection failure</p>"; // Might not show in a production script 
                    } else {
                        // Upon successful connection
                        $sql_table = "vipmembers";
                        $jobid = trim(stripslashes(htmlspecialchars($_POST["jobid"])));

                        // Set up the SQL command to add the data into the table
                        $query = "DELETE FROM eoi WHERE jobid='$jobid'";

                        // execute the query and store result into the result pointer
                        $result = @mysqli_query($conn, $query);

                        // checks if the execuion was successful
                        if (!$result) {
                            echo "<p>Something is wrong with ",    $query, "</p>";
                        } else {
                            echo "<p>Successfully deleted " . @mysqli_affected_rows($conn) . " EOI(s)</p>";
                            // close the database connection
                            @mysqli_close($conn);
                        }
                    } // if successful database connection
                } // if null string
                ?>
                <hr />
            </main>
            <?php include 'footer.inc'; ?>
        </div>
    </div>
</body>

</html>
