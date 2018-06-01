<?php

include("../../common/config.php");


$json=array();


if (!empty($_POST['usergroup'])&&!empty($_POST['firstname'])&&!empty($_POST['username'])&&!empty($_POST["mobile"])&&!empty($_POST["status"])&&!empty($_POST["passkey"])) {
  	
	
	
// Getting Data	
$first_name=mysqli_real_escape_string($dbConn,htmlspecialchars($_POST['firstname']));
$last_name=mysqli_real_escape_string($dbConn,htmlspecialchars($_POST["lastname"]));
$username=mysqli_real_escape_string($dbConn,htmlspecialchars($_POST["username"]));
$usergroup=mysqli_real_escape_string($dbConn,htmlspecialchars($_POST["usergroup"]));
$email=mysqli_real_escape_string($dbConn,htmlspecialchars($_POST["email"]));
$mobile=mysqli_real_escape_string($dbConn,htmlspecialchars($_POST["mobile"]));
$status=mysqli_real_escape_string($dbConn,htmlspecialchars($_POST["status"]));
$image_url=mysqli_real_escape_string($dbConn,htmlspecialchars($_POST["image"]));
$key=mysqli_real_escape_string($dbConn,htmlspecialchars($_POST["passkey"]));
$pass=md5($key);

//insertion

try{
	
	date_default_timezone_set('Asia/Calcutta');
  
    $timestamp = date('Y-m-d H:i:s');
 
 

	
	$query="INSERT into lq_user SET image='$image_url',firstname='$first_name',lastname='$last_name',user_group_id='$usergroup',username='$username',email='$email',mobile='$mobile',password='$pass',status='$status',date_added='$timestamp'";
	$result =mysqli_query($dbConn,$query) or die("database error:". mysqli_error($dbConn));	
    if($result) 
	{
				
				mysqli_close($dbConn);
				
				 $json['status']='success';
	             $json['message']='User added Successfully';
				
			
	}
		
	else
	{
		
		
		 $json['status']='failed';
	     $json['message']='Something went wrong';
	    
		
	}
	
	
}
catch(MySQLException $e) {
	
	
	$json['status']='failed';
	$json['message']='exception occurred '.$e;
	mysqli_close($dbConn);
      }
	
	
}

else
{


		 $json['status']='failed';
	     $json['message']='Please fill all the fields';



}	


echo json_encode($json);


?>