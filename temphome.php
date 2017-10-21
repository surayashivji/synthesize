<?php
session_start();
?>

<html>
<head>
    <title>Synthesize</title>
    <link rel="icon" type="image/png" href="favicon.png">

    <link href="https://fonts.googleapis.com/css?family=Inconsolata" rel="stylesheet">
    <link rel="stylesheet" href="styles/synthesize_11_21_styles.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/processing.js/1.6.3/processing.js"></script>
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

    li a:hover {
        background-color: #111;
    }


</style>

<body style="background-color: #201d1b; margin:0;
             font-family: 'Letter Gothic Std';">
             <canvas id="canvass" data-processing-sources="portfoliobg.pde" >
             </canvas>
<div id="nav">
<ul>
    <li><a href="temphome.php">Home</a></li>
    <li><a href="match.php">Match</a></li>
</ul>
    </div>

<center>
    <div style="margin-top:-110px;">
    <div id="outercontainer">
        <div id="mainHead">
            <div id="masthead">
                <img src="assets/home/main_logo.png"/>
            </div>

        </div>

        <div id="credits">
            <p>Created by <strong><span style="width: 170px;">synthesizegeek</span></strong></p>
        </div>
    </div>
    </div>

</center>
</body>
</html>
