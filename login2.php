<?php
session_start();
?>
<html>
<head>
    <title>Synthesize</title>
    <link rel="icon" type="image/png" href="favicon.png">
    <link href="https://fonts.googleapis.com/css?family=Inconsolata" rel="stylesheet">
    <!-- <link rel="stylesheet" href="styles/synthesize_home_styles.css"> -->
    <link rel="stylesheet" href="styles/synthesize_11_21_styles.css">

    <script src="https://cdnjs.cloudflare.com/ajax/libs/processing.js/1.6.3/processing.min.js"></script>
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
    #canvass{
        overflow: hidden;
        width:100%;
        border:none;
        height:100%;
        position:absolute;
        z-index:-1;
    }
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

    #masthead {
      margin-top:-200px;
    }
    #logIn p {
        width:150px;

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

#log{margin:auto; margin-left:-30px;}
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
        #masthead img{
          width:65%;
        }
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
             font-family: 'Letter Gothic Std'; margin:0;
             color: #82caed;
			">

<!-- <canvas id="canvass" data-processing-sources="portfoliobg.pde" > -->

<!-- </canvas> -->
<center>

    <div id="outercontainer">


        <div id="mainHead">

            <?php
            if ($_SESSION['loggedin'] == 'yes'){

                // include "temphome.php";
                echo "HELLO";
                 header("Location: /temphome.php");

            } else {
                if (empty($_REQUEST['username']) || empty($_REQUEST['password'])) {
                    echo "<div id='masthead' style=''> <img src='assets/home/main_logo.png'> </div>  <div id='logIn'> <p><a href='login2.php'>log in</a></p>  </div>";
                    echo "<form id='log' action ='login2.php' method='post'> <input id='user' type='text' name='username' placeholder='username'> <br/><br/> <input id='pass' type='password' name='password' placeholder='password'> <br><br> <input id='submit' type='submit'></form>";
                    exit();
                }
                $conn = mysqli_connect("uscitp.com", "jahaberm", "8787266053", "jahaberm_synthesize");

                if (mysqli_connect_errno()) {
                    echo "Failed to connect to mySql: " . mysqli_connect_errno();
                    exit();
                }
                $myusername = mysqli_real_escape_string($conn, $_POST['username']);
                $mypassword = mysqli_real_escape_string($conn, $_POST['password']);

                $sql = "SELECT user_id, admin FROM User WHERE username = '$myusername' and password = '$mypassword'";
                $results = mysqli_query($conn, $sql);

                if (!$results) {
                    echo "SQL error " . mysqli_error($conn);
                }

                if (mysqli_num_rows($results) == 1 ) {
                    $row = mysqli_fetch_array($results);
                    $id = $row['user_id'];
                    $_SESSION['sessionUserID'] = $id;
                    $admin = $row['admin']; // 0: not admin, 1: admin
                    if($admin == '0') {
                        $_SESSION['admin'] = 'no';
                    } else if ($admin == '1') {
                        $_SESSION['admin'] = 'yes';
                    }
                    $_SESSION['loggedin'] = 'yes';
                    include "temphome.php";
                } else {
                    echo "<div id='masthead' > <img src='assets/home/main_logo.png'> </div>  <div id='logIn'> <p><a href='login2.php'>log in</a></p>  </div>";
                    echo "<form action ='login2.php' method='post'> <input id='user' type='text' name='username' placeholder='username'> <br/><br/> <input id='pass' type='password' name='password' placeholder='password'> <br><br> <input id='submit' type='submit'></form> <br> <p style='width:400px; margin:auto; text-align:center;'>You have entered the wrong username and/or password. Please try again.</p>";
                    exit();
                }
            }

            ?>

        </div><!-- close mainHead -->

        <div id="credits">
            <p>Created by <strong><span style="width: 170px;">synthesizegeek</span></strong></p>

        </div>


    </div>

</center>


</body>
</html>
