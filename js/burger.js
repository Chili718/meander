const ham = document.querySelector(".burger");
const bars = document.querySelector(".audioBar");

ham.addEventListener("click", e => {

  ham.classList.toggle("ex");
  bars.classList.toggle("reveal");


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
