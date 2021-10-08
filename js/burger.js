const ham = document.querySelector(".burger");
const bars = document.querySelector(".audioBar");
const yous = document.querySelectorAll(".cellYou");
const snd = document.getElementById("volum");
var temp;
var audio = document.getElementById("aud");

yous.forEach(you => {

  you.addEventListener("click", e => {

    if(you.nextElementSibling.src != "https://www.youtube.com/embed/"){

      if(!audio.paused)
        audio.pause();

      you.classList.toggle("cogglePOS");
      you.firstElementChild.classList.toggle("coggle");

      //this is the iframe in the cell
      you.nextElementSibling.classList.toggle("hideVid");

      you.parentNode.scrollIntoView(false,{behavior: "smooth"});

      you.nextElementSibling.firstElementChild.classList.toggle("showVid");

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

ham.addEventListener("click", e => {

  ham.classList.toggle("ex");
  bars.classList.toggle("reveal");
  snd.classList.toggle("reveal");
  bars.childNodes[3].firstElementChild.classList.toggle("scroll-play");


});
//stop animations from playing when the window is being resized
//removes the jank look
let resizeTimer;
window.addEventListener("resize", e => {

  document.body.classList.add("resize-animation-stopper");

  clearTimeout(resizeTimer);

  resizeTimer = setTimeout(() => {
    document.body.classList.remove("resize-animation-stopper");
  }, 400);

});
