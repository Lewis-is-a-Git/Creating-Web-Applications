<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">


<head>
    <?php include 'header.inc' ?>
    <title>Enhancements</title>
    <!-- Description: PHP Enhancements -->
    <!-- Author: lewis 101533222 -->
    <!-- Date: 19/05/19 -->
    <!-- Validated: OK <19/05/19> -->
</head>

<body>
    <div id="page-container">
        <div id="content-wrap">
            <?php include 'menu.inc'; ?>

            <main class="container-fluid">
                <button id="back_to_top">Back To Top</button>
                <article class="col-sm-8">
                    <h1>PHP Enhancements</h1>
                    <br />
                    <h2 id="enhancement_1">Choose which column to sort the table by</h2>
                    <p>
                        Provide the manager with the ability to select the field on which to sort 
                        the order in which the EOIrecords are displayed.
                        This enhacement is accomplished by using a select form element with all
                        the values of the table. This choice will be included in the sql command
                        with the words "ORDER BY " appended.
                        <br />
                        The Enhancement can be found <a href="manage.php">here</a>.
                    </p>
                    <h2 id="enhancement_2">Login Page</h2>
                    <p>
                        To manage the applications the HR manager must log into the manage page.
                        A link has been provided in the nav bar to log in. The username and password
                        are stored in a seporate table in the database. The username and passwords
                        must match to allow the user to login.
                        <br />
                        The website keep track of the users login via the session storage. The user is
                        logged out if they close the session. There is also an additional link to logout.
                        The manage page cannot be accessed directly from a url. When the user logs out 
                        the session is destroyed.
                        <br />
                        The Enhancement can be found <a href="login.php">here</a>.
                        <br />
                        Inspiration for this enhancement was sourced from <a href="https://www.tutorialspoint.com/php/php_mysql_login.htm">here</a>.
                    </p>
                </article>

                <aside class="col-sm-4">
                    <h2>List of enhancements</h2>
                    <hr />
                    <ul>
                        <li><a href="#enhancement_1">Choose which column to sort the table by</a></li>
                        <li><a href="#enhancement_2">Login Page</a></li>
                    </ul>
                </aside>
            </main>
            <?php include 'footer.inc'; ?>
        </div>
    </div>
</body>


</html>
