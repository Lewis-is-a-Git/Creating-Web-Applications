<header id="header">
    <nav class="navbar-fixed-top">
        <a href="index.php">
            <img class="navbar-logo" src="styles/images/Logo.png" title="Home Page" alt="iT Jobs Logo" />
        </a>

        <div id="menu-icon">
            <i class="fas fa-bars"></i>
        </div>

        <ul class="nav navbar-nav navbar-right">
            <?php
                $active_page = basename($_SERVER['PHP_SELF'], ".php");
                function check_title ($page_title) {
                    global $active_page;
                    if ($page_title == $active_page) {
                        return "class=\"active\"";
                    }
                }
            ?>
            <li><a <?php check_title("Home Page") ?> href="index.php">Home</a></li>
            <li><a href="about.php">About</a></li>
            <li><a href="jobs.php">Vacancies</a></li>
            <li><a href="apply.php">Apply Here</a></li>
            <li><a href="enhancements.php">Enhancements</a></li>
            <li><a href="mailto:101533222@student.swin.edu.au" target="blank"> Contact Us</a></li>
            <li><a href="login.php">Log in</a></li>
        </ul>
    </nav>
    <div id="slideout-menu">
        <ul>
            <li><a href="index.php">Home</a></li>
            <li><a href="about.php">About</a></li>
            <li><a href="jobs.php">Vacancies</a></li>
            <li><a href="apply.php">Apply Here</a></li>
            <li><a href="enhancements.php">Enhancements</a></li>
            <li><a href="mailto:101533222@student.swin.edu.au" target="blank"> Contact Us</a></li>
            <li><a href="login.php">Log in</a></li>
        </ul>
    </div>
</header>
