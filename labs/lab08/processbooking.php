<!DOCTYPE html>
<head>
    <meta charset="utf-8">
    <title>Booking Confirmation</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<body>
    <h1>Rohirrim Tour Booking Confirmation</h1>
    <!-- Begin processing -->
    <?php
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

    //check if process was triggered by a post submit
    if (isset($_POST["firstname"])) {
        $firstname = $_POST["firstname"];
        $firstname = sanitise_input($firstname);
    } else {
        echo "<p>Error: Enter data in the <a href=\"register.html\">form</a></p>";
        // Redirect to form if process not triggered by a form submit
        header("location: register.html");
    }

    if (isset($_POST["lastname"])) {
        $lastname = $_POST["lastname"];
        $lastname = sanitise_input($lastname);
    }
    if (isset($_POST["age"])) {
        $age = $_POST["age"];
        $age = sanitise_input($age);
    }
    if (isset($_POST["partySize"])) {
        $partySize = $_POST["partySize"];
        $partySize = sanitise_input($partySize);
    }

    if (isset($_POST["species"])) {
        $species = $_POST["species"];
    } else {
        $species = "Unkown Species";
    }
    $species = sanitise_input($species);

    $tour = "";
    if (isset($_POST["1day"])) {
        $tour = $_POST["1day"] . " tour.";
    }
    if (isset($_POST["4day"])) {
        $tour = $_POST["4day"];
        if (isset($_POST["1day"])) {
            $tour = $_POST["1day"] . " and " . $_POST["4day"] . " tours.";
        }
    }
    if (isset($_POST["10day"])) {
        $tour = $_POST["10day"];
        if (isset($_POST["1day"])) {
            $tour = $_POST["1day"] . " and " . $_POST["10day"] . " tours.";
        }
        if (isset($_POST["4day"])) {
            $tour = $_POST["4day"] . " and " . $_POST["10day"] . " tours.";
        }
        if (isset($_POST["1day"]) && isset($_POST["4day"])) {
            $tour =
                $_POST["1day"] .
                ", " .
                $_POST["4day"] .
                " and " .
                $_POST["10day"] .
                " tours.";
        }
    }
    if (isset($_POST["food"])) {
        $food = $_POST["food"];
        $food = sanitise_input($food);
    }

    // Validation
    $errMsg = "";
    if ($firstname == "") {
        $errMsg .= "<p>You must enter your first name.</p>";
    } elseif (!preg_match("/^[a-zA-Z]*$/", $firstname)) {
        $errMsg .= "<p>Only alpha letters allowed in your first name.</p>";
    }
    if ($lastname == "") {
        $errMsg .= "<p>You must enter your last name.</p>";
    } elseif (!preg_match("/^[a-zA-Z\-]*$/", $lastname)) {
        $errMsg .= "<p>Only alpha letters and hyphens allowed in your last name.</p>";
    }
    if (!is_numeric($age)) {
        $errMsg .= "<p>Age must be a number</p>";
    } elseif ($age < 10 || $age > 10000) {
        $errMsg .= "<p>Age must be between 10 and 10000</p>";
    }

    // Display Output
    if ($errMsg != "") {
        echo "$errMsg";
    } else {
        echo "<p>Welcome $firstname $lastname!</p>";
        echo "<p>You are now booked on the $tour</p>";
        echo "<p>Species: $species</p>";
        echo "<p>Age: $age</p>";
        echo "<p>Meal Preference: $food</p>";
        echo "<p>Number of travellers $partySize</p>";
    }
    ?>
</body>
</html>
