<?php session_start();
$localURL = $_SESSION['sessionURL'];
//echo $localURL;
?>
<html lang="en">
<head>
  <meta charset="utf-8"/>
  <script language="javascript" type="text/javascript" src="../../P5/p5.min.js"></script>
  <script language="javascript" type="text/javascript" src="../../P5/p5.sound.js"></script>
  <script language="javascript" type="text/javascript" src="../../P5/p5.dom.js"></script>
  <!-- Soundcloud streaming -->
  <script src='https://connect.soundcloud.com/sdk/sdk-3.0.0.js'></script>

  <script>var sc = "<?php echo $localURL; ?>";</script>

  <script language="javascript" type="text/javascript" src="sketch.js"></script>

  <script language="javascript" type="text/javascript" src="../../P5/helpers.js"></script>

  <style>
    body {
      margin: 0;
      padding: 0;
    } </style>

</head>
</html>
