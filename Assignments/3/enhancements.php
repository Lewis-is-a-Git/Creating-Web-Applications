<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">


<head>
    <?php include 'header.inc';?>
    <script src="scripts/enhancements.js"></script>
    <title>Enhancements</title>
    <!-- Description: HTML Enhancements -->
    <!-- Author: lewis 101533222 -->
    <!-- Date: 19/05/19 -->
    <!-- Validated: OK <19/05/19> -->
</head>

<body>
    <div id="page-container">
        <div id="content-wrap">
            <?php include 'menu.inc'?>

            <main class="container-fluid">
                <button id="back_to_top">Back To Top</button>
                <article class="col-sm-8">
                    <h1>CSS and HTML Enhancements</h1>
                    <br />
                    <h2 id="enhancement_1">Bootstrap Layout and Glyphicon</h2>
                    <p>
                        Bootstrap layout is used in this website. It is a quick and easy way to
                        position content on the page. The layout is based on containers with rows and
                        columns. There are 12 columns in a row, this makes the page easy to divide.
                        <br />
                        To make this work each page is required to link a stylesheet from bootstrap
                        in the header. Each element that you would like to apply this layout to must
                        have one or more bootstrap classes. The glyphicons are also applied the same
                        way, using a span with classes.
                        <br />
                        <cite>
                            Reference: https://getbootstrap.com/ Accessed: 28 Mar 2019.
                        </cite>
                        <br />
                        This enhancement is used on all pages of this website, A good example is the
                        jumbotron, which can be found <a href="index.php">here</a>.

                    </p>
                    <h2 id="enhancement_2">Email Form</h2>
                    <p>
                        Using a form to compose an email before the user is required to send it.
                        <br />
                        This is an enhancement over a simple email me button. The submit button of
                        the form will action a mailto link. To make this work, the mailto button is
                        replaced with a submit button in a form with action=mailto. The link opens the
                        users default handler for mailto links, the email subject and body are already
                        filled in.
                    </p>
                    <h2 id="enhancement_3">Navigation Bar</h2>
                    <br />
                    <p>
                        The navigation bar shows the current page the user is viewing.
                        <br />
                        This works by using an active class attribute applied to the current page link.
                        The navigation bar html is unique for each page. To make this work it need a class
                        applied to the anchor tag on the nav bar. CSS is also used to style the button.
                    </p>
                    <form action="enhancements2.php">
                        <button>View JavaScript Enhancements</button>
                    </form>
                </article>


                <aside class="col-sm-4">
                    <h2>List of enhancements</h2>
                    <hr />
                    <ul>
                        <li><a href="#enhancement_1">Bootstrap Layout and Glyphicon</a></li>
                        <li><a href="#enhancement_2">Email Form</a></li>
                        <li><a href="#enhancement_3">Navigation Bar</a></li>
                    </ul>
                </aside>
            </main>
            <?php include 'footer.inc'; ?>
        </div>
    </div>
</body>


</html>
