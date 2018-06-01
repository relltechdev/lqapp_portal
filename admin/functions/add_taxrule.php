<?php

include("../../common/config.php");


$json=array();


if (!empty($_POST['rule_name'])&&!empty($_POST["taxrate"])) {
  	
	
	
// Getting Data	
$name=mysqli_real_escape_string($dbConn,htmlspecialchars($_POST['rule_name']));
$rate=mysqli_real_escape_string($dbConn,htmlspecialchars($_POST["taxrate"]));




//insertion

try{
	
	
	
	$query="INSERT into lq_tax_rule SET based='$name',tax_rate_id='$rate'";
	$result =mysqli_query($dbConn,$query) or die("database error:". mysqli_error($dbConn));	
    if($result) 
	{
				 mysqli_close($dbConn);
				 $json['status']='success';
	             $json['message']='Tax Rule Added Successfully';
				
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