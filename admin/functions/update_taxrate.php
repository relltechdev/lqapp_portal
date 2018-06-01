<?php
require("../../common/config.php");


$json=array();


if (!empty($_POST['rate_name'])&&!empty($_POST["rate_value"])&&!empty($_POST["type"])&&!empty($_POST["tax_rate_id"])) {
  	
	
	
// Getting Data	
$rate_name=mysqli_real_escape_string($dbConn,htmlspecialchars($_POST['rate_name']));
$value=mysqli_real_escape_string($dbConn,htmlspecialchars($_POST["rate_value"]));
$type=mysqli_real_escape_string($dbConn,htmlspecialchars($_POST["type"]));
$id=mysqli_real_escape_string($dbConn,htmlspecialchars($_POST["tax_rate_id"]));

//insertion

try{
	
	date_default_timezone_set('Asia/Calcutta');
  
    $timestamp = date('Y-m-d H:i:s');
 
 

	// update product
	$query="UPDATE lq_tax_rate SET name='$rate_name',rate='$value',type='$type',date_modified='$timestamp' WHERE tax_rate_id='$id'";
	$result =mysqli_query($dbConn,$query) or die("database error:". mysqli_error($dbConn));	
    
	
	if($result) 
	            {
		         
		
				 mysqli_close($dbConn);
				 $json['status']='success';
	             $json['message']='Tax Rate Updated Successfully';
				
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