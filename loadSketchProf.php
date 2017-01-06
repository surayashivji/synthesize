<?php session_start();
if(empty($_REQUEST['sketch']) || empty($_REQUEST['inputURL'])) {
    header('LOCATION: index.php');
} else {
    $sketch = $_REQUEST['sketch'];
    $url = $_REQUEST['inputURL'];

    $path = 'scripts/sketches/' . $sketch . '/index.php';
    $_SESSION['sessionURL'] = $url;
    $header = "LOCATION: " . $path;

    header('LOCATION: scripts/sketches/' . $sketch .'/index.php');

    session_write_close();
}
?>
