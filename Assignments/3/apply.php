<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">


<head>
    <?php include 'header.inc'; ?>
    <script src="scripts/apply.js"></script>
    <title>Application Form</title>
    <!-- Description: Express interest for listed jobs -->
    <!-- Author: lewis 101533222 -->
    <!-- Date: 19/05/19 -->
    <!-- Validated: OK <19/05/19> -->
</head>

<body>
    <div id="page-container">
        <div id="content-wrap">
            <?php include 'menu.inc'; ?>

            <main>
                <section class="container-fluid">
                    <h1>Application Form</h1>
                    <form class="container" id="apply_form" method="post" action="processEOI.php" novalidate>
                        <p>
                            <span id="job_id_error" class="error"></span>
                        </p>
                        <p>
                            <label for="jobid">Job Reference ID:</label>

                            <input type="text" name="jobid" id="jobid" maxlength="5" size="5" pattern="[a-zA-Z0-9]{5}" />
                        </p>
                        <fieldset>
                            <legend>Applicant details</legend>
                            <p>
                                <span id="given_name_error" class="error"></span>
                            </p>
                            <p>
                                <label for="given_name">Given Name:</label>
                                <input type="text" name="given_name" id="given_name" maxlength="20" size="20" pattern="[a-zA-Z]{1,15}" />
                            </p>
                            <p>
                                <span id="family_name_error" class="error"></span>
                            </p>
                            <p>
                                <label for="family_name">Family Name:</label>
                                <input type="text" name="family_name" id="family_name" maxlength="20" size="20" pattern="^[a-zA-Z\-]+$" />
                            </p>
                            <p>
                                <span id="dob_error" class="error"></span>
                            </p>
                            <p>
                                <label for="dob">Date of Brith</label>
                                <input type="date" name="dob" id="dob" />
                            </p>
                            <fieldset id="gender">
                                <legend>Gender</legend>
                                <p>
                                    <span id="gender_error" class="error"></span>
                                </p>
                                <p>
                                    <input type="radio" id="male" name="gender" value="male" />
                                    <label for="male">Male</label>
                                    <input type="radio" id="female" name="gender" value="female" />
                                    <label for="female">Female</label>
                                    <input type="radio" id="other" name="gender" value="other" />
                                    <label for="other">Other</label>
                                </p>
                            </fieldset>
                            <fieldset>
                                <legend>Address</legend>
                                <p>
                                    <span id="street_address_error" class="error"></span>
                                </p>
                                <p>
                                    <label for="street_address">Street Address</label>
                                    <input type="text" name="street_address" id="street_address" maxlength="40" size="40" pattern="[a-zA-Z0-9\s]{1,40}" />
                                </p>
                                <p>
                                    <span id="suburb_error" class="error"></span>
                                </p>
                                <p>
                                    <label for="suburb">Suburb</label>
                                    <input type="text" name="suburb" id="suburb" maxlength="40" size="40" pattern="[a-zA-Z]{1,40}" />
                                </p>
                                <p>
                                    <span id="state_error" class="error"></span>
                                </p>
                                <p>
                                    <label for="state">State</label>
                                    <select name="state" id="state">
                                        <option hidden="hidden" value="">Select state...</option>
                                        <option value="vic">VIC</option>
                                        <option value="nsw">NSW</option>
                                        <option value="qld">QLD</option>
                                        <option value="nt">NT</option>
                                        <option value="wa">WA</option>
                                        <option value="sa">SA</option>
                                        <option value="tas">TAS</option>
                                        <option value="act">ACT</option>
                                    </select>
                                </p>
                                <p>
                                    <span id="post_code_error" class="error"></span>
                                </p>
                                <p>
                                    <label for="post_code">Post Code</label>
                                    <input type="text" name="post_code" id="post_code" maxlength="4" size="4" pattern="\d{4}" />
                                </p>
                            </fieldset>
                            <fieldset>
                                <legend>Contact Details</legend>
                                <p>
                                    <span id="email_error" class="error"></span>
                                </p>
                                <p>
                                    <label for="email">Email Address</label>
                                    <input type="text" name="email" id="email" maxlength="40" size="40" pattern="^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z\.]{2,}$" />
                                </p>
                                <p>
                                    <span id="phone_error" class="error"></span>
                                </p>
                                <p>
                                    <label for="phone">Phone Number</label>
                                    <input type="text" name="phone" id="phone" maxlength="20" size="20" pattern="[\d\s]{8,12}" />
                                </p>
                            </fieldset>
                            <fieldset>
                                <legend>Skills</legend>
                                <p>
                                    <span id="skills_error" class="error"></span>
                                </p>
                                <p>
                                    <input type="checkbox" id="coms" name="skills[]" value="coms" checked="checked" />
                                    <label for="coms">Communication</label>
                                </p>
                                <p>
                                    <input type="checkbox" id="teamwork" name="skills[]" value="teamwork" />
                                    <label for="teamwork">Teamwork</label>
                                </p>
                                <p>
                                    <input type="checkbox" id="problem" name="skills[]" value="problem" />
                                    <label for="problem">Problem solving</label>
                                </p>
                                <p>
                                    <input type="checkbox" id="skill" name="skills[]" value="other" />
                                    <label for="other">Other Skills...</label>
                                </p>
                                <p>
                                    <label id="other_text_label" for="other_text_area">Other Skills</label>
                                </p>
                                <p>
                                    <textarea id="other_text_area" name="other_text" rows="4" cols="40" placeholder="Enter other skills here..."></textarea>
                                </p>
                            </fieldset>
                        </fieldset>
                        <p>
                            <span id="error_check" class="error"></span>
                        </p>
                        <input class="button" type="submit" value="Apply" />
                        <input class="button" type="reset" value="Reset Form" />
                    </form>

                </section>

            </main>
            <?php include 'footer.inc'; ?>
        </div>
    </div>
</body>

</html>
