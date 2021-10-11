//selector for all of the cells images
var pods = document.querySelectorAll(".logo");
//podcast cells containing all of the info and such
var cells = document.querySelectorAll(".cell");
//audio that is playing on the page
var aud = document.getElementById("aud");
//the audio bar and all of its contents
var bar = document.getElementById("bar");
//time div holding the time remaining, time past, and range bar
var tme = document.getElementById("tme");
//slider showing the progress of the song
var range = document.getElementById("slid");

//next podcast
var r = document.getElementById("r");
//previous podcast
var l = document.getElementById("l");

//play button for the song bar
var pBar = document.getElementById("pBar");
//volume slider at top right
var volumeBar = document.getElementById("vol");
//mobile burger menu
var bur = document.querySelector(".burger");

//the saved interval var so I can stop the looping code
//when the audio is paused
var myT;
//time interval for updating the time past and left
var interV = 500;

//
var prevCell;
var curCell;

//if the user is dragging the progress bar for the song
var seeking = false;

//adds functionality for keeping the users time
//they were last on before muting and that specific volume icon
var prevVol = 1.0;
var preVolSymbol = "<ion-icon name='volume-high-outline'></ion-icon>";

var titleOffset = 0;


cells.forEach(cell => {
  //settimeout runs only once
  //setTimeout(showDuration(pod), 1000);
  //timePastAndLeft(pod);

  var inner = cell.childNodes[5];

  //console.log(inner);

  inner.addEventListener("mouseenter", e => {

    playOrPausedHover(inner);

  });

  inner.addEventListener("mouseleave", e=> {

    if(!inner.classList.contains("coggle"))
    {

      inner.childNodes[1].src = "images/small.png";

    }

  });
  //another way to do this could have been getting the target click on
  //which would be the innercell and getting / setting everything from
  //there... maybe in the future
  inner.addEventListener("click", e=> {

      curCell = inner;

      //if the clicked on cell is not the current cell that is playing
      if(!aud.src.includes(inner.childNodes[3].innerHTML))
      {
        //pause the audio if not aleady
        if(!aud.paused)
          aud.pause();

        //remove the interval function and reset the icons for the cell and audio bar
        finished();
        //if a previous cell exists then the images on the cell and shading will be reset
        if(prevCell)
        {
            prevCell.childNodes[1].src = "images/small.png";
            prevCell.classList.toggle("coggle");
        }
        //change the audio bars title to the current audio selected
        bar.childNodes[3].firstElementChild.innerHTML = inner.childNodes[5].firstElementChild.innerHTML;
        //get the length of the title and the title box and calculate the offset
        titleOffset = bar.childNodes[3].firstElementChild.scrollWidth - bar.childNodes[3].offsetWidth;
        //if the offset is negative or 0 then there is no overlap in the title box
        if(titleOffset > 0){
          //adding 30px to the translation, 15 for the padding on the right side and another 15 for some buffer
          titleOffset += 30;
          //if will only translate the offset of the title that is cut off plus what I added
          document.documentElement.style.setProperty('--translate-width', '-'+ titleOffset +'px');
          //console.log(titleOffset);

        }else{
          //no need for the animation to do anything when there is no overlap
          document.documentElement.style.setProperty('--translate-width', '0px');

        }
        //add the animation if it is not already there
        if(!bar.childNodes[3].firstElementChild.classList.contains("scroll-play")){

          bar.childNodes[3].firstElementChild.classList.toggle("scroll-play");

        }
        else
        {//if it is there then reset it so the user would always see the beginning of the title
          //instead of it possibly being in the center of the animation

          bar.childNodes[3].firstElementChild.classList.toggle("scroll-play");
          setTimeout(function(){ bar.childNodes[3].firstElementChild.classList.toggle("scroll-play"); }, 500);

        }


        //change the audio bars source to the new audio and play
        aud.src = inner.childNodes[3].innerHTML;
        aud.play();
        //once the meta data for the audio has loaded the songs duration will be displayed
        aud.onloadedmetadata = function() {
          range.max = Math.floor(aud.duration);
        };
        //toggle the cells shading to visually represent it being checked
        inner.classList.toggle("coggle");
        //now when the user hovers the cell the correct pause logo will show
        inner.childNodes[1].src = "images/pause.png";
        //same with the audio bar
        pBar.innerHTML = "<ion-icon name='pause-circle-outline'></ion-icon>";
        //set the interval function to continuously update the time past and left in the audio
        myT = setInterval(timePastAndLeft, interV);

      }//if the cell being clicked on is the current cell being played and it not paused
      else if(aud.src.includes(inner.childNodes[3].innerHTML) && !aud.paused)
      {
        //pause the audio and clear the interval to not have it running in the background
        aud.pause();
        inner.childNodes[1].src = "images/play.png";
        pBar.innerHTML = "<ion-icon name='play-circle-outline'></ion-icon>";
        finished();

      }//if the cell being clicked on is the current cell being played and is paused
      else if(aud.src.includes(inner.childNodes[3].innerHTML) && aud.paused)
      {
        //continue playing the audio and restart the interval to update the time past and left
        aud.play();
        pBar.innerHTML = "<ion-icon name='pause-circle-outline'></ion-icon>";
        inner.childNodes[1].src = "images/pause.png";
        myT = setInterval(timePastAndLeft, interV);

      }
      //open the audio bar and volume if not already
      if(!bar.classList.contains("reveal")){

        bar.classList.toggle("reveal");
        volumeBar.parentNode.classList.toggle("reveal");
        bur.classList.toggle("ex");

      }
      //update the previous cell
      prevCell = inner;


  });

});

range.addEventListener("change", e=>{

  if(aud.src.includes(".mp3") || aud.src.includes(".m4a")){

    seek();

  }

});

r.addEventListener("click", e => {

  if(curCell)
    skip("r");

});

l.addEventListener("click", e => {

  if(curCell)
    skip("l");

});

range.addEventListener('input', e => {

  if(curCell)
  {

    seeking = true;
    timePastAndLeft();

  }
  //console.log("seeking");

});

volumeBar.addEventListener("input", e=>{

  //console.log(volumeBar.value);
  aud.volume = volumeBar.value;

  if(volumeBar.value == 0.0){

    volumeBar.nextElementSibling.innerHTML = "<ion-icon name='volume-mute-outline'></ion-icon>";

  }else if(volumeBar.value > 0.0){

    if(volumeBar.value <= 0.33){

      volumeBar.nextElementSibling.innerHTML = "<ion-icon name='volume-low-outline'></ion-icon>";

    }else if(volumeBar.value > 0.33 && volumeBar.value <= 0.66){

      volumeBar.nextElementSibling.innerHTML = "<ion-icon name='volume-medium-outline'></ion-icon>";

    }else{

      volumeBar.nextElementSibling.innerHTML = "<ion-icon name='volume-high-outline'></ion-icon>";

    }

    prevVol = volumeBar.value;
    preVolSymbol = volumeBar.nextElementSibling.innerHTML;

  }

});
/*
volumeBar.addEventListener("change", e=>{
  //console.log(volumeBar.value);
  aud.volume = volumeBar.value;
  if(volumeBar.value == 0.0){
    volumeBar.nextElementSibling.src = "images/noSound.png";
  }else if(volumeBar.value > 0.0){
    if(!volumeBar.nextElementSibling.src.includes("sound.png")){
      volumeBar.nextElementSibling.src = "images/sound.png";
    }
    prevVol = volumeBar.value;
  }
});
*/

volumeBar.nextElementSibling.addEventListener("click", e=>{

  if(volumeBar.nextElementSibling.innerHTML.includes("volume-mute-outline"))
  {

    volumeBar.value = prevVol;
    volumeBar.nextElementSibling.innerHTML = preVolSymbol;
    aud.volume = volumeBar.value;

  }else{

    volumeBar.value = 0.0;
    volumeBar.nextElementSibling.innerHTML = "<ion-icon name='volume-mute-outline'></ion-icon>";
    aud.volume = volumeBar.value;

  }

});

pBar.addEventListener("click", e => {

  playOPause();

});

//play or pause with the spacebar(32)
document.body.onkeyup = function(e){
      if(e.keyCode == 32){
        playOPause();
    }
}
//for preventing the space bar from taking you to the bottom of the page
document.body.onkeydown = function(e){
    if(e.keyCode == 32){
        e.preventDefault();
    }
}

function playOPause(){

  if(curCell){

    if(aud.paused)
    {

      aud.play();
      myT = setInterval(timePastAndLeft, interV);
      curCell.childNodes[1].src = "images/pause.png";
      pBar.innerHTML = "<ion-icon name='pause-circle-outline'></ion-icon>";
      if(!bar.classList.contains("reveal")){

        bar.classList.toggle("reveal");

      }

    }
    else if(!aud.paused)
    {
      aud.pause();
      finished();
      curCell.childNodes[1].src = "images/play.png";
      pBar.innerHTML = "<ion-icon name='play-circle-outline'></ion-icon>";
    }

  }

}

function convertTime(seconds){

  var min = Math.floor(seconds/60);

  var hours = Math.floor(min/60);

  var sec = seconds % 60;

  //console.log(hours);

  if(hours == 0){

    sec = (sec < 10) ? "0" + sec : sec;

    if(min <=9)
      min = "0" + min;

    return min + ":" + sec;

  }else{

    min = (min < 10) ? "0" + min : min;

    sec = (sec < 10) ? "0" + sec : sec;

    if(hours <=9)
      hours = "0" + hours;

    return hours + ":" + min + ":" + sec;

  }

}

function timePastAndLeft(){

  if(seeking == false){

    var p = Math.floor(aud.currentTime);

    var l = Math.floor(aud.duration - aud.currentTime);

    range.value = p;
    //console.log("not seeking");

    p = convertTime(p);

    l = convertTime(l);

    tme.firstElementChild.textContent = p;

    tme.lastElementChild.textContent = l;

    //console.log(range.value);

  }else if(seeking == true){

    var p = Math.floor(range.value);

    var l = Math.floor(aud.duration - p);

    p = convertTime(p);

    l = convertTime(l);

    tme.firstElementChild.textContent = p;

    tme.lastElementChild.textContent = l;

  }

}

function playOrPausedHover(pos){
  //white space is a considered a node so we must use previouselementsibling instead of previous sibling
  //which ignores such thing
  //console.log(aud.previousElementSibling);

  if(!aud.paused && aud.src.includes(pos.childNodes[3].innerHTML)){

    pos.childNodes[1].src = "images/pause.png";

  }else{

    pos.childNodes[1].src = "images/play.png";

  }

}

function seek(){

  aud.currentTime = range.value;
  timePastAndLeft();
  seeking = false;

}
/*
///////////////////////////////////////////////////
Function for clearing the interval function thats updating the time
and reset the play icons on the cell and audio bar
///////////////////////////////////////////////////
*/
function finished(){


  clearInterval(myT);
  timePastAndLeft();
  curCell.childNodes[1].src = "images/play.png";
  pBar.innerHTML = "<ion-icon name='play-circle-outline'></ion-icon>";

}

function skip(dir){

  //finished();
  if(dir == "r")
  {

    aud.currentTime += 30;

  }
  else if(dir == "l"){

    aud.currentTime -= 30;

  }
  myT = setInterval(timePastAndLeft, interV);

}
