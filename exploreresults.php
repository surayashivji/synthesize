<?php
session_start();
?>


<?php

if (empty($_REQUEST["orderby"])) {
    $_REQUEST["orderby"] = "firstname";
}
?>


<html>
<head>
    <title>Home</title>
    <link rel="icon" type="image/png" href="favicon.png">

    <link href="https://fonts.googleapis.com/css?family=Inconsolata" rel="stylesheet">
    <link rel="stylesheet" href="styles/explore_styles.css">
    <script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-93512293-1', 'auto');
  ga('send', 'pageview');

</script>
</head>

<style>
    #exploreTitle img {width:575px;
        /*margin-left: 730px;*/
        margin-top:40px;}

    #return {color: #82caed;}

    .records a {color: #82caed;
            text-decoration: none;
            cursor:pointer;
    }

    .records a {color: #82caed;
        text-decoration: none;
        cursor:pointer;

    }

    .firstname a {color: #82caed;
        text-decoration: none;
        cursor:pointer;

    }


    .firstname a:hover {color: #82caed;
        text-decoration: none;
        cursor:pointer;
        font-style: italic;
    }




</style>
<body style="background-color: #201d1b;margin:0;
             font-family: 'Letter Gothic Std';
             color: #82caed;
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

        <div id="explore">

            <div id="exploreTitle">
                <img src="assets/home/exploreresults_title.png"/>
            </div>

            </div>


            </head>

        <br>

            <div id="container" >


                <?php

                $conn = mysqli_connect("uscitp.com", "jahaberm", "8787266053", "jahaberm_synthesize");

                if(mysqli_connect_errno()) {
                    echo "Failed to connect to mySql: " . mysqli_connect_errno();
                    exit();
                }

                $sql = 		"SELECT * FROM User WHERE firstname LIKE '%" .
                    $_REQUEST['firstname'] . "%' OR lastname LIKE '%" .
            $_REQUEST['firstname'] . "%' OR email LIKE '%" .
                $_REQUEST['firstname'] . "%' OR username LIKE '%" .
                $_REQUEST['firstname'] . "%'";

                $results = mysqli_query($conn, $sql);

                if(!$results) {
                    echo "Your SQL: " . $sql . "<br><br>";
                    echo "SQL Error: " . mysqli_error($conn);
                    exit();
                }


                echo "<div id='return'><em>Your results returned <strong>" . mysqli_num_rows($results) . "</strong> results.</em></div>";
                echo "<br><br>";

                if(empty($_REQUEST["start"]))
                { $start=1; }
                else
                { $start = $_REQUEST["start"]; }

                $end = $start + 2;

                if (mysqli_num_rows($results) < $end)
                { $end = mysqli_num_rows($results); }

                $counter = $start;

                mysqli_data_seek($results,$start-1);


                $searchstring = "&firstname=" . $_REQUEST["firstname"] .
                    "&lastname=" . $_REQUEST["lastname"] .
                    "&email=" . $_REQUEST["email"] .
                    "&username=" . $_REQUEST["username"];


                if($start != 1) {
                    echo "<div class='records'><a href='exploreresults.php?start=" . ($start - 2) . $searchstring .
                        "'>Previous Records | </a></div>";
                }

                if($end < mysqli_num_rows($results)) {
                    echo "<div class='records'><a href='exploreresults.php?start=" . ($start + 2) . $searchstring .
                        "'>Next Records</a></div>";
                }

                echo "<br><br>";

                while ($currentrow = mysqli_fetch_array($results)) {
                    echo "<div class='firstname'><strong>" .
                        $counter . ") " .
                        "<a href='synthesize_home.php?recordid=" .
                        $currentrow['user_id'] .
                        "'>" .
                        $currentrow['firstname'] . " ". $currentrow['lastname'] . " ".
                        $currentrow['email'] . " ". $currentrow['username'] .
                        "</a></strong>".

                        "<div class='link''>" . "  " . "</div>"  .
                        "<br style='clear:both;'>";
                    if($counter==$end) {
                        break; }

                    $counter++;

                }
                ?>



            </div>



            </div>
        </div>

    </center>

</div>

</body>
</html>
