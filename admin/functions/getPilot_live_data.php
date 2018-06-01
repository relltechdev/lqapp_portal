<?php
include("../../common/config.php");

$json=array();

if(!empty($_POST['id'])&&isset($_POST['id']))
{

$id=$_POST['id'];

try{
	
	

	
	 $query = "SELECT p.firstname,p.lastname,p.mobile,pv.lat,pv.lng,cash_on_hand,pv.availability,p.image FROM lq_pilot_value pv LEFT JOIN lq_pilot p ON (pv.pilot_id=p.pilot_id) WHERE p.pilot_id='$id'";
    
     $result =mysqli_query($dbConn,$query) or die("database error:". mysqli_error($dbConn)); 

	 $data= mysqli_fetch_array($result,MYSQLI_ASSOC);
     mysqli_close($dbConn);    
if($data)
{
$json['status']='success';
$json['message']='Data Loaded Successfully';
$json['first_name']=$data['firstname']; 
$json['last_name']=$data['lastname']; 
$json['mobile']=$data['mobile'];
$json['availability']=$data['availability'];
$json['image']= $data['image']; 
$json['lat']=$data['lat'];
$json['lng']=$data['lng'];
$json['cash']=$data['cash_on_hand'];

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