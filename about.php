<?php
session_start();
?>
<html>
<head>
    <title>About</title>
    <link rel="icon" type="image/png" href="favicon.png">

    <link rel="stylesheet" href="styles/about_styles.css">
    <link href="https://fonts.googleapis.com/css?family=Inconsolata" rel="stylesheet">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/processing.js/1.6.3/processing.min.js"></script>
    <link rel="stylesheet" href="styles/synthesize_11_21_styles.css">

</head>
<style>
    #nav ul {
        font-family: 'Letter Gothic Std';
        list-style-type: none;
        margin: 0;
        padding: 0;
        overflow: hiddenl;
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

    #canvass{
        overflow: hidden;
        width:100%;
        border:none;
        height:100%;
        position:absolute;
        z-index:-1;
    }


</style>

<body style="background-color: #201d1b;margin:0;
             font-family: 'Letter Gothic Std';">
             <canvas id="canvass" data-processing-sources="portfoliobg.pde" >
             </canvas>
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
                    // echo "<li><a href='logout.php'>Logout</a></li>";
                } else {
                    echo "<li><a href='login2.php'>Login</a></li><br>";
                }
                ?>
            </ul>
        </div>
</center>

<br>
<center>
        <div id="teamTitle">
            <img id="teamTitle" src="assets/home/about_title.png"/>
        </div>


        <div id="summary">
            <p>
                Hello. <br><br>
                Welcome to Synthesize3D, where you can share, match,
                merge and create visuals with music.
                <br><br> Grab the link to your favorite song on SoundCloud and watch as our visuals respond to the music.
                <br><br> Head to <strong> match </strong> to try it out!
                <br><br> -SynthesizeGeek
            </p>

        </div>

</center>

</div><!-- close outercontainer -->
<!---->
<!---->
</body>
</html>
