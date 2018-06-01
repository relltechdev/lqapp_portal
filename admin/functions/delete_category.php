<?php
require("../../common/config.php");


$json=array();


if (isset($_REQUEST['selected'])) {
  	
	

//insertion

try{
	
	
    
	$sql="delete from lq_category where category_id in (".implode(',', $_REQUEST['selected']).")";
	$result1=mysqli_query($dbConn, $sql);
		$sql="delete from lq_category_description where category_id in (".implode(',', $_REQUEST['selected']).")";
	$result2=mysqli_query($dbConn, $sql);
		
	
	
	
	if($result1&$result2)
		
		{
			
		$json['status']='success';
		$json['message']='Category(s) Deleted Successfully';
			
		}
		else
		{
	    $json['status']='failed';
		$json['message']='Delete Category failed';
			
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