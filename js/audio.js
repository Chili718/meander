var pods = document.querySelectorAll(".logo");
var myT;


pods.forEach(pod => {
  //settimeout runs only once
  setTimeout(showDuration(pod), 1000);
  //timePastAndLeft(pod);

  pod.addEventListener("mouseenter", e => {

    playOrPausedHover(pod);

  });

  pod.addEventListener("mouseleave", e=> {

    //playOrPausedHover(pod);

    pod.src = "images/small.png";

  });

  pod.addEventListener("click", e=> {

    var test = playOrPausedClick(pod);
    //console.log(test);

    if(test == "playing")
    {

      myT = setInterval(() => timePastAndLeft(pod), 500);
      //console.log(myT);
    }
    else
    {
      //console.log(myT);
      clearInterval(myT);

    }


  });

  var range = pod.nextElementSibling.childNodes[3];

  range.addEventListener("change", e=>{

    seek(pod);

  });

});

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

function timePastAndLeft(aud){

  var p = Math.floor(aud.previousElementSibling.currentTime);

  var l = Math.floor(aud.previousElementSibling.duration - aud.previousElementSibling.currentTime);

  aud.nextElementSibling.childNodes[3].value = p;

  p = convertTime(p);

  l = convertTime(l);

  aud.nextElementSibling.childNodes[1].textContent = p;

  aud.nextElementSibling.childNodes[5].textContent = l;

  console.log("mid");

}

function showDuration(aud){

  aud.previousElementSibling.onloadedmetadata = function(){

    var d = Math.floor(aud.previousElementSibling.duration);

    //console.log(aud.nextElementSibling.childNodes[5]);

    aud.nextElementSibling.childNodes[3].setAttribute("max", d);

    aud.nextElementSibling.childNodes[5].textContent = convertTime(d);

  }

}

function playOrPausedHover(aud){
  //white space is a considered a node so we must use previouselementsibling instead of previous sibling
  //which ignores such thing
  //console.log(aud.previousElementSibling);

  if(!aud.previousElementSibling.paused){

    aud.src = "images/pause.png";

  }else{

    aud.src = "images/play.png";

  }

}

function playOrPausedClick(aud){

  if(aud.previousElementSibling.paused){

    aud.previousElementSibling.play();
    aud.src = "images/pause.png";
    return "playing";

  }else{

    aud.previousElementSibling.pause();
    aud.src = "images/play.png";
    return "paused";

  }

}

function seek(aud){
  //clearInterval(myT);
  aud.previousElementSibling.currentTime = aud.nextElementSibling.childNodes[3].value;
  //myT = setInterval(() => timePastAndLeft(aud), 500);
  timePastAndLeft(aud);
  aud.previousElementSibling.play();

}

function finished(){


  clearInterval(myT);

}
