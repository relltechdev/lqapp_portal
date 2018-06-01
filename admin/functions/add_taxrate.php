<?php

include("../../common/config.php");


$json=array();


if (!empty($_POST['rate_name'])&&!empty($_POST["rate_value"])&&!empty($_POST["type"])) {
  	
	
	
// Getting Data	
$rate_name=mysqli_real_escape_string($dbConn,htmlspecialchars($_POST['rate_name']));
$value=mysqli_real_escape_string($dbConn,htmlspecialchars($_POST["rate_value"]));
$type=mysqli_real_escape_string($dbConn,htmlspecialchars($_POST["type"]));



//insertion

try{
	
	date_default_timezone_set('Asia/Calcutta');
  
    $timestamp = date('Y-m-d H:i:s');
 
 

	
	$query="INSERT into lq_tax_rate SET name='$rate_name',rate='$value',type='$type',date_added='$timestamp'";
	$result =mysqli_query($dbConn,$query) or die("database error:". mysqli_error($dbConn));	
    if($result) 
	{
				 mysqli_close($dbConn);
				 $json['status']='success';
	             $json['message']='Tax Rate Added Successfully';
				
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