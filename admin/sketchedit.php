
<html>
<head>
    <title></title>

    <link href="https://fonts.googleapis.com/css?family=Inconsolata" rel="stylesheet">


    <link href="styles/adminstyles.css" rel="stylesheet">

</head>


<body style="background-color: #201d1b;
             font-family: 'Letter Gothic Std';
			">
<a href="allsketches.php"><img src = "assets/back-04.png" id="back"></a>

<center>

    <div id="outercontainer">


        <div id="mainHead">
            <div id="logo">
                <img src="main_logo.png"/>
            </div>


            <?php

            //step 1 check if its empty
            if(empty($_REQUEST['id'])){

                echo "<span id='header'>You reached this page in error </span>";
                exit();
            }

            //step 2 creat a connection
            $conn = mysqli_connect("uscitp.com", "jahaberm", "8787266053", "jahaberm_synthesize");

            if(mysqli_connect_errno()) {
                echo "Failed to connect to mySql: " . mysqli_connect_errno();
                exit();
            }

            //step 3 make a query - connect to the id in results page
            $recordsql = "SELECT * FROM Sketches";


            //grab results for both sql statements
            $results = mysqli_query($conn, $recordsql);
            if(!$results) {
                echo "Your SQL: " . $recordsql . "<br><br>";
                echo "SQL Error: " . mysqli_error($conn);
                exit();
            }


            //grab one row and store it in record info
            $recordinfo = mysqli_fetch_array($results);

            ?>

            <!-- make a form -->
            <form action="sketchupdate.php">

                <!--    put title in the textbox so they can edit it right there-->
                <span id='header'> Edit sketch name:</span>
                <input type="text" value="<?php echo  $recordinfo['name'];?>" name="name">

                </input>

                <br>
                <input id="button" style="color:white; background-color:#82caed;" type= 'submit'>


                <input type='hidden' name='id' value='<?php echo $recordinfo['id_sketch'];?>'/>



            </form>





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





