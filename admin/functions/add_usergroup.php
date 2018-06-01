<?php

include("../../common/config.php");


$json=array();


if (!empty($_POST['name'])) {
  	
	
	
// Getting Data	
$name=mysqli_real_escape_string($dbConn,htmlspecialchars($_POST['name']));
$permission=mysqli_real_escape_string($dbConn,htmlspecialchars($_POST["permission"]));


//insertion

try{
	
	date_default_timezone_set('Asia/Calcutta');
  
    $timestamp = date('Y-m-d H:i:s');
 
 

	
	$query="INSERT into lq_user_group SET name='$name',permission='$permission'";
	$result =mysqli_query($dbConn,$query) or die("database error:". mysqli_error($dbConn));	
    if($result) 
	{
				
				mysqli_close($dbConn);
				
				 $json['status']='success';
	             $json['message']='User Group added Successfully';
				
			
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