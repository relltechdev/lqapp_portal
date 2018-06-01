<?php

if(!empty($_GET['id'])&&isset($_GET['id']))
{

$id=$_GET['id'];

try{
	
	

	
	 $query = "SELECT c.image,c.sort_order,c.status,cd.name,cd.description FROM lq_category c LEFT JOIN lq_category_description cd ON (c.category_id=cd.category_id) WHERE cd.language_id='1' AND c.category_id='$id'";
    
     $result =mysqli_query($dbConn,$query) or die("database error:". mysqli_error($dbConn)); 

	 $data= mysqli_fetch_array($result,MYSQLI_ASSOC);

if($data)
{
  
$image_url= $data['image']; 
$sort=$data['sort_order'];
$status=$data['status'];
$status=$data['status'];
$name=$data['name'];
$description=$data['description'];



}
else
{ 
$image_url= ""; 
$sort=""; 
$status=""; 
$status=""; 
$name=""; 
$description=""; 

}

	
	
	
}
	
	
	

   catch(MySQLException $e) {
	

	$msg='exception occurred '.$e;
                         
						    }
	
	
}
   
   mysqli_close($dbConn);
	

	
?>