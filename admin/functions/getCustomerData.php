<?php

if(!empty($_GET['id'])&&isset($_GET['id']))
{

$id=$_GET['id'];

try{
	
	

	
	 $query = "SELECT firstname,lastname,email,telephone,password,status FROM lq_customer WHERE customer_id='$id'";
    
     $result =mysqli_query($dbConn,$query) or die("database error:". mysqli_error($dbConn)); 

	 $data= mysqli_fetch_array($result,MYSQLI_ASSOC);

if($data)
{
  
$first_name=$data['firstname']; 
$last_name=$data['lastname']; 
$email=$data['email'];
$mobile=$data['telephone'];
$status=$data['status'];
$pwd=$data['password'];

}
else
{ 
$first_name="";
$last_name="";
$email="";
$mobile="";
$status="";
$pwd="";
}

	
	
	
}
	
	
	

   catch(MySQLException $e) {
	

	$msg='exception occurred '.$e;
                         
						    }
	
	
}
   
   mysqli_close($dbConn);
	

	
?>