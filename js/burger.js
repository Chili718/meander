/*
////////////////////////////////////////////////////
JS File for the functionality of the hamburger and embeded
youtube video tab
///////////////////////////////////////////////////
*/

var ham = document.querySelector(".burger");
var bars = document.querySelector(".audioBar");
var snd = document.getElementById("volum");

//selecting all of the youtube cells tabs
var yous = document.querySelectorAll(".cellYou");
//temp variable to holding the video source to be reset on close to pause the video
var temp;

var audio = document.getElementById("aud");

yous.forEach(you => {

  you.addEventListener("click", e => {
    //checking if the yt vid has an actual embed code
    if(you.nextElementSibling.src != "https://www.youtube.com/embed/"){
      //pause the audio when opening the yt vid to not interfere with its audio
      if(!audio.paused)
        audio.pause();

      //you.classList.toggle("cogglePOS");
      //toggle the class which darkens the tabs background
      you.firstElementChild.classList.toggle("coggle");

      //toggle to show on the iframe wrapper
      you.nextElementSibling.classList.toggle("hideVid");
      //scroll the entire cell plus the video into a better view
      you.parentNode.scrollIntoView(false,{behavior: "smooth"});
      //now show the iframe itself in the wrapper
      you.nextElementSibling.firstElementChild.classList.toggle("showVid");
      //toggle the class that will turn the arrow up or down
      you.firstElementChild.lastElementChild.classList.toggle("youDown");

      //I did this after fooling around with the api for the youtube iframe api
      //to which I concluded that it could not accimplish what I wanted it to
      //this is a super janky way to pause the video on close
      if(!you.nextElementSibling.classList.contains("showVid")){
        temp = you.nextElementSibling.src;
        you.nextElementSibling.src = "";
        you.nextElementSibling.src = temp;

      }

    }

  });

});
//hamburger hides sound, audio bar and toggles the scrolling text animtaion
ham.addEventListener("click", e => {

  ham.classList.toggle("ex");
  bars.classList.toggle("reveal");
  snd.classList.toggle("reveal");
  bars.childNodes[3].firstElementChild.classList.toggle("scroll-play");


});
//stop animations from playing when the window is being resized
//removes the jank look of shifting elements
var resizeTimer;
window.addEventListener("resize", e => {

  document.body.classList.add("resize-animation-stopper");

  clearTimeout(resizeTimer);

  resizeTimer = setTimeout(() => {
    document.body.classList.remove("resize-animation-stopper");
  }, 400);

});
