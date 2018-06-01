<?php
require("../../common/config.php");


$json=array();


if (!empty($_POST['firstname'])&&!empty($_POST["mobile"])&&!empty($_POST["status"])) {
  	
	//&&!empty($_POST["oldkey"])&&!empty($_POST["pilotid"])
	
// Getting Data	
$pilot_id=mysqli_real_escape_string($dbConn,htmlspecialchars($_POST["pilotid"]));
$first_name=mysqli_real_escape_string($dbConn,htmlspecialchars($_POST['firstname']));
$last_name=mysqli_real_escape_string($dbConn,htmlspecialchars($_POST["lastname"]));
$email=mysqli_real_escape_string($dbConn,htmlspecialchars($_POST["email"]));
$mobile=mysqli_real_escape_string($dbConn,htmlspecialchars($_POST["mobile"]));
$status=mysqli_real_escape_string($dbConn,htmlspecialchars($_POST["status"]));
$image_url=mysqli_real_escape_string($dbConn,htmlspecialchars($_POST["image"]));
$oldkey=mysqli_real_escape_string($dbConn,htmlspecialchars($_POST["oldkey"]));
$newkey=mysqli_real_escape_string($dbConn,htmlspecialchars($_POST["newkey"]));
$pass="";
if($oldkey!=$newkey)
{
	$pass=md5($newkey);
	
}
else
{
	$pass=$oldkey;
}



if($email=="")
{
	$email='NULL';
}
else
{
	$email="'".$email."'";
}
//insertion

try{
	
	date_default_timezone_set('Asia/Calcutta');
  
    $timestamp = date('Y-m-d H:i:s');
 
	
	$query="UPDATE lq_pilot SET image='$image_url',firstname='$first_name',lastname='$last_name',email= $email,mobile='$mobile',password='$pass',status='$status' WHERE pilot_id='$pilot_id'";
	$result =mysqli_query($dbConn,$query) or die("database error:". mysqli_error($dbConn));	
    if($result) 
	{
				 mysqli_close($dbConn);
				
				 $json['status']='success';
	             $json['message']='Pilot profile Updated Successfully';
				
			
	}
		
	else
	{
		
		
		 $json['status']='failed';
	     $json['message']='Something went wrong';
	    
		
	}
	
		
	
	
	
            }
catch(MySQLException $e)
     {
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