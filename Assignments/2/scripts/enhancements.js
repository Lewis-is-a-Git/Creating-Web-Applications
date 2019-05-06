/**
 * Author: Lewis 101533222
 * Target: jobs.html, apply.html
 * Purpose: Automatically enter the job ID and validate the application form
 * Created: 14/4/19
 * Last Updated: 19/4/19
 * Credits: me
 */

"use strict"; //prevents the creation of global variables in functions

window.onload = init;

/**
 * Initialise variables and attach event listeners
 */
function init() {
  var back_to_top = document.getElementById("back_to_top");
  back_to_top.onclick = backToTop;

  // Get the modal
  var modal = document.getElementById('myModal');

  // get the x button to close the modal
  var close = document.getElementsByClassName("close")[0];
  close.onclick = function () {
    modal.style.display = "none";
  }

  // When the user clicks anywhere outside of the modal, close it
  window.onclick = function (event) {
    if (event.target == modal) {
      modal.style.display = "none";
    }
  }
}
/**
 * These two function show and hide the modal
 */
function showModal() {
  document.getElementById('myModal').style.display = "block";
}
function hideModal() {
  document.getElementById('myModal').style.display = "none";
}

/**
 * When the user scrolls down, show the button
 */
window.onscroll = scrollFunction;
function scrollFunction() {
  if (document.documentElement.scrollTop > 200) {
    document.getElementById("back_to_top").style.display = "block";
  } else {
    document.getElementById("back_to_top").style.display = "none";
  }
}

/**
 * When the user clicks on the button, scroll to the top of the document
 */
function backToTop() {
  document.documentElement.scrollTop = 0;
}

// Set a waiting time
var futureTime = new Date()
futureTime.setSeconds(futureTime.getSeconds() + 10);

/**
 *  wait for a moment before asking the user for assistance
 */
var timeCount = setInterval(function () {

  // Get the current time
  var now = new Date().getTime();

  // Find how long to go
  var waitTime = futureTime - now;

  // when the wait is over 
  if (waitTime < 0) {
    clearInterval(timeCount);
    // promt the user for assitance
    showModal();
  }
}, 1000);