<?php
include("../../common/config.php");

$json=array();

if(!empty($_POST['id'])&&isset($_POST['id']))
{

$id=$_POST['id'];

try{
	
	

	
	 $query = "SELECT pilot_id,order_id,pilot_lat,pilot_lng,customer_lat,customer_lng,customer_id,date_added FROM lq_order WHERE order_id='$id'";
    
     $result =mysqli_query($dbConn,$query) or die("database error:". mysqli_error($dbConn)); 

	 $data= mysqli_fetch_array($result,MYSQLI_ASSOC);
     mysqli_close($dbConn);    
if($data)
{
$json['status']='success';
$json['message']='Data Loaded Successfully';
$json['pilot_id']=$data['pilot_id']; 
$json['order_id']=$data['order_id']; 
$json['slat']=$data['pilot_lat'];
$json['slng']=$data['pilot_lng'];
$json['customer_id']=$data['customer_id'];
$json['elat']= $data['customer_lat']; 
$json['elng']=$data['customer_lng'];
$json['date']=$data['date_added'];


}
else
{ 
$json['status']='failed';
$json['message']='No data Found';

}

	
	
	
}
	
	
	

   catch(MySQLException $e) {
	
 
	$json['status']='failed';
    $json['message']=$e;
    mysqli_close($dbConn);                 
						    }
	
	
}
   
  
	
  echo json_encode($json);
	
?>