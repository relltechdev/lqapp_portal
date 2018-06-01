<?php

include("../../common/config.php");


$json=array();


if (!empty($_POST['banner_name'])&&!empty($_POST["image"])&&!empty($_POST["status"])) {
  	
	
	
// Getting Data	
$banner_name=mysqli_real_escape_string($dbConn,htmlspecialchars($_POST['banner_name']));
$lang=mysqli_real_escape_string($dbConn,htmlspecialchars($_POST["lang"]));
$status=mysqli_real_escape_string($dbConn,htmlspecialchars($_POST["status"]));
$image_url=mysqli_real_escape_string($dbConn,htmlspecialchars($_POST["image"]));


//insertion

try{
	
	date_default_timezone_set('Asia/Calcutta');
  
    $timestamp = date('Y-m-d H:i:s');
 
 

	
	$query="INSERT into lq_banner SET name='$banner_name',image='$image_url',status='$status',language_id='$lang',date_added='$timestamp'";
	$result =mysqli_query($dbConn,$query) or die("database error:". mysqli_error($dbConn));	
    
		if($result)
			
			{
				 mysqli_close($dbConn);
				 $json['status']='success';
	             $json['message']='Banner added Successfully';
				
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