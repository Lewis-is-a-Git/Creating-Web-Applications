<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">


<head>
    <?php include 'header.inc';?>
    <script src="scripts/enhancements.js"></script>
    <title>Home Page</title>
    <!-- Description: Home Page -->
    <!-- Author: lewis 101533222 -->
    <!-- Date: 19/05/19 -->
    <!-- Validated: OK <19/05/19> -->
</head>

<body>
    <div id="page-container">
        <div id="content-wrap">
            <?php include 'menu.inc';?>
            <main>
                <!-- Back to top button-->
                <button id="back_to_top">Back To Top</button>

                <section class="jumbotron text-center">
                    <h2 id="page-top">YOUR IT EXPERT</h2>
                    <p>With over 20 years experience we'll ensure you get the best tech advice </p>
                    <form action="about.php">
                        <button>LEARN MORE</button>
                    </form>

                </section>

                <!-- Container (Mission)-->
                <section class="container-fluid text-center ">
                    <!-- Spacer -->
                    <div class="col-sm-1"></div>

                    <div class="col-sm-10">
                        <h2>MISSION:</h2>
                        <p>
                            We here at iT Jobs have come to know that it is better to harness macro-transparently than
                            to
                            engineer holistically. We will deploy the commonly-used term "customer-directed". What do we
                            e-enable? Anything and everything, regardless of obscureness! If all of this comes off as
                            disorienting to you, that's because it is! If you visualize holistically, you may have to
                            incubate strategically. Your budget for reintermediating should be at least one-third of
                            your budget for harnessing. What does it really mean to generate "interactively"? If all of
                            this may seem stupefying to you, that's because it is!
                            <br />
                            Our functionality is unparalleled in the industry, but our C2C2C accounting and non-complex
                            configuration is constantly considered an amazing achievement. Quick: do you have a
                            impactful scheme for coping with unplanned-for biometrics?
                        </p>
                        <cite>Reference: http://www.andrewdavidson.com/gibberish/?companyname=iT+Jobs Accessed: 26 March
                            2019</cite>
                    </div>
                </section>
                <!-- Container (Best Comapny)-->
                <section class="container-fluid text-center bg-grey">
                    <!-- Spacer -->
                    <div class="col-sm-1"></div>
                    <div class="col-sm-10">
                        <h2>index IT is the best IT company in Australia</h2>
                        <p>
                            Have you ever needed to innovate your fractal feature set? Without having to pay outside
                            consultants? The metrics for infrastructures are more well-understood if they are not
                            proactive. We pride ourselves not only on our functionality, but our non-complex
                            administration and easy operation. What does the term "reconfigurable" really mean? If you
                            syndicate globally, you may have to orchestrate efficiently. Is it more important for
                            something to be innovative, virally-distributed or to be reconfigurable? Imagine a
                            combination of Unix and Python. We apply the proverb "Look before you leap" not only to our
                            aggregation but our aptitude to leverage. The ability to synthesize seamlessly leads to the
                            power to harness robustly. We understand that it is better to redefine proactively than to
                            enable super-globally. We apply the proverb "When the cat's away, the mice will play" not
                            only to our applications but our capacity to seize. Without raw bandwidth, you will lack
                            CAE. What does it really mean to generate "interactively"?
                        </p>
                        <cite>Reference: http://www.andrewdavidson.com/gibberish/?companyname=iT+Jobs Accessed: 26 March
                            2019</cite>
                    </div>
                </section>
                <!-- Container (Our Services)-->
                <section id="services" class="container-fluid text-center">
                    <h2>SERVICES</h2>
                    <h4>WHAT WE CAN DO FOR YOU</h4>
                    <br />
                    <div class="col-sm-3">
                        <span class="glyphicon glyphicon-globe"></span>
                        <h4>Managed IT Services</h4>
                        <p> We provide reliable services to help you manage your technology</p>
                    </div>

                    <div class="col-sm-3">
                        <span class="glyphicon glyphicon-download-alt"></span>
                        <h4>Server + Network</h4>
                        <p>Let us become the backbone of your business's servers and networks</p>
                    </div>

                    <div class="col-sm-3">
                        <span class="glyphicon glyphicon-eye-open"></span>
                        <h4>Graphic Design</h4>
                        <p>We are specialize in website design making, where first impression matters to our client.</p>
                    </div>

                    <div class="col-sm-3">
                        <span class="glyphicon glyphicon-briefcase"></span>
                        <h4>Consulting Services</h4>
                        <p>Our services are varied as customer needs. Consult us to get a package.
                        </p>
                    </div>
                </section>

                <!-- Container (Contact Section)-->
                <section id="home-contact" class="container-fluid bg-grey">
                    <h3 class="text-center">Need Help?</h3>
                    <div class="col-sm-12 text-center">
                        <p>Contact us and we will get back to you within 24 hours
                            <br />
                            Operating hours
                            <br />
                            Monday - Friday : 0700 - 1500
                            <br />
                            Saturday - Sunday: 0700 - 1200</p>
                        <p><span class="glyphicon glyphicon-map-marker"></span> Victoria, Aus </p>

                        <p><span class="glyphicon glyphicon-envelope"></span> 101533222@student.swin.edu.au </p>
                        <form action="mailto:101533222@student.swin.edu.au" method="post" target="_blank">
                            <button>
                                <span class="glyphicon glyphicon-envelope"> </span> CONTACT
                            </button>
                        </form>
                    </div>
                </section>

                <?php include 'footer.inc';?>

                <!-- The Modal -->
                <div id="myModal" class="modal">
                    <!-- Modal content -->
                    <div class="modal-content">
                        <div class="modal-header">
                            <span class="close">&#735;</span>
                            <h2>Can we be of assistance?</h2>
                        </div>
                        <div class="modal-body">
                            <p>Contact us and we will get back to you within 24 hours
                                <br />
                                Operating hours
                                <br />
                                Monday - Friday : 0700 - 1500
                                <br />
                                Saturday - Sunday: 0700 - 1200</p>
                            <p><span class="glyphicon glyphicon-map-marker"></span> Victoria, Aus </p>

                            <p><span class="glyphicon glyphicon-envelope"></span><a href="mailto:101533222@student.swin.edu.au"> 101533222@student.swin.edu.au</a></p>
                        </div>
                        <div class="modal-footer">
                        </div>
                    </div>
                </div>
            </main>
        </div>
    </div>


</body>

</html>
