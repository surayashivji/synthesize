<?php
session_start();

?>
<html>
<head>
    <title>Synthesize</title>
    <link rel="icon" type="image/png" href="favicon.png">

    <link href="https://fonts.googleapis.com/css?family=Inconsolata" rel="stylesheet">
    <link rel="stylesheet" href="styles/signup_styles.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/processing.js/1.6.3/processing.js"></script>
    <script type="text/javascript" src="processing.js"></script>

</head>

<style>
    #signupTitle img {width:250px;
        /*margin-left: 730px;*/
        margin-top:10px;}
    #canvass{

        overflow: hidden;
        width:100%;
        border:none;
        height:800px;
        position:absolute;
        z-index:-1;


    }

</style>


<body style="background-color: #201d1b;
             font-family: 'Letter Gothic Std';
             color: #82caed; margin:0;
			">
<canvas id="canvass" data-processing-sources="portfoliobg.pde" >

</canvas>

<center>

    <div id="outercontainer">

        <div id="mainHead">
        </div><!-- close mainHead -->

        <div id="credits">
            <p>Created by <strong><span style="width: 170px;">synthesizegeek</span></strong></p>

        </div>

    </div>

</center>

<?php

$conn = mysqli_connect("uscitp.com","jahaberm","8787266053", "jahaberm_synthesize");

if(mysqli_connect_errno()) {
    echo "Failed to connect to mySql: " . mysqli_connect_errno();
    exit();
}
?>

<center>

    <br><br><br><br>

    <div id="signupTitle">
        <img src="assets/home/signup_title.png"/>
    </div>

    <br>

    <form action="insertuser.php" method = "post" enctype="multipart/form-data">
    Upload a profile picture!

        <br><br>

    <input type="file" name="thefile">
    <br><br>
        <div id="parameters">
    <!-- we will create registration.php after registration.html -->
    First Name:<input class="bar" type="text" name="firstname" value=""></br></br>
    Last Name:<input class="bar" type="text" name="lastname" value=""></br></br>
    Email:<input class="bar" type="text" name="email" value=""></br></br>
    Username:<input class="bar" type="text" name="username" value=""></br></br>
    Password:<input class="bar" type="password" name="password" value=""></br></br>
            </div><!-- close parameters -->

    <input id='submit' type='submit' value="Sign Up!"></form>
</form>

</center>

</body>
</head>
</html>