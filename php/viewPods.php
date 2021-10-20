<?php
/*

PHP file for obtaining all of the podcasts data in the db and
outputting them into a the format to be displayed on the homepage

*/

//header("Set-Cookie: cname=cvalue; SameSite=none; Secure");

require 'dbCON.php';
//checking for a successful db connection
if (!$con) {
  echo "dbf";
}
else
{
  //checking if a filter is set just in case
  if(isset($_POST['filter'])){

    $table  = "podcasts";
    //depeding on the filter 'new' or 'old' will choose the ascending or descending order
    if($_POST['filter'] == 'old')
    {
      $result = $con->query("SELECT title, path, ytEmbed, DATE_FORMAT(date, '%e %M, %Y') as d, description FROM $table ORDER BY date ASC");
    }
    else
    {
      $result = $con->query("SELECT title, path, ytEmbed, DATE_FORMAT(date, '%e %M, %Y') as d, description FROM $table ORDER BY date DESC");
    }

    $print = "";

    if (mysqli_num_rows($result)!=0) {
      //create each podcasts cell and append it to the string that will be dumped on the page
      while($data = $result->fetch_assoc()){

        //create the youtube video path from the embed string
        $src = "https://www.youtube.com/embed/";
        $src = $src . $data["ytEmbed"];
        //create the individual cell from all the data relating to the podcast
        $print .= "<div class='cell'>

          <div class='cellYou'>
            <div>
            <p>YouTube</p>
            <img src='images/youVid.png'>
            </div>
          </div>
          <div class='videoWrapper hideVid'>
          <iframe src='".$src."' class='cellVid' allowfullscreen></iframe>
          </div>
          <div class='innerCell'>

            <img class='logo' src='images/small.png'>

            <p hidden>".$data["path"]."</p>
            <div class='info'>
              <h3 class='title'>".$data["title"]."</h3>
              <h3 class='dte'>".$data["d"]."</h3>
              <p class='description'>".$data["description"]."</p>
            </div>

          </div>

        </div>";
        //echo "<div><img src = ".$data["path"]."><h2>".$data["name"]."</h2></div>";
      }

  }

  }else{

    $print = "<h3 id='errorTxt'>Looks like its the internet!!!!</h3>";

  }
  //print the string containing all the cells on the homepage
  echo $print;

  $con->close();

}

 ?>
