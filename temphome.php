<?php
session_start();
?>

<html>
<head>
    <title>Synthesize</title>
    <link rel="icon" type="image/png" href="favicon.png">

    <link href="https://fonts.googleapis.com/css?family=Inconsolata" rel="stylesheet">
    <link rel="stylesheet" href="styles/synthesize_11_21_styles.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/processing.js/1.6.3/processing.js"></script>

</head>
<style>
    #canvass{
        overflow: hidden;
        width:100%;
        border:none;
        height:100%;
        position:absolute;
        z-index:-1;
    }
    #nav ul {
        font-family: 'Letter Gothic Std';
        list-style-type: none;
        margin: 0;
        padding: 0;
        overflow: hidden;
    }

    li {
        float: left;
    }

    li a {
        display: block;
        color: white;
        text-align: center;
        padding: 14px 16px;
        text-decoration: none;
    }

    li a:hover {
        background-color: #111;
    }


</style>

<body style="background-color: #201d1b; margin:0;
             font-family: 'Letter Gothic Std';">
             <canvas id="canvass" data-processing-sources="portfoliobg.pde" >
             </canvas>
<div id="nav">
<ul>
    <li><a href="temphome.php">Home</a></li>
    <li><a href="match.php">Match</a></li>
    <li><a href="synthesize_home.php">Profile</a></li>

    <li><a href="explore.php">Explore</a></li>
    <li><a href="about.php">About</a></li>
    <?php
    if($_SESSION['admin'] == "yes") {
        echo "<li><a href='admin/search.php'>Admin</a></li>";
    }

    ?>

    <?php

    if($_SESSION["loggedin"] == "yes") {
        echo "<li><a href='logout.php'>Logout</a></li>";
    } else {
        echo "<li><a href='login2.php'>Login</a></li>";
    }

    ?>

</ul>
    </div>

<center>
    <div style="margin-top:-110px;">
    <div id="outercontainer">
        <div id="mainHead">
            <div id="masthead">
                <img src="assets/home/main_logo.png"/>
            </div>

        </div><!-- close mainHead -->

        <div id="credits">
            <p>Created by <strong><span style="width: 170px;">synthesizegeek</span></strong></p>
        </div>
    </div>
    </div>

</center>
</body>
</html>
