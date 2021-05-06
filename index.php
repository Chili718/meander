<!DOCTYPE html>
<html>
<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <title>The Meanders Podcast - Official Site</title>

  <link rel="icon" href="images/icon.png">

  <link rel="stylesheet" href="css/mainPage.css">

  <link rel="stylesheet" href="https://use.typekit.net/bft1kct.css">

  <!-- jQuery -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>

</head>
<body>

    <div class="socLinks">

    </div>

    <div class="options">
      <img class="homeImg" src="images/Meander.png">
      <h1>Podcast Episodes</h1>
      <div class="toptions">
        <input type="text" id="search" class="srch" onkeyup="" placeholder="Search for...">
        <select class="filter" name="fil">
          <option value="new">Newest</option>
          <option value="old">Oldest</option>
        </select>
      </div>
    </div>


    <div class="grid">
      <!--
      <div class='cell'>

        <div class='cellYou'>
          <p>YouTube</p>
          <img src='images/youVid.png'>
        </div>

        <iframe src='".$src."' class='cellVid hideVid' allowfullscreen></iframe>

        <div class='innerCell'>

          <img class='logo' src='images/small.png'>

          <p hidden>podcasts/one.mp3</p>
          <div>
            <h3>Final NFL Chat of the Season, Goat Talk, NBA power rankings (2/15/21), HOT TAKES Meander No.11</h3>
            <h3 class='dte'>23 April, 2021</h3>
            <p>The guy are finally back together again and for the 10th episode special. We start things off with today Super Bowl LV predictions, then we move on to recap the NBA, talking about the top 5 power ranking teams from this week. Finally, we have a fun one for the viewers, a little bit of would you rather with the gang. sit back, and enjoy.</p>
          </div>

        </div>

      </div>
    -->
      <?php

        require "php/view.php";

       ?>

    </div>

    <!-------------------------------------------->
    <!---Start of Audio Bar------>
    <!-------------------------------------------->
    <div class="audioBar" id="bar">

      <audio src="" id="aud" preload="metadata" onended="finished()"></audio>

      <h3>Now Playing - 'Nothing'</h3>

      <div class="tb">

        <img src="images/barPlay.png" id="pBar" class="pBar">

        <img src="images/previous.png" class="previous">

        <img src="images/secondsBack.png" class="prevSec" id="l">

        <div class="time" id="tme">

          <div class="currentTime" id="currentTime">0:00</div>

          <input type="range" value="0" min="0" step="1" class="slider" id="slid">

          <div class="duration" id="duration">00:00</div>

        </div>

        <img src="images/secondsForward.png" class="nextSec" id="r">

        <img src="images/next.png" class="next">

      </div>

    </div>

    <div class="burger">
      <div class="line1"></div>
      <div class="line2"></div>
    </div>

    <div class="volum" id="volum">
      <input type="range" value="1" min="0" max="1" step="0.01" class="volSlid" id="vol">
      <img src="images/sound.png">
    </div>

    <!-------------------------------------------->
    <!---End of Audio Bar------>
    <!-------------------------------------------->

  <script src="js/audio.js"></script>
  <script src="js/burger.js"></script>

</body>
</html>
