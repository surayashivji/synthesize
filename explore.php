<?php
session_start();
?>
<html>
<head>
    <title>Home</title>
    <link rel="icon" type="image/png" href="favicon.png">

    <link rel="stylesheet" href="styles/synthesize_11_21_styles.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/processing.js/1.6.3/processing.min.js"></script>
    <link href="https://fonts.googleapis.com/css?family=Inconsolata" rel="stylesheet">
    <link rel="stylesheet" href="styles/explore_styles.css">
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

    #explore {margin-top: 50px;}

    #exploreTitle img {width:250px;
        /*margin-left: 730px;*/
        margin-top:40px;}

    #exploreBar {width:250px;
        height: 30px;
        opacity:0.8;
        border: 1px solid #82caed;
        background:none;
        font-family: 'Letter Gothic Std';
        font-size: 12pt;
        padding: 2px;
        color: #82caed;
        padding-left: 7px;}

    #searchUsers {width: 150px;
        height: 30px;
        border: none;
        background:none;
        font-family: 'Letter Gothic Std';
        font-size: 12pt;
        padding: 2px;
        color: #82caed;
        /*margin-left:930px;*/
        opacity: 0.7;
    }

    #searchUsers:hover {width: 150px;
        height: 30px;
        border: none;
        background:none;
        font-family: 'Letter Gothic Std';
        font-size: 12pt;
        padding: 2px;
        color: #82caed;
        cursor:pointer;
        font-style: italic;
        opacity: 1;
    }

</style>

<body style="background-color: #201d1b; margin:0;
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
                    echo "<li><a href='logout.php'>Logout</a></li>";
                } else {
                    echo "<li><a href='login2.php'>Login</a></li>";
                }
                ?>
            </ul>
        </div>

        <div id="explore">

            <div id="container">
                <div id="exploreTitle">
                    <img src="assets/home/explore_title.png"/>
                </div>
                <?php

                $conn = mysqli_connect("uscitp.com", "jahaberm", "8787266053", "jahaberm_synthesize");

                if(mysqli_connect_errno()) {
                    echo "Failed to connect to mySql: " . mysqli_connect_errno();
                    exit();
                }

                ?>

                <br>

                <form action="exploreresults.php">
                   <input id="exploreBar" type="text" name="firstname" value=""></br>

                    <br style="clear:both;">

                    <br style="clear:both;">
                    <div style="text-align:center;"><input id="searchUsers" type="submit" value="Search users" ></div>

            </form>

            </div>
        </div>

    </center>

</div>

</body>
</html>
