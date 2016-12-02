<?php
session_start();
?>

<html>
<head>
    <title>Synthesize</title>

    <link href="https://fonts.googleapis.com/css?family=Inconsolata" rel="stylesheet">
    <link rel="stylesheet" href="styles/synthesize_home_styles.css">
</head>
<style>


    @font-face {
        font-family: 'Letter Gothic Std';
        src: url(admin/fonts/LetterGothicStd.otf);
    }


    @font-face {
        font-family: 'Letter Gothic Std';
        src: url(admin/fonts/LetterGothicStd.otf);
    }

    body p {font-family: 'Letter Gothic Std';}

    div {
        font-family: 'Letter Gothic Std';
    }


    #masthead img {
        width: 600px;
        margin-top: 370px;
        margin-left: 2%;
    }



    #logIn p {
        width:150px;
        margin-left: 40px;
        font-family: 'Letter Gothic Std';
        color: #82caed;
        font-size: 13pt;
        text-align:center;
        padding-top:4px;
        opacity:0.7;}

    #logIn p:hover {
        width:150px;
        top: 200px;
        margin-left: 40px;
        font-family: 'Letter Gothic Std';
        color: #82caed;
        font-size: 13pt;
        text-align:center;
        padding-top:4px;
        cursor: pointer;
        font-style: italic;
        opacity: 1;
    }

    #logIn a {
        text-decoration: none;
        color:#82caed;
    }



    #credits p {
        width: 130px;
        cursor: pointer;
        position: fixed;
        right: 15;
        bottom: 10px;
        margin: 0;
        padding: 0;
        opacity: .7;
        font-family: 'Letter Gothic Std';

        color: white;
    }

    #about img{
        width:30px;
        position: fixed;
        left: 980px;
        bottom: 15px;
        margin: 0;
        padding: 0;
        opacity: .7;  }

    #about img:hover{
        /*background-image: url('about_x.png');*/
        cursor:pointer;
        width:30px;
        position: fixed;
        left: 980px;
        bottom: 15px;
        margin: 0;
        padding: 0;
        opacity: .7;  }

    #user {width:250px;
        height: 30px;
        opacity:0.8;
        border: 1px solid #82caed;
        background:none;
        font-family: 'Letter Gothic Std';
        font-size: 12pt;
        padding: 2px;
        color: #82caed;
        padding-left: 7px;

    }

    #user {
        margin-left:50px;
    }


    #pass {width:250px;
        height: 30px;
        opacity:0.8;
        border: 1px solid #82caed;
        background:none;
        font-family: 'Letter Gothic Std';
        font-size: 12pt;
        padding: 2px;
        color: #82caed;}

    #pass {margin-left:50px;}

    #user {position:relative;
        /*margin-top:200px;*/

    }

    #submit {width: 100px;
        height: 30px;
        border: none;
        background:none;
        font-family: 'Letter Gothic Std';
        font-size: 12pt;
        padding: 2px;
        color: #82caed;
        /*margin-left:930px;*/
        opacity: 0.7;
        margin-left: 60px;}

    #submit:hover {width: 100px;
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
        margin-left: 60px;}


</style>

<body style="background-color: #201d1b;
             font-family: 'Letter Gothic Std';
             color: #82caed;
			">
<center>

    <div id="outercontainer">

        <div id="mainHead">
            <?php

            if(empty($_REQUEST['firstname'])) {
                echo "Sign Up  <a href='signup.php'>here!</a> ";
                exit();
            }

            if(empty(trim($_REQUEST['email']))) {
                echo "Please enter an email.";
                exit();
            }

            // SECURE AFTER
            $connection = mysqli_connect("uscitp.com", "jahaberm", "8787266053", "jahaberm_synthesize");

            if(mysqli_connect_errno()) {
                echo "CONNECTION ERROR:" . mysqli_connect_errno();
                exit();
            }

            $path = $_SERVER["DOCUMENT_ROOT"] . "/SynthesizeFinal/assets/". $_FILES['thefile']['name'];
//            echo "current path: " . $path;

            move_uploaded_file($_FILES['thefile']['tmp_name'], $path); //(what file you want to move, where do you want to move it to)



            $newfile = "http://shivji.student.uscitp.com/SynthesizeFinal/assets/";
            $newfile = $newfile . $_FILES['thefile']['name'];

            $files =  $_FILES['thefile']['name'];
//            echo "NEW FILE: " . $newfile;

//            echo "<br><br>";
//            echo "FILES: " . $files;
//
//            echo "<hr>";

            echo "<img src='assets/$files'>";



            $sql = "INSERT INTO User " .
                "(firstname, lastname, email, password, username, image) " . "VALUES " .
                "(" .
                "'" .
                $_REQUEST['firstname'] .
                "' ," .
                "'" .
                $_REQUEST['lastname'] .
                "' ," .
                "'" .
                $_REQUEST['email'] .
                "' ," .
                "'" .
                $_REQUEST['password'] .
                "' ," .
                "'" .
                $_REQUEST['username'] .
                "' ," .
                "'" .
                $files .
                "'" .
                ")";
//            echo "sql we are using:" . $sql;

            $results = mysqli_query($connection, $sql);

            if(!$results) {
                echo "FORM info " . print_r($_REQUEST) . "<hr>";
                echo "SQL: " . $sql . "<hr>";
                echo "ERROR: " . mysqli_error($connection);
                exit();
            } else {

                echo "<div id='header'>" .
                    "Thank you so much for signing up, " . $_REQUEST['firstname'] . "!" . "</div>";
            }

            ?>

        </div>



        <div id="login">
            <p><a href="login2.php">login<a/></p>
        </div>







        <div id="credits">
            <p>Created by <strong><span style="width: 170px;">synthesizegeek</span></strong></p>

        </div>


    </div>

</center>

</body>
</head>
</html>




