<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">


<head>
    <?php include 'header.inc' ?>
    <title>Enhancements</title>
    <!-- Description: Javascript Enhancements -->
    <!-- Author: lewis 101533222 -->
    <!-- Date: 19/05/19 -->
    <!-- Validated: OK <19/05/19> -->
</head>

<body>
    <div id="page-container">
        <div id="content-wrap">
            <?php include 'menu.inc';?>

            <main class="container-fluid">
                <button id="back_to_top">Back To Top</button>
                <article class="col-sm-8">
                    <h1>Javascript Enhancements</h1>
                    <br />
                    <h2 id="enhancement_1">Back to top button, with smooth scrolling</h2>
                    <p>
                        A "back to top" button appears on the home page. When the user has scrolled down 200 pixels.
                        This was implemented in two
                        functions,
                        one function to make the button appear, and the second funciton to return the user to the top of
                        the page on click. As the user scrolls on the page, the funtion "scrollFunction" is called, this
                        will check the number of pixels that have been scrolled up the page. If the number is greater
                        than 200 the element is displayed, else it remains hidden.

                        The smooth scrolling effect was implemented in css. On the html selector,
                        scroll behavior is set to smooth.
                        <br />
                        The Enhancement can be found on the <a href="index.php">Home Page</a>.
                    </p>
                    <h2 id="enhancement_2">Delayed Prompt</h2>
                    <p>
                        The user will be promped for assitance if they spend a short time on the home page.
                        For this demonstration it has been set to 10 seconds. This is accomplished using
                        a timer (timeCount) with a set intverval function to count down the time.
                        Once the time reaches 0 a modal will appear. There are two function, hide modal and
                        show modal, these functions change the display style of the modal.
                        The rest of the functionality is within the init function, this is to get the objects
                        and assign eventss to onclick methods. The inspiration for this enhancement can be found here:
                        https://www.w3schools.com/howto/howto_js_countdown.asp.
                        <br />
                        The Enhancement can be found on the <a href="index.php">Home Page</a>.
                    </p>
                    <form action="phpenhancements.php">
                        <button>View PHP Enhancements</button>
                    </form>
                </article>

                <aside class="col-sm-4">
                    <h2>List of enhancements</h2>
                    <hr />
                    <ul>
                        <li><a href="#enhancement_1">Back to top button</a></li>
                        <li><a href="#enhancement_2">Delayed Prompt</a></li>
                    </ul>
                </aside>
            </main>
            <?php include 'footer.inc';?>
        </div>
    </div>
</body>


</html>
