<!DOCTYPE html>
<html lang="en">

<head>
    <?php include 'header.inc'; ?>
    <title>Processing Application</title>
    <!-- Description: Process the application and save to database -->
    <!-- Author: lewis 101533222 -->
    <!-- Date: 19/05/19 -->
    <!-- Validated: OK <19/05/19> -->
</head>

<body>
    <div id="page-container">
        <div id="content-wrap">
            <?php include 'menu.inc'; ?>
            <main class="container-fluid">
                <article>
                    <?php
                    // if a user just entered this url, redirect them to the form
                    if (!isset($_POST["jobid"])) {
                        header("location:apply.php");
                    }

                    // import connection info
                    require_once('settings.php');

                    // Create a connection to the database @ removes warnings
                    $connection = @mysqli_connect(
                        $host,
                        $user,
                        $pwd,
                        $sql_db
                    );

                    if (!$connection) {
                        // Connection Unsuccessful
                    } else {
                        // Successful Completion

                        // Sanitise Data
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
                        // Get form data and validate
                        $errMsg = "";
                        // Copy from Javascript
                        $jobid          = sanitise_input($_POST["jobid"]);
                        if (!preg_match("/^[A-Z]{5}$/", $jobid)) {
                            $errMsg .= "<p>job ID is not Valid.</p>\n";
                        }
                        $given_name     = sanitise_input($_POST["given_name"]);
                        if (!preg_match("/^[a-zA-Z ,.'-]{1,20}$/", $given_name)) {
                            $errMsg .= "<p>Given name is not valid.</p>\n";
                        }
                        $family_name    = sanitise_input($_POST["family_name"]);
                        if (!preg_match("/^[a-zA-Z ,.'-]{1,20}$/", $family_name)) {
                            $errMsg .= "<p>Family name is not valid.</p>\n";
                        }
                        $dob            = sanitise_input($_POST["dob"]);
                        // calculate age
                        $age = date_diff(date_create($dob), date_create('now'))->y;
                        if (!is_numeric($age)) {
                            $errMsg .= "<p>Age must be a number.</p>\n";
                        }
                        if ($age < 15 || $age > 80) {
                            $errMsg .= "<p>You must be between 15 and 80 years old.</p>\n";
                        }
                        $gender = sanitise_input($_POST["gender"]);
                        if (!preg_match("/^[a-zA-Z]{1,6}$/", $gender)) {
                            $errMsg .= "<p>Gender is not valid.</p>\n";
                        }
                        $street_address = sanitise_input($_POST["street_address"]);
                        if (!preg_match("/^[a-zA-Z0-9 ,.'-]{1,40}$/", $street_address)) {
                            $errMsg .= "<p>Street Address is not valid.</p>\n";
                        }
                        $suburb         = sanitise_input($_POST["suburb"]);
                        if (!preg_match("/^[a-zA-Z ,.'-]{1,40}$/", $suburb)) {
                            $errMsg .= "<p>Suburb is not valid.</p>\n";
                        }
                        $state          = strtoupper(sanitise_input($_POST["state"]));
                        if (!preg_match("/^[A-Z]{2,3}$/", $state)) {
                            $errMsg .= "<p>State is not valid.</p>\n";
                        }
                        $post_code      = sanitise_input($_POST["post_code"]);
                        if (!preg_match("/^[0-9]{4}$/", $post_code)) {
                            $errMsg .= "<p>Post code is not valid.</p>\n";
                        }
                        // check postcode and state match
                        $stateErr = "";
                        switch ($state) {
                            case "VIC":
                                if (!(($post_code >= 3000 && $post_code <= 3999) || ($post_code >= 8000 && $post_code <= 8999))) {
                                    $stateErr .= "Post Code not in Victoria.";
                                }
                                break;
                            case "NSW":
                                if (!(($post_code >= 1000 && $post_code <= 2599) || ($post_code >= 2619 && $post_code <= 2899) || ($post_code >= 2921 && $post_code <= 2999))) {
                                    $stateErr .= "Post Code not in New South Wales.";
                                }
                                break;
                            case "QLD":
                                if (!(($post_code >= 4000 && $post_code <= 4999) || ($post_code >= 9000 && $post_code <= 9999))) {
                                    $stateErr .= "Post Code not in Queensland.";
                                }
                                break;
                            case "NT":
                                if (!($post_code >= 800 && $post_code <= 999)) {
                                    $stateErr .= "Post Code not in Northern Territory.";
                                }
                                break;
                            case "WA":
                                if (!($post_code >= 6000 && $post_code <= 6999)) {
                                    $stateErr .= "Post Code not in Western Australia.";
                                }
                                break;
                            case "SA":
                                if (!($post_code >= 5000 && $post_code <= 5999)) {
                                    $stateErr .= "Post Code not in Southern Australia.";
                                }
                                break;
                            case "TAS":
                                if (!($post_code >= 7000 && $post_code <= 7999)) {
                                    $stateErr .= "Post Code not in Tasmania.";
                                }
                                break;
                            case "ACT":
                                if (!(($post_code >= 200 && $post_code <= 299) || ($post_code >= 2600 && $post_code <= 2618) || ($post_code >= 2900 && $post_code <= 2920))) {
                                    $stateErr .= "Post Code not in Australian Capital Territory.";
                                }
                                break;
                            default:
                                $stateErr = "Post Code not Valid.";
                        }

                        $errMsg .= $stateErr;

                        $email          = sanitise_input($_POST["email"]);
                        if (!preg_match("/^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z\.]{2,}$/", $email)) {
                            $errMsg .= "<p>Given name is not valid.</p>\n";
                        }
                        $phone          = sanitise_input($_POST["phone"]);
                        if (!preg_match("/^[0-9 ]{8,12}$/", $phone)) {
                            $errMsg .= "<p>Phone number is not valid.</p>\n";
                        }

                        // Store skills checkboxes to skills string
                        $skill_string = "";
                        foreach ($_POST['skills'] as $skill) {

                            if ($skill == "coms") {
                                $skill_string = "coms";
                            }
                            if ($skill == "problem") {
                                if ($skill_string != "") {
                                    $skill_string .= ", ";
                                }
                                $skill_string .= "problem";
                            }
                            if ($skill == "teamwork") {
                                if ($skill_string != "") {
                                    $skill_string .= ", ";
                                }
                                $skill_string .= "teamwork";
                            }
                            if ($skill == "other") {
                                if ($skill_string != "") {
                                    $skill_string .= ", ";
                                }
                                $skill_string .= "other";
                            }
                        }
                        $skills = $skill_string;

                        $other_text = sanitise_input($_POST["other_text"]);
                        // check if the other text box has ben ticke that there is content in the other text area
                        if (strpos($skills, "other") !== false) {
                            if ($other_text == "") {
                                $errMsg .= "<p>If \"other skills\" is selected, the text area cannot be blank.</p>\n";
                            }
                        }

                        if ($errMsg != "") {
                            die($errMsg . "\n<p><a href=\"apply.php\">Return to Application</a></p>");
                        }

                        // Table name
                        $table = "eoi";

                        // Check if table does not exist, create table
                        $create_table = "CREATE TABLE IF NOT EXISTS $table (
                                        eoinumber INT AUTO_INCREMENT PRIMARY KEY,
                                        jobid CHAR(5) NOT NULL,
                                        givenname VARCHAR(20) NOT NULL,
                                        familyname VARCHAR(20) NOT NULL,
                                        dob DATE NOT NULL,
                                        gender VARCHAR(6),
                                        streetaddress VARCHAR(40) NOT NULL,
                                        suburb VARCHAR(40) NOT NULL,
                                        stateterritory VARCHAR(40) NOT NULL, 
                                        postcode INT NOT NULL,
                                        email VARCHAR(40) NOT NULL,
                                        phone VARCHAR(20) NOT NULL,
                                        skills VARCHAR(200),
                                        otherskills VARCHAR(200),
                                        app_date DATE,
                                        appstatus VARCHAR(7) NOT NULL,
                                        CONSTRAINT CHK_appstatus CHECK (appstatus IN ('New', 'Current', 'Final')),
                                        CONSTRAINT CHK_state CHECK (stateterritory IN ('VIC', 'NSW', 'QLD', 'NT', 'WA', 'SA', 'TAS', 'ACT'))
                                        )";
                        $open_table = @mysqli_query($connection, $create_table);
                        if (!$open_table) {
                            // Query failed
                        } else {
                            // Table Esists
                            // Enter EOI Data
                            $enter_new_eoi = "INSERT INTO $table"
                                . "(jobid, 
                            givenname, 
                            familyname, 
                            dob, 
                            gender, 
                            streetaddress, 
                            suburb, 
                            stateterritory, 
                            postcode, 
                            email, 
                            phone, 
                            skills, 
                            otherskills, 
                            app_date,
                            appstatus)"
                                . "VALUES"
                                . "('$jobid', 
                            '$given_name', 
                            '$family_name', 
                            '$dob', 
                            '$gender', 
                            '$street_address', 
                            '$suburb', 
                            '$state', 
                            '$post_code', 
                            '$email', 
                            '$phone', 
                            '$skills', 
                            '$other_text', 
                            CURDATE(),
                            'New')";
                            $add_new_eoi = @mysqli_query($connection, $enter_new_eoi);
                            if (!$add_new_eoi) {
                                echo "<h1>Failed to save application, Start Over</h1>";
                            } else {
                                echo "<h1>Thankyou for you application</h1>";
                                echo "<p>Your application ID is: <strong> " . mysqli_insert_id($connection) . "</strong></p>";
                                echo "<p>Express your interest for other positions <a href=\"jobs.php\">here.</a></p>";
                            }
                        }
                        @mysqli_close($connection);
                    }
                    // Redirect to another Page?
                    // header("location:.php");
                    ?>
                </article>
            </main>
            <?php include 'footer.inc'; ?>
        </div>
    </div>
</body>

</html>
