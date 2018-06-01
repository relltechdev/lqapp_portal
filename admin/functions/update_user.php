<?php
require("../../common/config.php");


$json=array();


if (!empty($_POST['usergroup'])&&!empty($_POST['firstname'])&&!empty($_POST["mobile"])&&isset($_POST["status"])&&!empty($_POST["oldkey"])&&!empty($_POST["userid"])) {
  	
	
	
// Getting Data	
$user_id=mysqli_real_escape_string($dbConn,htmlspecialchars($_POST["userid"]));
$first_name=mysqli_real_escape_string($dbConn,htmlspecialchars($_POST['firstname']));
$last_name=mysqli_real_escape_string($dbConn,htmlspecialchars($_POST["lastname"]));
$email=mysqli_real_escape_string($dbConn,htmlspecialchars($_POST["email"]));
$mobile=mysqli_real_escape_string($dbConn,htmlspecialchars($_POST["mobile"]));
$status=mysqli_real_escape_string($dbConn,htmlspecialchars($_POST["status"]));
$image_url=mysqli_real_escape_string($dbConn,htmlspecialchars($_POST["image"]));
$usergroup=mysqli_real_escape_string($dbConn,htmlspecialchars($_POST["usergroup"]));
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




//insertion

try{
	
	date_default_timezone_set('Asia/Calcutta');
  
    $timestamp = date('Y-m-d H:i:s');
 
	
	$query="UPDATE lq_user SET image='$image_url',firstname='$first_name',user_group_id='$usergroup',lastname='$last_name',email='$email',mobile='$mobile',password='$pass',status='$status' WHERE user_id='$user_id'";
	$result =mysqli_query($dbConn,$query) or die("database error:". mysqli_error($dbConn));	
    if($result) 
	{
				 mysqli_close($dbConn);
				
				 $json['status']='success';
	             $json['message']='User Data Updated Successfully';
				
			
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