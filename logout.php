<?php
session_start();
unset($_SESSION["loggedin"]);
unset($_SESSION["sessionUserID"]); // reset the current user's ID
unset($_SESSION["admin"]);
include "index.php";
?>