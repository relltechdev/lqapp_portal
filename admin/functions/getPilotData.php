<?php

if(!empty($_GET['id'])&&isset($_GET['id']))
{

$id=$_GET['id'];

try{
	
	

	
	 $query = "SELECT firstname,lastname,email,mobile,image,password,status FROM lq_pilot WHERE pilot_id='$id'";
    
     $result =mysqli_query($dbConn,$query) or die("database error:". mysqli_error($dbConn)); 

	 $data= mysqli_fetch_array($result,MYSQLI_ASSOC);

if($data)
{
  
$first_name=$data['firstname']; 
$last_name=$data['lastname']; 
$email=$data['email'];
$mobile=$data['mobile'];
$status=$data['status'];
$image_url= $data['image']; 
$pwd=$data['password'];

}
else
{ 
$first_name="";
$last_name="";
$email="";
$mobile="";
$status="";
$image_url="";
$pwd="";
}

	
	
	
}
	
	
	

   catch(MySQLException $e) {
	

	$msg='exception occurred '.$e;
                         
						    }
	
	
}
   
   mysqli_close($dbConn);
	

	
?>