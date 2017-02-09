<?php
session_start();
?>
<html>
<head>
    <title>Synthesize</title>
    <link rel="icon" type="image/png" href="favicon.png">

    <link href="https://fonts.googleapis.com/css?family=Inconsolata" rel="stylesheet">
   <script src="https://cdnjs.cloudflare.com/ajax/libs/processing.js/1.6.3/processing.min.js"></script>
    <link rel="stylesheet" href="styles/synthesize_11_21_styles.css">


</head>

<style>
    #canvass{
        overflow: hidden;
        width:100%;
        height:100%;
        border:none;
        background-size: cover;

        /*height:100%;*/
}


#canvass canvas {
  min-height: 100%;
  min-width: 100%;
}
    #masthead img{
      width:65%;
    }

    #mobile-message {
      text-align: center;
      width:30%;
      color:#82caed;
      font-size: 15px;
      margin-top:50px
    }

</style>

<body style="background-color: #201d1b;
             font-family: 'Letter Gothic Std'; margin:0;">
<center>
    <div id="outercontainer" style=" top:-100px;position:absolute; position: absolute; height:10px;
margin-left: auto;
margin-right: auto;
left: 0;
right: 0;
">
        <div id="mainHead" style=" height:10px;">
            <div id="masthead" >
                <img id="logo" src="assets/home/main_logo.png"/>
            </div>
            <?php
            require_once 'vendor/mobiledetect/mobiledetectlib/Mobile_Detect.php';
            $detect = new Mobile_Detect;

            if ($detect->isMobile() || $detect->isTablet()) {
              // on mobile / tablet device
              if ($_SESSION['loggedin'] == 'yes') {
                  // already logged in, show logout button
                  echo "<div id='logIn'>
                      <p style='color:#fff'>logout</p>
                  </div>";
              } else {
                echo "<div id='logIn'>
                      <p>login</p>
                  </div>
                  <div id='signUp'>
                      <p>sign up</p>
                    </div>";
              }
              echo "<p id='mobile-message'> We're sorry! Synthesize3D's audio and graphic experiences aren't supported by mobile devices. Come back and vibe on a computer!</p>";
            } else {
              if ($_SESSION['loggedin'] == 'yes') {
                  // already logged in, show logout button
                  echo "<div id='logIn'>
                      <p><a href='logout.php'>logout</a></p>
                  </div>";
              } else {
                  // not logged in, show login
                echo "<div id='logIn'>
                      <p><a href='login2.php'>login</a></p>
                  </div>
                  <div id='signUp'>
                        <a href='signup.php' ><p>sign up</p></a>
                    </div>";
              }
            }
            ?>
        </div>
        <div id="credits">
            <p>Created by <strong><span style="width: 170px;">synthesizegeek</span></strong></p>
        </div>
    </div>
    <canvas id="canvass" data-processing-sources="portfoliobg.pde" >
    </canvas>
</center>
</body>
</html>
