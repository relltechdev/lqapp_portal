<?php
require("../../common/config.php");


$json=array();


if (isset($_REQUEST['selected'])) {
  	
	

//insertion

try{
	
	
    
	$sql="delete from lq_order where order_id in (".implode(',', $_REQUEST['selected']).")";
	$result1=mysqli_query($dbConn, $sql);
		$sql="delete from lq_order_process where order_id in (".implode(',', $_REQUEST['selected']).")";
	$result2=mysqli_query($dbConn, $sql);
	    $sql="delete from lq_order_process where order_id in (".implode(',', $_REQUEST['selected']).")";
	$result3=mysqli_query($dbConn, $sql);
		
	
	
	if($result1&$result2&$result3)
		
		{
			
		$json['status']='success';
		$json['message']='order(s) Deleted Successfully';
			
		}
		else
		{
	    $json['status']='failed';
		$json['message']='Delete order data failed';
			
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