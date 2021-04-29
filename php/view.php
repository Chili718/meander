<?php

require 'dbCON.php';

if (!$con) {
  echo "<h2 class='err'>Oops might be the internet or me!</h2>";
}
else
{

  $table  = "photoshopwork";
  $result = $con->query("SELECT * FROM $table ORDER BY id LIMIT 20");

  if (mysqli_num_rows($result)!=0) {

    while($data = $result->fetch_assoc()){

      //print_r($data);

      $minPath = substr_replace($data['path'], "Min", strripos($data['path'],"."),0);

      $minPath = substr_replace($minPath, "/min", strripos($minPath,"/"),0);

      echo "<div><h2>".$data["name"]."</h2><img class='psW' src = ".$minPath."></div>";
      //echo "<div><img src = ".$data["path"]."><h2>".$data["name"]."</h2></div>";
    }

  }else{

    echo "<h2 class='err'>Looks like there are no images!</h2>";

  }

  $con->close();

}

 ?>
