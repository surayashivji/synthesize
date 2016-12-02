
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

            if(empty($_REQUEST['name'])) {
                echo "<div id='header'>Add a sketch  <a style='color:#82caed' href='sketchadd.php'>here!</a> </div>";
                exit();
            }


            $connection = mysqli_connect("uscitp.com", "jahaberm", "8787266053", "jahaberm_synthesize");

            if(mysqli_connect_errno()) {
                echo "CONNECTION ERROR:" . mysqli_connect_errno();
                exit();
            }


            $sql = "INSERT INTO Sketches " .
                "(name, thumbnail) " . "VALUES " .
                "(" .
                "'" .
                $_REQUEST['name'] .
                "' ," .
                "'" .
                $_REQUEST['thumbnail'] .

                "'" .
                ")";

            $results = mysqli_query($connection, $sql);

            if(!$results) {
                echo "FORM info " . print_r($_REQUEST);
                echo "SQL: " . $sql . "<hr>";
                echo "ERROR: " . mysqli_error($connection);
                exit();
            } else {

                echo "<div id='header'>" .
                    "Thank you so much for adding the sketch, " . $_REQUEST['name'] . "!" . "</div>";


            }


            $path = $_SERVER["DOCUMENT_ROOT"] ."/uploads/". $_FILES['thumbnail']['name'];

            move_uploaded_file($_FILES['thumbnail']['tmp_name'], $path); //(what file you want to move, where do you want to move it to)


            $newfile = "http://jahaberm.student.uscitp.com/uploads/";
            $newfile = $newfile . $_FILES['thumbnail']['name'];

            echo "<br>";

            echo "<div id='logo'><img src='$newfile'></div>";



            ?>






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





