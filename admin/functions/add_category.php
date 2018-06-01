<?php

include("../../common/config.php");


$json=array();
$catid="";

if (!empty($_POST['cat_name'])&&!empty($_POST["desc"])&&!empty($_POST["status"])) {
  	
	
	
// Getting Data	
$cat_name=mysqli_real_escape_string($dbConn,htmlspecialchars($_POST['cat_name']));
$desc=mysqli_real_escape_string($dbConn,htmlspecialchars($_POST["desc"]));
$status=mysqli_real_escape_string($dbConn,htmlspecialchars($_POST["status"]));
$image_url=mysqli_real_escape_string($dbConn,htmlspecialchars($_POST["image"]));


//insertion

try{
	
	date_default_timezone_set('Asia/Calcutta');
  
    $timestamp = date('Y-m-d H:i:s');
 
 

	
	$query="INSERT into lq_category SET image='$image_url',status='$status',date_added='$timestamp'";
	$result =mysqli_query($dbConn,$query) or die("database error:". mysqli_error($dbConn));	
    if($result) 
	           {
		    $catid = mysqli_insert_id($dbConn); // last inserted id
		       }
			   
    if(!empty($catid))
	{
		$query="INSERT into lq_category_description SET category_id='$catid',language_id='1',name='$cat_name',description='$desc'";
	    $result =mysqli_query($dbConn,$query) or die("database error:". mysqli_error($dbConn));	
		
		if($result)
			
			{
				 mysqli_close($dbConn);
				 $json["catid"]=$catid;
				 $json['status']='success';
	             $json['message']='Category added Successfully';
				
			}
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