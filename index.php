<!DOCTYPE html>
<html>
<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <title>The Meanders Podcast - Official Site</title>

  <link rel="icon" href="images/icon.png">

  <link rel="stylesheet" href="css/mainPage.css">
  <link rel="stylesheet" href="css/audioBar.css">

  <link rel="stylesheet" href="https://use.typekit.net/bft1kct.css">

  <!-- jQuery -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>

</head>
<body>

    <div class="socLinks">

    </div>

    <!-------------------------------------------->
    <!---Start of Top Logo and Search Options------>
    <!-------------------------------------------->
    <div class="searchAndLogo">

      <img class="homeImg" src="images/Meander.png">

      <h1>Podcast Episodes</h1>

      <div class="toptions">

        <div class="srchContainer">
          <input type="text" id="search" class="srch" onkeyup="" placeholder="Search for...">
          <div class="srchIcon">
            <ion-icon name="search"></ion-icon>
          </div>
        </div>

        <select class="filter" name="fil">
          <option value="new">Newest</option>
          <option value="old">Oldest</option>
        </select>

      </div>
    </div>
    <!-------------------------------------------->
    <!---End of Top Logo and Search Options------>
    <!-------------------------------------------->


    <div class="grid">

      <?php

        require "php/view.php";

       ?>

    </div>

    <!-------------------------------------------->
    <!---Start of Audio Bar------>
    <!-------------------------------------------->
    <div class="audioBar" id="bar">

      <audio src="" id="aud" preload="metadata" onended="finished()"></audio>

      <div class="scroll-left">
        <h3>Now Playing - 'Nothing'</h3>
      </div>

      <div class="tb">

        <div class="audioButtons pBar" id="pBar">
          <ion-icon name="play-circle-outline"></ion-icon>
        </div>

        <div class="audioButtons previous">
          <ion-icon name="play-skip-back-circle-outline"></ion-icon>
        </div>

        <img src="images/secondsBack.png" class="prevSec" id="l">

        <div class="time" id="tme">

          <div class="currentTime" id="currentTime">0:00</div>

          <input type="range" value="0" min="0" step="1" class="slider" id="slid">

          <div class="duration" id="duration">00:00</div>

        </div>

        <img src="images/secondsForward.png" class="nextSec" id="r">

        <div class="audioButtons next">
          <ion-icon name="play-skip-forward-circle-outline"></ion-icon>
        </div>

      </div>

    </div>

    <!-------------------------------------------->
    <!---End of Audio Bar------>
    <!-------------------------------------------->

    <div class="burger">
      <div class="line1"></div>
      <div class="line2"></div>
    </div>

    <div class="volum" id="volum">
      <input type="range" value="1" min="0" max="1" step="0.01" class="volSlid" id="vol">
      <div class="audioButtons volIcon">
        <ion-icon name="volume-high-outline"></ion-icon>
      </div>
    </div>

    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
    <script src="js/audio.js"></script>
    <script src="js/burger.js"></script>

</body>
</html>
