<?php
require("../../common/config.php");


$json=array();


if (isset($_REQUEST['selected'])) {
  	
	

//insertion

try{
	
	
    
	$sql="delete from lq_pilot_value where pilot_id in (".implode(',', $_REQUEST['selected']).")";
	$result1=mysqli_query($dbConn, $sql);
		$sql="delete from lq_pilot where pilot_id in (".implode(',', $_REQUEST['selected']).")";
	$result2=mysqli_query($dbConn, $sql);
		
	
	
	if($result1&$result2)
		
		{
			
		$json['status']='success';
		$json['message']='pilot(s) Deleted Successfully';
			
		}
		else
		{
	    $json['status']='failed';
		$json['message']='Delete pilot data failed';
			
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