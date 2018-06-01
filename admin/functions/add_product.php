<?php
require("../../common/config.php");


$json=array();


if (!empty($_POST['product_name'])&&!empty($_POST["desc"])&&!empty($_POST["price"])&&!empty($_POST["tax"])&&!empty($_POST['category'])) {
  	
	
	
// Getting Data	
$pro_name=mysqli_real_escape_string($dbConn,htmlspecialchars($_POST['product_name']));
$desc=mysqli_real_escape_string($dbConn,htmlspecialchars($_POST["desc"]));
$status=mysqli_real_escape_string($dbConn,htmlspecialchars($_POST["status"]));
$price=mysqli_real_escape_string($dbConn,htmlspecialchars($_POST["price"]));
$weight=mysqli_real_escape_string($dbConn,htmlspecialchars($_POST["weight"]));
$tax=mysqli_real_escape_string($dbConn,htmlspecialchars($_POST["tax"]));
$model=mysqli_real_escape_string($dbConn,htmlspecialchars($_POST["model_name"]));
$manufacturer=mysqli_real_escape_string($dbConn,htmlspecialchars($_POST["manufacturer"]));
$image_url=mysqli_real_escape_string($dbConn,htmlspecialchars($_POST["image"]));
$category=mysqli_real_escape_string($dbConn,htmlspecialchars($_POST["category"]));

//insertion

try{
	
	date_default_timezone_set('Asia/Calcutta');
  
    $timestamp = date('Y-m-d H:i:s');
 
 

	
	$query="INSERT into lq_product SET image='$image_url',status='$status',date_added='$timestamp',model='$model',manufacturer_id='$manufacturer',price='$price',tax_rule_id='$tax',weight='$weight'";
	$result =mysqli_query($dbConn,$query) or die("database error:". mysqli_error($dbConn));	
    if($result) 
	           {
		    $proid = mysqli_insert_id($dbConn); // last inserted id
		       }
			   
    if(!empty($proid))
	{
		$query="INSERT into lq_product_to_category SET product_id='$proid',category_id='$category'";
	    $result =mysqli_query($dbConn,$query) or die("database error:". mysqli_error($dbConn));	
		
		$query2="INSERT into lq_product_description SET product_id='$proid',language_id='1',name='$pro_name',description='$desc'";
	    $result2 =mysqli_query($dbConn,$query2) or die("database error:". mysqli_error($dbConn));	
		
		if($result&$result2)
			
			{
				 mysqli_close($dbConn);
				 $json["proid"]=$proid;
				 $json['status']='success';
	             $json['message']='Product added Successfully';
				
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