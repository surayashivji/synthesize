
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

            if(empty($_REQUEST['id'])){
                echo "<span id='header'> You reached this page in error </span>";
                exit();
            }

            $conn = mysqli_connect("uscitp.com", "jahaberm", "8787266053", "jahaberm_synthesize");


            if(mysqli_connect_errno()) {
                echo "Failed to connect to mySql: " . mysqli_connect_errno();
                exit();
            }
            //
            //$sql = "UPDATE dvd_titles SET " .
            //    " TITLE = '" . $_REQUEST['title'] . "'," .
            //    " genre_id=" . $_REQUEST['genre'] .
            //    " WHERE dvd_titles= " . $_REQUEST['id'];
            $sql = "DELETE FROM Sketches WHERE id_sketch=". $_REQUEST['id'];


            $results = mysqli_query($conn, $sql);

            echo "<span id='header'> Sketch deleted! </span> " ;


            ?>


        </div><!-- close outercontainer -->
        <!---->
        <!---->


        <?php

        //?>
</center>
</body>
</html>




