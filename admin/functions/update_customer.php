<?php
require("../../common/config.php");


$json=array();

//&&!empty($_POST["oldkey"])
if (!empty($_POST['firstname'])&&!empty($_POST["mobile"])&&isset($_POST["status"])&&!empty($_POST["customerid"])) {
  	
	
	
// Getting Data	
$customer_id=mysqli_real_escape_string($dbConn,htmlspecialchars($_POST["customerid"]));
$first_name=mysqli_real_escape_string($dbConn,htmlspecialchars($_POST['firstname']));
$last_name=mysqli_real_escape_string($dbConn,htmlspecialchars($_POST["lastname"]));
$email=mysqli_real_escape_string($dbConn,htmlspecialchars($_POST["email"]));
$mobile=mysqli_real_escape_string($dbConn,htmlspecialchars($_POST["mobile"]));
$status=mysqli_real_escape_string($dbConn,htmlspecialchars($_POST["status"]));
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
 
	
	$query="UPDATE lq_customer SET firstname='$first_name',lastname='$last_name',email=$email,telephone='$mobile',password='$pass',status='$status' WHERE customer_id='$customer_id'";
	$result =mysqli_query($dbConn,$query) or die("database error:". mysqli_error($dbConn));	
    if($result) 
	{
				 mysqli_close($dbConn);
				
				 $json['status']='success';
	             $json['message']='Customer Data Updated Successfully';
				
			
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