<html>
<head>
  <title>Synthesize</title>
  <link rel="icon" type="image/png" href="favicon.png">
  <link href="https://fonts.googleapis.com/css?family=Inconsolata" rel="stylesheet">
  <script src="https://cdnjs.cloudflare.com/ajax/libs/processing.js/1.6.3/processing.min.js"></script>
  <link rel="stylesheet" href="styles/synthesize_11_21_styles.css">
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
  height:100%;
  border:none;
  background-size: cover;
}
#canvass canvas {
  min-height: 100%;
  min-width: 100%;
}
#masthead img{
  width:65%;
}

#mobile-message {
  text-align: center;
  width:30%;
  color:#82caed;
  font-size: 15px;
  margin-top:50px
}

</style>

<body style="background-color: #201d1b;
font-family: 'Letter Gothic Std'; margin:0;">
<center>
  <div id="outercontainer" style=" top:-100px;position:absolute; position: absolute; height:10px;
  margin-left: auto;
  margin-right: auto;
  left: 0;
  right: 0;
  ">
  <div id="mainHead" style=" height:10px;">
    <div id="masthead" >
      <img id="logo" src="assets/home/main_logo.png"/>
    </div>
    <div id='login'>
      <p><a href="match.php">ENTER</a></p>
    </div>
  </div>
  <div id="credits">
    <p>Created by <strong><span style="width: 170px;">synthesizegeek</span></strong></p>
  </div>
</div>
<canvas id="canvass" data-processing-sources="portfoliobg.pde" >
</canvas>
</center>
</body>
</html>
