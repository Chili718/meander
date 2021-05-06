<?php

require 'dbCON.php';

if (!$con) {
  echo "<h2 class='err'>Oops might be the internet or me!</h2>";
}
else
{

  $table  = "podcasts";
  $result = $con->query("SELECT title, path, ytEmbed, DATE_FORMAT(date, '%e %M, %Y') as d, description FROM $table ORDER BY date DESC");
  $print = "";

  if (mysqli_num_rows($result)!=0) {

    while($data = $result->fetch_assoc()){

      //print_r($data);
      $src = "https://www.youtube.com/embed/";
      $src = $src . $data["ytEmbed"];

      $print .= "<div class='cell'>

        <div class='cellYou'>
          <p>YouTube</p>
          <img src='images/youVid.png'>
        </div>

        <iframe src='".$src."' class='cellVid hideVid' allowfullscreen></iframe>

        <div class='innerCell'>

          <img class='logo' src='images/small.png'>

          <p hidden>".$data["path"]."</p>
          <div>
            <h3>".$data["title"]."</h3>
            <h3 class='dte'>".$data["d"]."</h3>
            <p>".$data["description"]."</p>
          </div>

        </div>

      </div>";
      //echo "<div><img src = ".$data["path"]."><h2>".$data["name"]."</h2></div>";
    }

  }else{

    $print = "<h2 class='err'>Looks like its the internet!!!!</h2>";

  }

  echo $print;

  $con->close();

}

 ?>
