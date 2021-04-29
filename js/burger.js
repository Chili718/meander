const ham = document.querySelector(".burger");
const bar = document.querySelector(".audioBar");

ham.addEventListener("click", ()=>{

  ham.classList.toggle("ex");
  bar.classList.toggle("reveal");


});
//stop animations from playing when the window is being resized
//removes the jank look 
let resizeTimer;
window.addEventListener("resize", () => {
  document.body.classList.add("resize-animation-stopper");
  clearTimeout(resizeTimer);
  resizeTimer = setTimeout(() => {
    document.body.classList.remove("resize-animation-stopper");
  }, 400);
});
