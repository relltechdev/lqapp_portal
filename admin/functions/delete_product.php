<?php
require("../../common/config.php");


$json=array();


if (isset($_REQUEST['selected'])) {
  	
	

//insertion

try{
	
	
    
	$sql="delete from lq_product where product_id in (".implode(',', $_REQUEST['selected']).")";
	$result1=mysqli_query($dbConn, $sql);
		$sql="delete from lq_product_description where product_id in (".implode(',', $_REQUEST['selected']).")";
	$result2=mysqli_query($dbConn, $sql);
		// Deleting values product to category
	$sql="delete from lq_product_to_category where product_id in (".implode(',', $_REQUEST['selected']).")";
	$result3=mysqli_query($dbConn, $sql) or die('Sql error '. mysqli_error($conn));
	
	
	
	if($result1&$result2&$result3)
		
		{
			
		$json['status']='success';
		$json['message']='product(s) Deleted Successfully';
			
		}
		else
		{
	    $json['status']='failed';
		$json['message']='Delete product failed';
			
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
	     $json['message']='Nothing Selected';



}	


echo json_encode($json);


?>