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

  <div class="home">

    <img class="homeImg" src="images/Meander.png">


    <div class="options">
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


      <div class='cell'>

        <div class="innerCell">

          <img class='logo' src='images/small.png'>

          <p hidden>podcasts/one.mp3</p>
          <div>
            <h3>This is the Title</h3>
            <p>This is the description</p>
          </div>

        </div>
        <h3 class="dte">Date</h3>
      </div>

      <div class='cell'>

        <div class="innerCell">

          <img class='logo' src='images/small.png'>

          <p hidden>podcasts/two.mp3</p>
          <div>
            <h3>This is the Title</h3>
            <p>This is the description</p>
          </div>

        </div>
        <h3 class="dte">Date</h3>
      </div>
      <?php

      //require "php/view.php";

       ?>

    </div>

    <!-------------------------------------------->
    <!---Start of Audio Bar------>
    <!-------------------------------------------->
    <div class="audioBar" id="bar">

      <audio src="" id="aud" preload="metadata" onended="finished()"></audio>

      <h3>Now Playing - 'Nothing'</h3>

      <div class="tb">

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

    <!-------------------------------------------->
    <!---End of Audio Bar------>
    <!-------------------------------------------->

  </div>

  <script src="js/audio.js"></script>
  <script src="js/burger.js"></script>

</body>
</html>
