<?php session_start();
$localURL = $_SESSION['sessionURL'];
//echo $localURL;
?>
<html lang="en">
<head>
<link rel="icon" type="image/png" href="../../../favicon.png">
    <meta charset="utf-8"/>
    <script language="javascript" type="text/javascript" src="../../P5/p5.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/p5.js/0.5.6/addons/p5.sound.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/p5.js/0.5.6/addons/p5.dom.min.js"></script>
    <script src='https://connect.soundcloud.com/sdk/sdk-3.0.0.js'></script>
    <script>var sc = "<?php echo $localURL; ?>";</script>
    <link rel="stylesheet" href="../../../styles/loader.css">
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
            position:absolute;
            left:25px;
            top:-15px;
            font-family: 'Letter Gothic Std';
            color: white;
            font-size: 20pt;
            text-align:center;
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
    <script>
      (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
      (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
      m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
      })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

      ga('create', 'UA-93512293-1', 'auto');
      ga('send', 'pageview');

    </script>
</head>
<body>
    <div class="loader">
  <div class="loader-inner">
    <div class="loader-line-wrap">
      <div class="loader-line"></div>
    </div>
    <div class="loader-line-wrap">
      <div class="loader-line"></div>
    </div>
    <div class="loader-line-wrap">
      <div class="loader-line"></div>
    </div>
    <div class="loader-line-wrap">
      <div class="loader-line"></div>
    </div>
    <div class="loader-line-wrap">
      <div class="loader-line"></div>
    </div>
  </div>
  </div>
<div id="wrap">
    <a class="temp-back" href="../../../match.php"><img src = "../../../admin/assets/back-04.png"></a>
    <a   id="save" onclick="document.write('<?php echo saveSketchToProfile(); ?>')"><p id="save">Save</p></a>
</div>
<?php

function saveSketchToProfile()
{
    $url = $_SESSION['sessionURL'];
    $userID = $_SESSION['sessionUserID'];
    $sketchID = 2;
    $connection = mysqli_connect("uscitp.com", "jahaberm", "8787266053", "jahaberm_synthesize");
    if(mysqli_connect_errno()) {
        echo "CONNECTION ERROR:" . mysqli_connect_errno();
        exit();
    }
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
    $results = mysqli_query($connection, $sql);
    if (!$results) {
        echo "(failed) SQL: " . $sql;
        exit();
    }
    echo "Dope Save! Check out your profile to see your tune.";
}
?>
</body>
</html>
