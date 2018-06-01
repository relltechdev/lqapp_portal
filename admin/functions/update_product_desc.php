<?php

include("../../common/config.php");


$json=array();
$proid="";

if (!empty($_POST['product_name'])&&!empty($_POST["desc"])&&!empty($_POST["lang"])&&!empty($_POST["productid"])) {
  	
	
	
// Getting Data	
$pro_name=mysqli_real_escape_string($dbConn,htmlspecialchars($_POST['product_name']));
$desc=mysqli_real_escape_string($dbConn,htmlspecialchars($_POST["desc"]));
$lang=mysqli_real_escape_string($dbConn,htmlspecialchars($_POST["lang"]));
$proid=mysqli_real_escape_string($dbConn,htmlspecialchars($_POST["productid"]));


//insertion

try{
	
	date_default_timezone_set('Asia/Calcutta');
  
    $timestamp = date('Y-m-d H:i:s');
 
 

	
	$query="UPDATE lq_product_description SET name='$pro_name',description='$desc' WHERE product_id='$proid' AND language_id='$lang'";
	$result =mysqli_query($dbConn,$query) or die("database error:". mysqli_error($dbConn));	
    if($result) 
	           {
		    
				  mysqli_close($dbConn);
				 $json['status']='success';
	             $json['message']='Product Description Updated Successfully';
				
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