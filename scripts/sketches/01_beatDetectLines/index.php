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
            if ($_SESSION['loggedin'] == 'yes'){
                // already logged in, show logout button
                ?>
                <div id="logIn" style="">
                    <p><a href='logout.php'>logout</a></p>
                </div>

            <?php
            } else {
                // not logged in, show login
                ?>
                <div id="logIn" style="">
                    <p><a href='login2.php'>login</a></p>
                </div>
            <?php
            }
            ?>



            <div id="signUp">
                <a href="signup.php" ><p>sign up</p></a>
            </div>
        </div><!-- close mainHead -->

        <div id="credits">
            <p>Created by <strong><span style="width: 170px;">synthesizegeek</span></strong></p>
        </div>

    </div>

    <canvas id="canvass" data-processing-sources="portfoliobg.pde" >

    </canvas>
</center>
</body>
</html>
