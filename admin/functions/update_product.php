<?php
require("../../common/config.php");


$json=array();


if (!empty($_POST['productid'])&&!empty($_POST['product_name'])&&!empty($_POST["desc"])&&!empty($_POST["price"])&&!empty($_POST["tax"])&&!empty($_POST['category'])) {
  	
	
	
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
$productid=mysqli_real_escape_string($dbConn,htmlspecialchars($_POST["productid"]));

//insertion

try{
	
	date_default_timezone_set('Asia/Calcutta');
  
    $timestamp = date('Y-m-d H:i:s');
 
 

	// update product
	$query="UPDATE lq_product SET image='$image_url',status='$status',date_modified='$timestamp',model='$model',manufacturer_id='$manufacturer',price='$price',tax_rule_id='$tax',weight='$weight' WHERE product_id='$productid' ";
	$result =mysqli_query($dbConn,$query) or die("database error:". mysqli_error($dbConn));	
	
	$dquery="UPDATE lq_product_description SET name='$pro_name',description='$desc' WHERE product_id='$productid' AND language_id='1'";
	$dresult =mysqli_query($dbConn,$dquery) or die("database error:". mysqli_error($dbConn));	
	
	$cquery="SELECT category_id FROM lq_product_to_category WHERE product_id='$productid'";
	$cresult =mysqli_query($dbConn,$cquery) or die("database error:". mysqli_error($dbConn));
	
	$count=mysqli_num_rows($cresult);
   
    if($count > 0)
		
		{
			
			$query="UPDATE lq_product_to_category SET category_id='$category' WHERE product_id='$productid'";
	        $cresult=mysqli_query($dbConn,$query) or die("database error:". mysqli_error($dbConn));
		}
		else
		{
			$query="INSERT INTO lq_product_to_category SET category_id='$category',product_id='$productid'";
	        $cresult=mysqli_query($dbConn,$query) or die("database error:". mysqli_error($dbConn));
		}
	
    if($result&&$dresult&&$cresult) 
	            {
		         
		
				 mysqli_close($dbConn);
				 $json['status']='success';
	             $json['message']='Product Updated Successfully';
				
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