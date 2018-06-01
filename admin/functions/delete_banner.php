<?php
require("../../common/config.php");


$json=array();


if (isset($_REQUEST['selected'])) {
  	
	

//insertion

try{
	
	
    
	$sql="delete from lq_banner where banner_id in (".implode(',', $_REQUEST['selected']).")";
	$result=mysqli_query($dbConn, $sql);
		
	
	
	if($result)
		
		{
			
		$json['status']='success';
		$json['message']='Banner(s) Deleted Successfully';
			
		}
		else
		{
	    $json['status']='failed';
		$json['message']='Delete Banner failed';
			
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