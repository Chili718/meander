var pods = document.querySelectorAll(".logo");
var cells = document.querySelectorAll(".cell");
var aud = document.getElementById("aud");
var bar = document.getElementById("bar");
var tme = document.getElementById("tme");
var range = document.getElementById("slid");
var r = document.getElementById("r");
var l = document.getElementById("l");
var myT;
var interV = 500;
var prevCell;
var curCell;
var seeking = false;


cells.forEach(cell => {
  //settimeout runs only once
  //setTimeout(showDuration(pod), 1000);
  //timePastAndLeft(pod);

  var inner = cell.childNodes[5];

  inner.addEventListener("mouseenter", e => {

    playOrPausedHover(inner);

  });

  inner.addEventListener("mouseleave", e=> {

    if(!inner.classList.contains("coggle"))
    {

      inner.childNodes[1].src = "images/small.png";

    }

  });

  inner.addEventListener("click", e=> {

      curCell = inner;

      if(!aud.src.includes(inner.childNodes[3].innerHTML) && !aud.paused)
      {
        aud.pause();
        finished();

        if(prevCell)
        {
            prevCell.childNodes[1].src = "images/small.png";
            prevCell.classList.toggle("coggle");
        }

        bar.childNodes[3].innerHTML = inner.childNodes[5].firstElementChild.innerHTML;
        aud.src = inner.childNodes[3].innerHTML;
        aud.play();
        aud.onloadedmetadata = function() {
          range.max = Math.floor(aud.duration);
        };
        inner.classList.toggle("coggle");
        inner.childNodes[1].src = "images/pause.png";
        myT = setInterval(timePastAndLeft, interV);

      }else if(!aud.src.includes(inner.childNodes[3].innerHTML) && aud.paused){

        finished();

        if(prevCell)
        {
            prevCell.childNodes[1].src = "images/small.png";
            prevCell.classList.toggle("coggle");
        }

        bar.childNodes[3].innerHTML = inner.childNodes[5].firstElementChild.innerHTML;
        aud.src = inner.childNodes[3].innerHTML;
        aud.play();
        aud.onloadedmetadata = function() {
          range.max = Math.floor(aud.duration);
        };
        inner.childNodes[1].src = "images/pause.png";
        inner.classList.toggle("coggle");
        myT = setInterval(timePastAndLeft, interV);


      }else if(aud.src.includes(inner.childNodes[3].innerHTML) && !aud.paused)
      {

        aud.pause();
        inner.childNodes[1].src = "images/play.png";
        finished();

      }
      else if(aud.src.includes(inner.childNodes[3].innerHTML) && aud.paused)
      {

        aud.play();
        inner.childNodes[1].src = "images/pause.png";
        myT = setInterval(timePastAndLeft, interV);

      }

      if(!bar.classList.contains("reveal")){

        bar.classList.toggle("reveal");

      }

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

  }
  //console.log("seeking");

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
      if(!bar.classList.contains("reveal")){

        bar.classList.toggle("reveal");

      }

    }
    else if(!aud.paused)
    {
      aud.pause();
      finished();
      curCell.childNodes[1].src = "images/play.png";
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

    return min + ":" + sec;

  }else{

    min = (min < 10) ? "0" + min : min;

    sec = (sec < 10) ? "0" + sec : sec;

    return hours + ":" + min + ":" + sec;

  }

}

function timePastAndLeft(){

  var p = Math.floor(aud.currentTime);

  var l = Math.floor(aud.duration - aud.currentTime);

  if(seeking == false){

    range.value = p;
    //console.log("not seeking");

  }

  p = convertTime(p);

  l = convertTime(l);

  tme.firstElementChild.textContent = p;

  tme.lastElementChild.textContent = l;

  //console.log(range.value);

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

function finished(){


  clearInterval(myT);
  timePastAndLeft();
  curCell.childNodes[1].src = "images/play.png";

}

function skip(dir){

  finished();
  if(dir == "r")
  {

    aud.currentTime += 30;

  }
  else if(dir == "l"){

    aud.currentTime -= 30;

  }
  aud.play();
  myT = setInterval(timePastAndLeft, interV);

}
