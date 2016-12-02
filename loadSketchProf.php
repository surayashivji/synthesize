<?php session_start();
if(empty($_REQUEST['sketch']) || empty($_REQUEST['inputURL'])) {
//if(empty($_REQUEST['sketch'])) {
    echo "sketch" . $_REQUEST['sketch'];
    echo "URL" . $_REQUEST['inputURL'];
//    header('LOCATION: synthesize.php');
} else {
    $sketch = $_REQUEST['sketch'];
    $url = $_REQUEST['inputURL'];

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