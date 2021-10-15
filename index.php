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

  <script>

    $(document).ready(function(){

      var filter = $('#filter').val();
      //console.log(filter);

      $.ajax({

        url: 'php/view.php',
        type: 'POST',
        data: {filter: filter},
        success: function(response){

          if(response == "dbf"){

            document.getElementById('errorTxt').innerHTML = 'Looks like its the internet, or me though.';

          }else{

            $(".grid").prepend(response).show().fadeIn("slow");
            //should handle the adding of event listeners to dynamic elements a lot better
            //but I thought about this a little to late, maybe in the future I would add a click event listener to the
            //body and handle it by the elements class name that was clicked on to run the functions
            youVids();
            cellFunctions();

          }

        }

      });


      $('#filter').change(function(){

        filter = $('#filter').val();

        //remove the current images
        $(".grid").html('');

          $.ajax({

            url: 'php/view.php',
            type: 'POST',
            data: {filter: filter},
            success: function(response){

              $(".grid").prepend(response).hide().fadeIn(1500);
              //should handle the adding of event listeners to dynamic elements a lot better
              //but I thought about this a little to late, maybe in the future I would add a click event listener to the
              //body and handle it by the elements class name that was clicked on to run the functions
              youVids();
              cellFunctions();

            }

          });

        });

      });
  </script>

</head>
<body>

    <!--<img class="basket" src="images/socialLinks.png">-->

    <a href="https://open.spotify.com/show/3SHb1fi8gjoe8IRzbRnX2E?si=nZP_ZCkVQbiebb1ew1qdiA&dl_branch=1" target="_blank" rel="noopener noreferrer">
      <img class="spotify" src="images/spotify.png">
    </a>

    <!-------------------------------------------->
    <!---Start of Top Logo and Search Options------>
    <!-------------------------------------------->
    <div class="searchAndLogo">

      <img class="homeImg" src="images/Meander.png">

      <div class="socialButtonsContainer">

        <a href="https://www.instagram.com/theofficialmeander/" target="_blank" rel="noopener noreferrer">
          <div class="socialButtons">
            <ion-icon name="logo-instagram"></ion-icon>
          </div>
        </a>

        <a href="https://twitter.com/OfficialMeander" target="_blank" rel="noopener noreferrer">
          <div class="socialButtons">
            <ion-icon name="logo-twitter"></ion-icon>
          </div>
        </a>

      </div>

      <h1>Podcast Episodes</h1>

      <div class="toptions">

        <div class="srchContainer">
          <input type="text" id="search" name="search" class="srch" onChange="searchList()" placeholder="Search for...">
          <div class="srchIcon">
            <ion-icon name="search"></ion-icon>
          </div>
        </div>

        <select id="filter" class="filter" name="fil" onchange="">
          <option value="new">Newest</option>
          <option value="old">Oldest</option>
        </select>

      </div>
    </div>
    <!-------------------------------------------->
    <!---End of Top Logo and Search Options and Start of Grid with Cells------>
    <!-------------------------------------------->


    <div class="grid">

      <?php

        //require "php/view.php";

       ?>

    </div>

    <!-------------------------------------------->
    <!---End of Grid with Cells and Start of Audio Bar------>
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
    <!---End of Audio Bar and Start of Burger and Volume Bar------>
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

    <!-------------------------------------------->
    <!---End of Burger and Volume Bar------>
    <!-------------------------------------------->

    <!-------------------------------------------->
    <!---Start of background images------>
    <!-------------------------------------------->

    <img class="bgImages basketball" src="images/basketball.png">

    <img class="bgImages football" src="images/football.png">

    <!-------------------------------------------->
    <!---End of background images------>
    <!-------------------------------------------->

    <p class="cpyrght"> &copy; 2021 The Meadner. <p>

    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
    <script src="js/audio.js"></script>
    <script src="js/burger.js"></script>

</body>
</html>
