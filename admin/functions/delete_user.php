<?php
require("../../common/config.php");


$json=array();


if (isset($_REQUEST['selected'])) {
  	
	

//insertion

try{
	
	
    
	
		$sql="DELETE from lq_user WHERE user_id in (".implode(',', $_REQUEST['selected']).")";
	    $result=mysqli_query($dbConn, $sql);
		
	
	
	if($result)
		
		{
			
		$json['status']='success';
		$json['message']='user(s) Deleted Successfully';
			
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