<?php
/* Database connection start */
date_default_timezone_set('Asia/Calcutta');
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "lq_db1";
$dbConn = mysqli_connect($servername, $username, $password, $dbname) or die("Connection failed: " . mysqli_connect_error());
if (mysqli_connect_errno()) {
   // printf("Connect failed: %s\n", mysqli_connect_error());
    exit();
}
?>