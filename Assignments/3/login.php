<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">

<head>
    <?php include 'header.inc' ?>
    <title>Login</title>
    <!-- Description: Login Page -->
    <!-- Author: lewis 101533222 -->
    <!-- Date: 20/05/19 -->
    <!-- Validated: OK  <20/05/19> -->
</head>

<body>
    <div id="page-container">
        <div id="content-wrap">
            <?php include 'menu.inc'; ?>
            <main class="container-fluid">
                <?php
                include 'settings.php';
                // start a new session
                session_start();
                // check if username and password have been submitted
                if ($_SERVER["REQUEST_METHOD"] == "POST") {
                    // store variables, sanitised
                    $myusername = trim(stripslashes(htmlspecialchars($_POST['username'])));
                    $mypassword = trim(stripslashes(htmlspecialchars($_POST['password'])));

                    $sql_check_details = "SELECT id FROM managers WHERE username = '$myusername' and passcode = '$mypassword'";
                    $result = @mysqli_query($db, $sql_check_details);

                    // If result matched $myusername and $mypassword, table row must be 1 row
                    if (@mysqli_num_rows($result)) {
                        // remember the user has been logged in on the session
                        $_SESSION['login_user'] = $myusername;
                        header("location:manage.php");
                    } else {
                        $error = "Your Login Name or Password is invalid";
                    }
                }
                ?>
                <h1>Please log in to manage applications.</h1>
                <hr />
                <form action="login.php" method="post">
                    <label>User Name :</label><input type="text" name="username" class="box" /><br /><br />
                    <label>Password :</label><input type="password" name="password" class="box" /><br /><br />
                    <input class="button" type="submit" value=" Submit " /><br />
                </form>

            </main>
            <?php include 'footer.inc'; ?>
        </div>
    </div>
</body>

</html>
