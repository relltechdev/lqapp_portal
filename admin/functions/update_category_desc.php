<?php

include("../../common/config.php");


$json=array();
$proid="";

if (!empty($_POST['cat_name'])&&!empty($_POST["desc"])&&!empty($_POST["lang"])&&!empty($_POST["categoryid"])) {
  	
	
	
// Getting Data	
$cat_name=mysqli_real_escape_string($dbConn,htmlspecialchars($_POST['cat_name']));
$desc=mysqli_real_escape_string($dbConn,htmlspecialchars($_POST["desc"]));
$lang=mysqli_real_escape_string($dbConn,htmlspecialchars($_POST["lang"]));
$catid=mysqli_real_escape_string($dbConn,htmlspecialchars($_POST["categoryid"]));


//insertion

try{
	
	date_default_timezone_set('Asia/Calcutta');
  
    $timestamp = date('Y-m-d H:i:s');
 
 

	
	$query="UPDATE lq_category_description SET name='$cat_name',description='$desc' WHERE category_id='$catid' AND language_id='$lang'";
	$result =mysqli_query($dbConn,$query) or die("database error:". mysqli_error($dbConn));	
    if($result) 
	           {
		    
				  mysqli_close($dbConn);
				 $json['status']='success';
	             $json['message']='Category Description Updated Successfully';
				
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