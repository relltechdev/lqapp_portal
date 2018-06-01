<?php

if(!empty($_GET['id'])&&isset($_GET['id']))
{

$id=$_GET['id'];

try{
	
	

	
	 $query = "SELECT language_id,name,image,status FROM lq_banner WHERE banner_id='$id'";
    
     $result =mysqli_query($dbConn,$query) or die("database error:". mysqli_error($dbConn)); 

	 $data= mysqli_fetch_array($result,MYSQLI_ASSOC);

if($data)
{
  
$image_url= $data['image']; 
$lang = $data['language_id'];
$status = $data['status'];
$name= $data['name'];




}
else
{ 
$image_url= ""; 
$lang=""; 
$status=""; 
$name=""; 
}

	
	
	
}
	
	
	

   catch(MySQLException $e) {
	

	$msg='exception occurred '.$e;
                         
						    }
	
	
}
   
   mysqli_close($dbConn);
	

	
?>