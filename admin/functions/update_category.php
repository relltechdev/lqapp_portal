<?php
require("../../common/config.php");


$json=array();


if (!empty($_POST['categoryid'])&&!empty($_POST['cat_name'])&&!empty($_POST["desc"])&&isset($_POST["sort_order"])&&!empty($_POST["status"])) {
  	
	
	
// Getting Data	
$cat_name=mysqli_real_escape_string($dbConn,htmlspecialchars($_POST['cat_name']));
$desc=mysqli_real_escape_string($dbConn,htmlspecialchars($_POST["desc"]));
$status=mysqli_real_escape_string($dbConn,htmlspecialchars($_POST["status"]));
$sort=mysqli_real_escape_string($dbConn,htmlspecialchars($_POST["sort_order"]));
$image_url=mysqli_real_escape_string($dbConn,htmlspecialchars($_POST["image"]));
$catid=mysqli_real_escape_string($dbConn,htmlspecialchars($_POST["categoryid"]));

//insertion

try{
	
	date_default_timezone_set('Asia/Calcutta');
  
    $timestamp = date('Y-m-d H:i:s');
 
 

	// update product
	$query="UPDATE lq_category SET image='$image_url',status='$status',sort_order='$sort',date_modified='$timestamp' WHERE category_id='$catid' ";
	$result =mysqli_query($dbConn,$query) or die("database error:". mysqli_error($dbConn));	
	
	$cquery="UPDATE lq_category_description SET name='$cat_name',description='$desc' WHERE category_id='$catid' AND language_id='1'";
	$cresult =mysqli_query($dbConn,$cquery) or die("database error:". mysqli_error($dbConn));
	
	if($result&&$cresult) 
	            {
		         
		
				 mysqli_close($dbConn);
				 $json['status']='success';
	             $json['message']='Category Updated Successfully';
				
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