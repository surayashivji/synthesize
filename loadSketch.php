<?php session_start();
if(empty($_REQUEST['sketch']) || empty($_REQUEST['inputURL'])) {
    header('LOCATION: synthesize.php');
} else {
    $sketch = $_REQUEST['sketch'];
    $url = $_REQUEST['inputURL'];

//    echo $sketch;

//    echo "<br><br>";

    $path = 'scripts/sketches/' . $sketch . '/index.php';
    $_SESSION['sessionURL'] = $url;
    $header = "LOCATION: " . $path;
//    echo "'" . $header . "'";

    header('LOCATION: scripts/sketches/' . $sketch .'/index.php');
//    header('LOCATION: scripts/sketches/01_beatDetectLines/index.php');
//    header("'" . $header . "'");
    session_write_close();
}
?>