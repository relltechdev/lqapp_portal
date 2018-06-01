<?php
require("../../common/config.php");


$json=array();


if (isset($_REQUEST['selected'])) {
  	
	

//insertion

try{
	
	
    
	$sql="delete from lq_user_group where user_group_id in (".implode(',', $_REQUEST['selected']).")";
	$result=mysqli_query($dbConn, $sql);
		
	
	
	
	if($result)
		
		{
			
		$json['status']='success';
		$json['message']='User Group(s) Deleted Successfully';
			
		}
		else
		{
	    $json['status']='failed';
		$json['message']='Delete User Group failed';
			
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