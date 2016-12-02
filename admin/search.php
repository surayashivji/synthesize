<?php
session_start();
?>
<html>
<head>
    <title></title>

    <link href="https://fonts.googleapis.com/css?family=Inconsolata" rel="stylesheet">


    <link href="styles/adminstyles.css" rel="stylesheet">

    <style>
/*        NAV   */

/*#nav ul {*/
    /*font-family: 'Letter Gothic Std';*/
    /*list-style-type: none;*/
    /*margin: 0;*/
    /*padding: 0;*/
    /*overflow: hidden;*/

/*}*/

/*li {*/
    /*float: left;*/
/*}*/

/*li a {*/
    /*display: block;*/
    /*color: white;*/
    /*text-align: center;*/
    /*padding: 14px 16px;*/
    /*text-decoration: none;*/
/*}*/

/*li a:hover {*/
    /*background-color: #111;*/
/*}*/

    </style>

</head>


<body style="background-color: #201d1b;
             font-family: 'Letter Gothic Std';
			">


<!--<ul>-->
<!--    <li><a href="synthesize_home.php">Home</a></li>-->
<!--    <li><a href="synthesize_home.php">Profile</a></li>-->
<!--    <li><a href="match.php">Match</a></li>-->
<!--    <li><a href="explore.php">Explore</a></li>-->
<!--    <li><a href="admin/search.php">Admin</a></li>-->
<!--</ul>-->

<center>

    <div id="outercontainer">


        <div id="mainHead">

            <div id="masthead">
                <img src="main_logo.png"/>
            </div>

        <div id="header">

            Welcome Admin,
            Let's make some changes!
            <br><br>
</div>
            <div id="button"><a href='allusers.php' style=" padding:10px; border:1px white solid;">Users</a><a  style="border:1px white solid; padding:10px;margin-left:5px;" href='allsketches.php'>Sketches</a></div>





    </div><!-- close outercontainer -->
    <!---->
    <!---->


    <?php
    //
    //session_start();
    //
    //if ($_SESSION['loggedin'] == 'yes'){
    //    include "synthesize.php";
    //} else {
    //
    //    if (empty($_REQUEST['username']) || empty($_REQUEST['password'])) {
    //        echo "<form action ='login2.php' method='post'> Username: <input id='user' type='text' name='username'> Password: <input id='pass' type='text' name='password'><input type='submit'></form>";
    //        exit();
    //    }
    //
    //
    //    // LATER: FOR SECURITY
    //    // require_once('db_credentials.php');
    //    // $conn = mysqli_connect(DB_SERVER, DB_USER, DB_PASS, DB_NAME);
    //    $conn = mysqli_connect("uscitp.com", "jahaberm", "8787266053", "jahaberm_synthesize");
    //
    //    if (mysqli_connect_errno()) {
    //        echo "Failed to connect to mySql: " . mysqli_connect_errno();
    //        exit();
    //    }
    //    $myusername = mysqli_real_escape_string($conn, $_POST['username']);
    //    $mypassword = mysqli_real_escape_string($conn, $_POST['password']);
    //
    //    $sql = "SELECT user_id FROM User WHERE username = '$myusername' and password = '$mypassword'";
    ////    echo $sql;
    //    $results = mysqli_query($conn, $sql);
    //
    ////    echo mysqli_num_rows($results);
    //
    //
    //    if (!$results) {
    //        echo "SQL error " . mysqli_error($conn);
    //    }
    //
    //    if (mysqli_num_rows($results) == 1) {
    //        $_SESSION['loggedin'] = 'yes';
    //        include "synthesize.php";
    //    } else{
    //        echo "<form action ='login2.php' method='post'> Username: <input type='text' name='username'> Password: <input type='text' name='password'>
    //<input type='submit'></form>";
    //        exit();
    //    }
    //}
    //
    //?>
</center>
</body>
</html>




