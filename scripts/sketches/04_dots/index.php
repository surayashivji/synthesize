<?php session_start();
$localURL = $_SESSION['sessionURL'];
//echo $localURL;
?>
<html lang="en">
<head>
  <meta charset="utf-8"/>
  <script language="javascript" type="text/javascript" src="../../P5/p5.min.js"></script>
  <script language="javascript" type="text/javascript" src="../../P5/p5.sound.js"></script>
  <script language="javascript" type="text/javascript" src="../../P5/p5.dom.js"></script>
  <!-- Soundcloud streaming -->
  <script src='https://connect.soundcloud.com/sdk/sdk-3.0.0.js'></script>

  <script>var sc = "<?php echo $localURL; ?>";</script>

  <script language="javascript" type="text/javascript" src="sketch.js"></script>

  <script language="javascript" type="text/javascript" src="../../P5/helpers.js"></script>
  <style>
    body {
      margin: 0;
      padding: 0;
    }
    .temp-back img {
      width: 20%;
      margin: 10px 00px 0px 15px;
      position: absolute;
      z-index: 200;
    }
    .temp-back img:hover {
      width: 22%;

    }
    #save p {
      width:150px;
      /*position:relative;*/
      /*top: 200px;*/
      /*margin-left: 900px;*/
      position:absolute;
      left:25px;
      top:-15px;
      font-family: 'Letter Gothic Std';
      color: white;
      font-size: 20pt;
      text-align:center;
      /*padding-top:4px;*/
      opacity:0.6;
    }

    #save p:hover {

      font-style: italic;

    }

    #save a {text-decoration: none;
      color:#82caed;}
    #wrap{
      background: lightpink;
      border-radius:10px;
      width:150px;
      height:50px;
      position:absolute;
      top:10px;
      z-index:100;
      left:10px;
    }
  </style>

</head>
<body>
<div id="wrap">
  <a class="temp-back" href="../../../match.php"><img src = "../../../admin/assets/back-04.png"></a>
  <a   id="save" onclick="document.write('<?php echo saveSketchToProfile(); ?>')"><p id="save">Save</p></a>
</div>
<?php

//$userID = $currentUserID; // get user ID from the user that's logged in
//$url = $localURL;


//function alert($msg) {
//    echo "<script type='text/javascript'>alert('" . $msg . "');</script>";
//}


function saveSketchToProfile()
{

  $url = $_SESSION['sessionURL'];

  $userID = $_SESSION['sessionUserID'];

  $sketchID = 4;

  $connection = mysqli_connect("uscitp.com", "jahaberm", "8787266053", "jahaberm_synthesize");


  if(mysqli_connect_errno()) {
    echo "CONNECTION ERROR:" . mysqli_connect_errno();
    exit();
  }

//$sql .= "(user_id, url, sketch_id) " . "VALUES " . "(";
//echo $userID;

  $sql = "INSERT INTO FavoriteSketches " .
      "(user_id, url, sketch_id) " .
      "VALUES " .
      "(" .
      "'" .
      $userID .
      "', " .

      "'" .
      $url .
      "', " .

      "'" .
      $sketchID .
      "'" .

      ")";

//echo "SQL: ";
//echo $sql;

  $results = mysqli_query($connection, $sql);

  if (!$results) {
    echo "(failed) SQL: " . $sql;
    exit();
  }


//    alert("Dope save! Check out your profile to see your new tune.");
  echo "Dope Save! Check out your profile to see your tune.";
//    header('LOCATION: synthesize_home.php');

//    ob_end_flush();
//    header( "refresh:2; url=synthesize.php" );
//    exit();

//    include "synthesize_home.php";
//    echo  "PART 2";
}


?>
</body>
</html>

