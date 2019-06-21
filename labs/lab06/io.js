/**
 * Author: Lewis 101533222
 * Target: clickme.html
 * Purpose: This file is to make stuff happen
 * Created: 6/4/19
 * Last Updated: 6/4/19
 * Credits: me
 */

"use strict"; //prevents the createion of global variables in functions

/**
 * write output to a webpage
 */
function writeNewMessage() {
    document.getElementById("span_text").textContent = 
    "You have now finished Task 1";
}

/**
 * write content to a html element
 */
function rewriteParagraph(userName) {
    //1. get a reference to the element with id “message” and assign it to a local variable
    var message = document.getElementById("message");
    // 2. write text to the html page using the innerHTML property
    message.innerHTML = "Hi " + userName + ". If you can see this you have " +
        "successfully overwrittern the content of this paragraph. Congratulations!!";
}

/**
 * Promt the user for thier name
 */
function promptName() {
    var sName = prompt("Enter your name.\nThis prompt should show up when the " + 
        "button is clicked.","Your Name");
    alert("Hi there " + sName + ". Alert boxes are a quick way to check the state " +
        "\nof your variables when you are developing code.");
    rewriteParagraph(sName);
}

/**
 *  This function is called when the browser window loads
 *  it will register functions that will respond to browser events
*/
function init() {
    var clickMe = document.getElementById("clickme");
    clickMe.onclick = promptName;
}

window.onload = init;
