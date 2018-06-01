<?php
require("../../common/config.php");


$json=array();


if (isset($_REQUEST['selected'])) {
  	
	

//insertion

try{
	
	
    
	
		$sql="DELETE from lq_customer WHERE customer_id in (".implode(',', $_REQUEST['selected']).")";
	    $result=mysqli_query($dbConn, $sql);
		$sql2="DELETE from lq_address WHERE customer_id in (".implode(',', $_REQUEST['selected']).")";
	    $result2=mysqli_query($dbConn, $sql2);
	
	if($result&&$result2)
		
		{
			
		$json['status']='success';
		$json['message']='customer(s) Deleted Successfully';
			
		}
		else
		{
	    $json['status']='failed';
		$json['message']='Delete customer data failed';
			
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