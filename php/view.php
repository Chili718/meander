<?php

require 'dbCON.php';

if (!$con) {
  echo "<h2 class='err'>Oops might be the internet or me!</h2>";
}
else
{

  $table  = "podcasts";
  $result = $con->query("SELECT * FROM $table ORDER BY date DESC");
  $print = "";

  if (mysqli_num_rows($result)!=0) {

    while($data = $result->fetch_assoc()){

      //print_r($data);

      $print .= "<div class='cell'><img class='logo' src='images/small.png'><p hidden>".$data["path"]."</p><div>";
      $print .= "<h3>".$data["title"]."</h3><p>".$data["description"]."</p></div></div>";
      //echo "<div><img src = ".$data["path"]."><h2>".$data["name"]."</h2></div>";
    }

  }else{

    $print = "<h2 class='err'>Looks like its the internet!!!!</h2>";

  }

  echo $print;

  $con->close();

}

 ?>
