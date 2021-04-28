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
  <script src="js/audio.js"></script>

</head>
<body>

  <div class="home">

    <img class="homeImg" src="images/Meander.png">

    <div class="options">
      <h1>Podcast Episodes</h1>
      <input type="text" id="search" onkeyup="" placeholder="Search for...">
      <select class="filter" name="fil">
        <option value="new">Newest</option>
        <option value="old">Oldest</option>
      </select>
    </div>

    <div class="grid">

      <div class="cell">
        <h3>Episode 1</h3>
        <div class="aud">
          <img src="images/small.png">
          <input type="range" min="0" step="1" onchange="">
          <div>
            <div class="currentTime" id="currentTime">00:00</div>
            <div class="duration" id="duration">00:00</div>
          </div>
          <img src="" alt="Next">
          <img src="" alt="Previous">
        </div>
      </div>

    </div>

  </div>

</body>
</html>
