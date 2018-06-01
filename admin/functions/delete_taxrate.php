<?php
require("../../common/config.php");


$json=array();


if (isset($_REQUEST['selected'])) {
  	
	

//insertion

try{
	
	
    
	$sql="delete from lq_tax_rate WHERE tax_rate_id in (".implode(',', $_REQUEST['selected']).")";
	$result=mysqli_query($dbConn, $sql);
	$sql2="UPDATE lq_tax_rule SET tax_rate_id='' WHERE tax_rate_id in (".implode(',', $_REQUEST['selected']).")";
	$result2=mysqli_query($dbConn, $sql);
		
		
	
	
	if($result)
		
		{
			
		$json['status']='success';
		$json['message']='Deleted Successfully';
			
		}
		else
		{
	    $json['status']='failed';
		$json['message']='Delete data failed';
			
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