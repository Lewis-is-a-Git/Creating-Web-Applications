/**
 * Author: Lewis 101533222
 * Target: jobs.php, apply.php
 * Purpose: Automatically enter the job ID and validate the application form
 * Created: 14/4/19
 * Last Updated: 19/4/19
 * Credits: me
 */

"use strict"; //prevents the creation of global variables in functions

/**
 * Validates the form
 */
function validate() {
    // initialise result variable
    var result = true;

    // initialise error tags
    var job_id_error = document.getElementById("job_id_error");
    job_id_error.innerHTML = "";
    var given_name_error = document.getElementById("given_name_error");
    given_name_error.innerHTML = "";
    var family_name_error = document.getElementById("family_name_error");
    family_name_error.innerHTML = "";
    var dob_error = document.getElementById("dob_error");
    dob_error.innerHTML = "";
    var gender_error = document.getElementById("gender_error");
    gender_error.innerHTML = "";
    var street_address_error = document.getElementById("street_address_error");
    street_address_error.innerHTML = "";
    var suburb_error = document.getElementById("suburb_error");
    suburb_error.innerHTML = "";
    var post_code_error = document.getElementById("post_code_error")
    post_code_error.innerHTML = "";
    var state_error = document.getElementById("state_error");
    state_error.innerHTML = "";
    var email_error = document.getElementById("email_error");
    email_error.innerHTML = "";
    var phone_error = document.getElementById("phone_error");
    phone_error.innerHTML = "";
    var skills_error = document.getElementById("skills_error");
    skills_error.innerHTML = "";

    // get variables from form and check rules
    // if something is wrone set result to false and add error message
    var jobid = document.getElementById("jobid").value;
    if (jobid == "") {
        job_id_error.innerHTML = "Job identifier must be entered";
        result = false;
    }

    var given_name = document.getElementById("given_name").value;
    if (!given_name.match(/^[a-zA-Z]+$/)) {
        given_name_error.innerHTML = "Your first name may only conatin alpha characters.";
        result = false;
    }

    var family_name = document.getElementById("family_name").value;
    if (!family_name.match(/^[a-zA-Z\-]+$/)) {
        family_name_error.innerHTML =
            "Your last name may only conatin alpha characters and hyphens.";
        result = false;
    }

    var dob = document.getElementById("dob").value;
    if (!dob.match(/\d{2}\/\d{2}\/\d{4}/)){
        dob_error.innerHTML = "Date of Birth is invalid.";
    }
    var age = calculate_age(dob);
    if (!isFinite(age) || isNaN(age)) {
        dob_error.innerHTML = "Date of Birth is invalid.";
        result = false;
    }
    else if (age < 15 || age > 80) {
        dob_error.innerHTML =
            "You must be between 15 and 80 years old to apply.";
        result = false;
    }

    var male = document.getElementById("male").checked;
    var female = document.getElementById("female").checked;
    var other = document.getElementById("other").checked;
    if (!(male || female || other)) {
        gender_error.innerHTML = "Please select a gender.";
        result = false;
    }

    var street_address = document.getElementById("street_address").value;
    if (street_address == "") {
        street_address_error.innerHTML = "You must select a street address.";
        result = false;
    }
    var suburb = document.getElementById("suburb").value;
    if (suburb == "") {
        suburb_error.innerHTML = "You must select a suburb.";
        result = false;
    }

    var post_code = Number(document.getElementById("post_code").value);
    if (post_code == "") {
        post_code_error.innerHTML = "You must select a post code.";
        result = false;
    }

    var state = document.getElementById("state").value
    if (state == "") {
        state_error.innerHTML = "You must select a state.";
        result = false;
    } else {
        var tempMsg = validate_post_code(state, post_code);
        if (tempMsg != "") {
            state_error.innerHTML = tempMsg;
            result = false;
        }
    }

    var email = document.getElementById("email").value;
    if (email == "") {
        email_error.innerHTML = "You must enter an email address.";
        result = false;
    }

    var phone = document.getElementById("phone").value;
    if (phone == "") {
        phone_error.innerHTML = "You must enter a phone number.";
        result = false;
    }

    var coms = document.getElementById("coms").checked;
    var teamwork = document.getElementById("teamwork").checked;
    var problem = document.getElementById("problem").checked;
    var skill = document.getElementById("skill").checked;
    if (!(coms || teamwork || problem || skill)) {
        skills_error.innerHTML = "Please select at least one skill.";
        result = false;
    }
    if (skill) {
        var other_text_area = document.getElementById("other_text_area").value;
        if (other_text_area == "") {
            skills_error.innerHTML += "Other Skill text area cannot be blank.";
            result = false;
        }
    }

    if (!result) {
        document.getElementById("error_check").innerHTML = "Please Correct above errors.";
    }
    if (result) {
        storeBooking(coms, problem, teamwork, skill, other_text_area, given_name,
            family_name, dob, street_address, suburb, state, post_code, email, phone, male, female, other);
    }
    return result;
}
/**
 * calcualte age from date of birth
 */
function calculate_age(dob) {
    var today = new Date();
    var DateOfBirth = new Date(dob);
    // get the difference between the years
    var age = today.getFullYear() - DateOfBirth.getFullYear();
    // get the difference between the months
    var month = today.getMonth() - DateOfBirth.getMonth();
    // if the dob month and day is earlier in the year
    if (month < 0 || (month === 0 && today.getDate() < DateOfBirth.getDate())) {
        age--; // remove a year
    }
    return age;
}

function validate_post_code(state, post_code) {
    var errMsg = "";
    switch (state) {
        case "vic":
            if (!((post_code >= 3000 && post_code <= 3999) || (post_code >= 8000 && post_code <= 8999))) {
                errMsg += "Post Code not in Victoria.";
            }
            break;
        case "nsw":
            if (!((post_code >= 1000 && post_code <= 2599) || (post_code >= 2619 && post_code <= 2899) || (post_code >= 2921 && post_code <= 2999))) {
                errMsg += "Post Code not in New South Wales.";
            }
            break;
        case "qld":
            if (!((post_code >= 4000 && post_code <= 4999) || (post_code >= 9000 && post_code <= 9999))) {
                errMsg += "Post Code not in Queensland.";
            }
            break;
        case "nt":
            if (!(post_code >= 800 && post_code <= 999)) {
                errMsg += "Post Code not in Northern Territory.";
            }
            break;
        case "wa":
            if (!(post_code >= 6000 && post_code <= 6999)) {
                errMsg += "Post Code not in Western Australia.";
            }
            break;
        case "sa":
            if (!(post_code >= 5000 && post_code <= 5999)) {
                errMsg += "Post Code not in Southern Australia.";
            }
            break;
        case "tas":
            if (!(post_code >= 7000 && post_code <= 7999)) {
                errMsg += "Post Code not in Tasmania.";
            }
            break;
        case "act":
            if (!((post_code >= 200 && post_code <= 299) || (post_code >= 2600 && post_code <= 2618) || (post_code >= 2900 && post_code <= 2920))) {
                errMsg += "Post Code not in Australian Capital Territory.";
            }
            break;
        default:
            errMsg = "Post Code not Valid.";
    }
    return errMsg;
}

/**
 * Prefill the form from exisitng session data
 */
function prefill_id() {
    var jobId_input = document.getElementById("jobid");
    if (localStorage.jobId != undefined) {
        // hidden input to submit details
        jobId_input.value = localStorage.jobId;
        jobId_input.readOnly = true;
    } else {
        jobId_input.readOnly = false;
    }
}

/**
 * Prefill the form from exisitng session data
 */
function prefill_form() {
    prefill_id();
    if (sessionStorage.given_name != undefined) {
        document.getElementById("given_name").value = sessionStorage.given_name;
        document.getElementById("family_name").value = sessionStorage.family_name;
        document.getElementById("dob").value = sessionStorage.dob;
        document.getElementById("street_address").value = sessionStorage.street_address;
        document.getElementById("suburb").value = sessionStorage.suburb;
        document.getElementById("state").value = sessionStorage.state;
        document.getElementById("post_code").value = sessionStorage.post_code;
        document.getElementById("email").value = sessionStorage.email;
        document.getElementById("phone").value = sessionStorage.phone;

        switch (sessionStorage.gender) {
            case "male":
                document.getElementById("male").checked = true;
                break;
            case "female":
                document.getElementById("female").checked = true;
                break;
            case "other":
                document.getElementById("other").checked = true;
                break;
        }
        var skills = sessionStorage.skills;
        document.getElementById("coms").checked = skills.includes("coms");
        document.getElementById("teamwork").checked = skills.includes("teamwork");
        document.getElementById("problem").checked = skills.includes("problem");
        document.getElementById("skill").checked = skills.includes("skill");
    }
}

/**
 * Store Job ID for pre fill in application form
 */
function storeJobId1() {
    localStorage.jobId = document.getElementById("job1_id").innerHTML;
}
function storeJobId2() {
    localStorage.jobId = document.getElementById("job2_id").innerHTML;
}

/**
 * Store values for session
 */
function storeBooking(coms, problem, teamwork, skill, other_text_area, given_name,
    family_name, dob, street_address, suburb, state, post_code, email, phone, male, female, other) {
    // store values in sessionStorage
    var skill_string = "";
    if (coms) {
        skill_string = "coms";
    }
    if (problem) {
        if (skill_string != "") {
            skill_string += ", "
        }
        skill_string += "problem";
    }
    if (teamwork) {
        if (skill_string != "") {
            skill_string += ", "
        }
        skill_string += "teamwork";
    }
    if (skill) {
        if (skill_string != "") {
            skill_string += ", "
        }
        skill_string += "skill";
    }
    sessionStorage.skills = skill_string;

    sessionStorage.given_name = given_name;
    sessionStorage.family_name = family_name;
    sessionStorage.dob = dob;
    sessionStorage.street_address = street_address;
    sessionStorage.suburb = suburb;
    sessionStorage.state = state;
    sessionStorage.post_code = post_code;
    sessionStorage.email = email;
    sessionStorage.phone = phone;
    sessionStorage.other_text_area = other_text_area;
    if (male) {
        sessionStorage.gender = "male";
    } else if (female) {
        sessionStorage.gender = "female";
    } else if (other) {
        sessionStorage.gender = "other";
    }

}

/**
 *  This function is called when the browser window loads
 *  it will register functions that will respond to browser events
*/
function init() {
    if (document.title == "Available Jobs") {
        document.getElementById("job1_apply").onclick = storeJobId1;
        document.getElementById("job2_apply").onclick = storeJobId2;
    } else if (document.title == "Application Form") {
        prefill_form();
        // debug flag, set to 1 if in debug mode
        var debug = 1;
        // register the event listener to the form
        if (!debug) {
            document.getElementById("apply_form").onsubmit = validate;
        }
        document.getElementById("apply_form").onreset = function () {
            localStorage.clear();
            prefill_id();
        }
    }
}

window.onload = init;
