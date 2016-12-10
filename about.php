<?php
session_start();
?>
<html>
<head>
    <title>About</title>

    <link rel="stylesheet" href="styles/about_styles.css">
    <link href="https://fonts.googleapis.com/css?family=Inconsolata" rel="stylesheet">

</head>
<style>
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

    /* Change the link color to #111 (black) on hover */
    li a:hover {
        background-color: #111;
    }

</style>

<body style="background-color: #201d1b;margin:0;
             font-family: 'Letter Gothic Std';
			">

<div id="outercontainer">

    <center>
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


        <div id="aboutTitle" >
            <img src="assets/home/about_title.png"/>
        </div>
        <div id="summary">
            <p>
                Synthesize is where a community of creatives can share, match,
                merge and create visuals with music.

                Synthesize users can create generative art that responds to their
                favorite songs on Soundcloud! Head to match to integrate visuals and sound into one!

            </p>
        </div>
        <div id="teamTitle">
            <img src="assets/home/team_title.png"/>
        </div>

        <div id="teamControl"
        <img src="assets/home/circle.png"/>
        <!--    filler-->
        <img class="team" src="assets/home/monique2.png"/>
        <img class="team" src="assets/home/suraya2.png"/>
        <img class="team" src="assets/home/jamie3.png"/>
</div><!-- close div control -->

</center>


</div><!-- close outercontainer -->
<!---->
<!---->



</body>
</html>