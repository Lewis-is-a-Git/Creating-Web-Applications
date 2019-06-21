<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">


<head>
    <?php include 'header.inc'; ?>
    <title>About Us</title>
    <!-- Description: About the company and me -->
    <!-- Author: lewis 101533222 -->
    <!-- Date: 19/05/19 -->
    <!-- Validated: OK <19/05/19> -->
</head>

<body>
    <div id="page-container">
        <div id="content-wrap">
            <?php include 'menu.inc'; ?>
            <main>
                <h2 class="col-sm-12 container text-center">LEWIS BROCKMAN-HORSLEY</h2>
                <section class="container">
                    <button id="back_to_top">Back To Top</button>
                    <!-- Spacer -->
                    <div class="col-sm-1"></div>

                    <dl id="myprofile" class="col-sm-7">
                        <dt>Name</dt>
                        <dd>Lewis Brockman-Horsley</dd>
                        <dt>Student No.</dt>
                        <dd>101533222</dd>
                        <dt>Tutor</dt>
                        <dd>Sharon Stratsianis</dd>
                        <dt>Course</dt>
                        <dd>Robotics engineering and software development</dd>
                        <dt>Home Town</dt>
                        <dd>Melbourne</dd>
                        <dt>Favorite Pet</dt>
                        <dd>Rocky</dd>
                        <dt>Favorite book Series</dt>
                        <dd>The Expanse</dd>
                    </dl>
                    <figure class="col-sm-4">
                        <a href="images/me.jpg">
                            <img src="images/me.jpg" alt="portrait of me" />
                        </a>
                    </figure>

                </section>

                <!--timetable-->
                <section class="container text-center">
                    <h2>Timetable</h2>
                    <div class="col-sm-1"></div>


                    <table class="col-sm-10">

                        <tr>
                            <th>Time</th>
                            <th>Monday</th>
                            <th>Tuesday</th>
                            <th>Wednesday</th>
                            <th>Thursday</th>
                            <th>Friday</th>
                        </tr>
                        <tr>
                            <th>08:30</th>
                            <td rowspan="3">MEE20002<br />Lab 1 : BA601</td>
                            <td rowspan="2">COS10011<br />Lab 1 : BA411</td>
                            <td></td>
                            <td></td>
                            <td rowspan="2">MEE40003<br />Tutorial 1 : EN204</td>
                        </tr>
                        <tr>
                            <th>09:30</th>
                            <td></td>
                            <td></td>
                        </tr>
                        <tr>
                            <th>10:30</th>
                            <td rowspan="2">MEE20002<br />Lab 2 : BA601</td>
                            <td></td>
                            <td></td>
                            <td>MEE40003<br />Practical : EN108M</td>
                        </tr>
                        <tr>
                            <th>11:30</th>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                        </tr>
                        <tr>
                            <th>12:30</th>
                            <td rowspan="2">RME30002<br />Lecture 1 : EN715</td>
                            <td rowspan="2">RME30002<br />Practical 1 : ATC704</td>
                            <td></td>
                            <td></td>
                            <td rowspan="2">RME30002<br />Tutorial 1 : ATC320</td>
                        </tr>
                        <tr>
                            <th>13:30</th>
                            <td>RME30002<br />Lecture 2 : EN715</td>
                            <td></td>
                        </tr>
                        <tr>
                            <th>14:30</th>
                            <td rowspan="2">COS10011<br />Lecture 1 : BA302</td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                        </tr>
                        <tr>
                            <th>15:30</th>
                            <td>MEE40003<br />Lecture 2 : BA201</td>
                            <td></td>
                            <td></td>
                            <td></td>
                        </tr>
                        <tr>
                            <th>16:30</th>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                        </tr>
                        <tr>
                            <th>17:30</th>
                            <td rowspan="2">MEE40003<br />Lecture 1 : BA201</td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                        </tr>
                        <tr>
                            <th>18:30</th>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                        </tr>
                    </table>
                </section>

                <section class="container">
                    <!-- Spacer -->
                    <div class="col-sm-4"></div>

                    <form class="col-sm-6 " target="_blank" action="mailto:101533222@student.swin.edu.au" method="get" enctype="text/plain">
                        <h2>GET IN TOUCH</h2>
                        <p><label for="subject">Email Subject</label></p>
                        <p><input type="text" name="subject" id="subject" placeholder="Enter email subject..." tabindex="1" size="30" pattern="[a-zA-Z0-9\s]+" />
                        </p>
                        <p><label for="body">Message</label></p>
                        <p><textarea name="body" id="body" rows="8" cols="40" placeholder="Enter Message..." tabindex="2"></textarea>
                        </p>
                        <input class="button" type="submit" name="send" value="Send Email" />
                    </form>
                </section>
            </main>
            <?php include 'footer.inc'; ?>
        </div>
    </div>
</body>

</html>
