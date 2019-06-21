/**
 * Author: Lewis 101533222
 * Target: register.html
 * Purpose: This file is to make stuff happen
 * Created: 12/4/19
 * Last Updated: 12/4/19
 * Credits: me
 */

"use strict"; //prevents the creation of global variables in functions

/**
 * Validates the form
 */
function validate() {
    // initialise local variables
    var errMsg = "";
    var result = true;

    // get variables from form and check rules
    // if something is wrone set result to false and add error message
    var firstname = document.getElementById("firstname").value;
    if (!firstname.match(/^[a-zA-Z]+$/)) {
        errMsg += "Your first name may only conatin alpha characters.\n";
        result = false;
    }

    var lastname = document.getElementById("lastname").value;
    if (!lastname.match(/^[a-zA-Z\-]+$/)) {
        errMsg += "Your last name may only conatin alpha characters and hyphens.\n";
        result = false;
    }

    var age = document.getElementById("age").value;
    if (!isFinite(age) || isNaN(age)) {
        errMsg += "Age must be a number.\n";
        result = false;
    }
    else if (age < 18 || age > 10000) {
        errMsg += "You must be between 18 and 10,000 years old\n";
        result = false;
    }
    else {
        var tempMsg = checkSpeciesAge(age);
        if (tempMsg != "") {
            errMsg += tempMsg;
            result = false;
        }
    }

    var partySize = document.getElementById("partySize").value;
    if (partySize < 1 || partySize > 100) {
        errMsg += "Number of travelers must be between 1 and 100.\n";
        result = false;
    }

    if (document.getElementById("food").value == "none") {
        errMsg += "You must select a food preference.\n"
        result = false;
    }

    var is1day = document.getElementById("1day").checked;
    var is4day = document.getElementById("4day").checked;
    var is10day = document.getElementById("10day").checked;
    if (!(is1day || is4day || is10day)) {
        errMsg += "Please select at lest one trip.\n";
        result = false;
    }

    var human = document.getElementById("human").checked;
    var dwarf = document.getElementById("dwarf").checked;
    var elf = document.getElementById("elf").checked;
    var hobbit = document.getElementById("hobbit").checked;
    if (!(human || dwarf || elf || hobbit)) {
        errMsg += "Please select a species.\n";
        result = false;
    }

    var beard = document.getElementById("beard").value;
    var tempMsg = checkBeard(beard, age);
    if (tempMsg != "") {
        errMsg += tempMsg;
        result = false;
    }

    if (errMsg != "") {
        alert(errMsg);
    }
    if (result) {
        storeBooking(firstname, lastname, age, beard, is1day, is4day, is10day, partySize);
    }
    return result;
}

/**
 * Return the selected species as a string
 */
function getSpecies() {
    // initailise varaibles
    var speciesname = "Unknown";

    // get and array of all species
    var speciesArray = document.getElementById("species").getElementsByTagName("input");

    // find the checked element in the array
    for (var i = 0; i < speciesArray.length; i++) {
        if (speciesArray[i].checked) {
            speciesname = speciesArray[i].value;
        }
    }
    // return the selected species
    return speciesname;
}

/**
 * check age based on species
 * @param {number} age age of applicant
 */
function checkSpeciesAge(age) {
    // assume the general age check has already been applied
    var errMsg = "";
    var species = getSpecies();
    switch (species) {
        case "Human":
            if (age > 120) {
                errMsg = "You cannot be a human and over 120.\n";
            }
            break;
        case "Dwarf":
        case "Hobbit":
            if (age > 150) {
                errMsg = "You cannot be a " + species + " and over 150.\n";
            }
            break;
        case "Elf": // no age check required
            break;
        default:
            errMsg = "We don't allow your kind on our tours.\n";
    }
    return errMsg;
}

/**
 * check beard length based on species and age
 */
function checkBeard(beard, age) {
    // assume the general age check has already been applied
    var errMsg = "";
    var species = getSpecies();
    switch (species) {
        case "Human": // no check required
            break;
        case "Dwarf": // age greater than 30?  = beard > 12
            if (age > 30) {
                if (beard <= 12) {
                    errMsg = "You are not a Dwarf without a beard.\n";
                }
            }
            break;
        case "Hobbit": // no beards
        case "Elf":
            if (beard > 0)
                errMsg = "You cannot be a " + species + " with a beard.\n";
            break;
        default:
            errMsg = "We don't allow your kind on our tours.\n";
    }
    return errMsg;
}

/**
 * Store values for session
 */
function storeBooking(firstname, lastname, age, beard, is1day, is4day, is10day, partySize) {
    // store values in sessionStorage
    var trip = "";
    if (is1day) {
        trip = "1day";
    }
    if (is4day) {
        if (trip != "") {
            trip += ", "
        }
        trip += "4day";
    }
    if (is10day) {
        if (trip != "") {
            trip += ", "
        }
        trip += "10day";
    }

    sessionStorage.trip = trip;
    sessionStorage.firstname = firstname;
    sessionStorage.lastname = lastname;
    sessionStorage.age = age;
    sessionStorage.beard = beard;
    sessionStorage.species = getSpecies();

    var food = document.getElementById("food").value;
    sessionStorage.food = food;

    sessionStorage.partySize = partySize;
}

/**
 * Prefill the form from exisitng session data
 */
function prefill_form() {
    if (sessionStorage.firstname != undefined) {
        document.getElementById("firstname").value = sessionStorage.firstname;
        document.getElementById("lastname").value = sessionStorage.lastname;
        document.getElementById("age").value = sessionStorage.age;
        document.getElementById("beard").value = sessionStorage.beard;
        document.getElementById("food").value = sessionStorage.food;
        document.getElementById("partySize").value = sessionStorage.partySize;

        switch (sessionStorage.species) {
            case "Human":
                document.getElementById("human").checked = true;
                break;
            case "Dwarf":
                document.getElementById("dwarf").checked = true;
                break;
            case "Hobbit":
                document.getElementById("hobbit").checked = true;
                break;
            case "Elf":
                document.getElementById("elf").checked = true;
                break;
        }
        var trip = sessionStorage.trip;
        document.getElementById("1day").checked = trip.includes("1day");
        document.getElementById("4day").checked = trip.includes("4day");
        document.getElementById("10day").checked = trip.includes("10day");

    }
}

/**
 *  This function is called when the browser window loads
 *  it will register functions that will respond to browser events
*/
function init() {
    // register the event listener to the form submit
    document.getElementById("regform").onsubmit = validate;
    prefill_form();
}

window.onload = init;
