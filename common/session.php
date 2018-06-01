<?php
session_start();
include('config.php');

$user_check=$_SESSION['login_user'];

// SQL Query To Fetch Complete Information Of User
$query="select username ,role, uid from user_tbl where username='$user_check' OR email_id='$user_check'";

$result= mysqli_query($dbConn,$query) or die("database error:". mysqli_error($dbConn));	
$row = mysqli_fetch_assoc($result);
$login_session =$row['username'];
$user_role =$row['role'];
$user_id = $row['uid'];




 
if(!isset($login_session))
{
mysqli_close($dbConn); // Closing Connection

}

?>