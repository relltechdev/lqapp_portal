<?php
include("../../common/config.php");

if(!empty($_GET['category_id'])&&isset($_GET['category_id'])&&!empty($_GET['lang'])&&isset($_GET['lang']))
{

$category_id=$_GET['category_id'];
$lang=$_GET['lang'];
$json=array();
try{
	
	

	
	 $query = "SELECT name,description FROM lq_category_description WHERE category_id='$category_id' AND language_id='$lang'";
    
     $result =mysqli_query($dbConn,$query) or die("database error:". mysqli_error($dbConn)); 

	 $data= mysqli_fetch_array($result,MYSQLI_ASSOC);

if($data)
{
  
$json['name']=$data['name']; 
$json['desc']= $data['description']; 
$json['status']='success';
}
else
{ 
$json['status']='failed';

}

	
	
	
}
	
	
	

   catch(MySQLException $e) {
	
    $json['status']='failed';
	$msg='exception occurred '.$e;
                         
						    }
	
	
}
else
{
$json['status']='failed';


}	
   mysqli_close($dbConn);
	
    echo json_encode($json);
	
?>