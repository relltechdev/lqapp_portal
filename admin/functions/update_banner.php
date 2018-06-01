<?php
require("../../common/config.php");


$json=array();


if (!empty($_POST['banner_name'])&&!empty($_POST["image"])&&!empty($_POST["status"])&&!empty($_POST["bannerid"]))  {
  	
	
	
// Getting Data	
$banner_name=mysqli_real_escape_string($dbConn,htmlspecialchars($_POST['banner_name']));
$lang=mysqli_real_escape_string($dbConn,htmlspecialchars($_POST["lang"]));
$status=mysqli_real_escape_string($dbConn,htmlspecialchars($_POST["status"]));
$image_url=mysqli_real_escape_string($dbConn,htmlspecialchars($_POST["image"]));
$id=mysqli_real_escape_string($dbConn,htmlspecialchars($_POST["bannerid"]));

//insertion

try{
	
	date_default_timezone_set('Asia/Calcutta');
  
    $timestamp = date('Y-m-d H:i:s');
 
 

	// update product
	$query="UPDATE lq_banner SET name='$banner_name',image='$image_url',status='$status',language_id='$lang',date_added='$timestamp' WHERE banner_id='$id' ";
	$result =mysqli_query($dbConn,$query) or die("database error:". mysqli_error($dbConn));	
	
	
	
	if($result) 
	            {
		         
		
				 mysqli_close($dbConn);
				 $json['status']='success';
	             $json['message']='Banner Updated Successfully';
				
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