<!DOCTYPE html>
<html>
<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <title>The Meanders Podcast - Official Site</title>

  <link rel="stylesheet" href="css/mainPage.css">

  <link rel="stylesheet" href="https://use.typekit.net/bft1kct.css">

  <!-- jQuery -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>

</head>
<body>

  <div class="home">

    <img class="homeImg" src="images/Meander.png">


    <div class="options">
      <div class="toptions">
        <h1>Podcast Episodes</h1>
        <select class="filter" name="fil">
          <option value="new">Newest</option>
          <option value="old">Oldest</option>
        </select>
      </div>
      <input type="text" id="search" onkeyup="" placeholder="Search for...">
    </div>


    <div class="grid">

      <div class="cell">
        <img class="logo" src="images/small.png">
        <h3>Meander No. 14 - NBA Allstar Recap/ Black Griffin to the nets/ Atlanta hawks future ft. Dylan Matthews</h3>
      </div>

      <div class="cell">
        <img class="logo" src="images/small.png">
        <h3>Meander No. 14 - NBA Allstar Recap/ Black Griffin to the nets/ Atlanta hawks future ft. Dylan Matthews</h3>
      </div>

      <div class="cell">
        <img class="logo" src="images/small.png">
        <h3>Meander No. 14 - NBA Allstar Recap/ Black Griffin to the nets/ Atlanta hawks future ft. Dylan Matthews</h3>
      </div>

      <div class="cell">
        <img class="logo" src="images/small.png">
        <h3>Meander No. 14 - NBA Allstar Recap/ Black Griffin to the nets/ Atlanta hawks future ft. Dylan Matthews</h3>
      </div>

      <div class="cell">
        <img class="logo" src="images/small.png">
        <h3>Meander No. 14 - NBA Allstar Recap/ Black Griffin to the nets/ Atlanta hawks future ft. Dylan Matthews</h3>
      </div>

      <div class="cell">
        <img class="logo" src="images/small.png">
        <h3>Meander No. 14 - NBA Allstar Recap/ Black Griffin to the nets/ Atlanta hawks future ft. Dylan Matthews</h3>
      </div>

      <div class="cell">
        <img class="logo" src="images/small.png">
        <h3>Meander No. 14 - NBA Allstar Recap/ Black Griffin to the nets/ Atlanta hawks future ft. Dylan Matthews</h3>
      </div>


    </div>

    <!-------------------------------------------->
    <!---Start of Audio Bar------>
    <!-------------------------------------------->
    <div class="audioBar">

      <audio src="podcasts/one.mp3" preload="metadata" onended="finished()"></audio>

      <h3>Title</h3>

      <div class="tb">

        <img src="images/previous.png" class="previous">

        <div class="time">

          <div class="currentTime" id="currentTime">0:00</div>

          <input type="range" value="0" min="0" step="1" onchange="">

          <div class="duration" id="duration">00:00</div>

        </div>

        <img src="images/next.png" class="next">
        
      </div>

    </div>

    <div class="burger">
      <div class="line1"></div>
      <div class="line2"></div>
    </div>

    <!-------------------------------------------->
    <!---End of Audio Bar------>
    <!---<script src="js/audio.js"></script>

    ---------------------->

  </div>

  <script src="js/burger.js"></script>

</body>
</html>
