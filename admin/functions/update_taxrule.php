<?php
require("../../common/config.php");


$json=array();


if (!empty($_POST['rule_name'])&&!empty($_POST["taxrate"])&&!empty($_POST["tax_rule_id"])) {
  	
	
	
// Getting Data	
$name=mysqli_real_escape_string($dbConn,htmlspecialchars($_POST['rule_name']));
$rate=mysqli_real_escape_string($dbConn,htmlspecialchars($_POST["taxrate"]));
$id=mysqli_real_escape_string($dbConn,htmlspecialchars($_POST["tax_rule_id"]));
//insertion

try{
	
	date_default_timezone_set('Asia/Calcutta');
  
    $timestamp = date('Y-m-d H:i:s');
 
 

	// update product
	$query="UPDATE lq_tax_rule SET based='$name',tax_rate_id='$rate' WHERE tax_rule_id='$id'";
	$result =mysqli_query($dbConn,$query) or die("database error:". mysqli_error($dbConn));	

	
	if($result) 
	            {
		         
		
				 mysqli_close($dbConn);
				 $json['status']='success';
	             $json['message']='Tax Rule Updated Successfully';
				
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