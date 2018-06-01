<?php

include("../../common/config.php");


$json=array();


if (!empty($_POST['check'])&&!empty($_POST["type"])&&!empty($_POST["field"])) {
  	
	
	
// Getting Data	

$check=mysqli_real_escape_string($dbConn,htmlspecialchars($_POST['check']));
$type=mysqli_real_escape_string($dbConn,htmlspecialchars($_POST["type"]));
$field=mysqli_real_escape_string($dbConn,htmlspecialchars($_POST["field"]));
$json['identifier']=mysqli_real_escape_string($dbConn,htmlspecialchars($_POST["identifier"]));

if($type=="pilot")
{
	
	if($field=="mobile")
	{
		
					
				$sql = mysqli_query($dbConn,"SELECT COUNT(*) as duplicate FROM lq_pilot WHERE mobile='$check'");
					
				$result = mysqli_fetch_array($sql,MYSQLI_ASSOC);
				if($result['duplicate'] > 0) 
				{
					
					$json['status']="success";
					$json['message']="This Mobile number Already Registered";
					
						
				}
		
		
	}
	if($field=="email")
	{
		
		
		   $sql = mysqli_query($dbConn,"SELECT COUNT(*) as duplicate FROM lq_pilot WHERE email='$check'");
					
				$result = mysqli_fetch_array($sql,MYSQLI_ASSOC);
				if($result['duplicate'] > 0) 
				{
					
					$json['status']="success";
					$json['message']="This Email ID Already Registered";
					
						
				}
		
		
	}
	else
	{
		
	// throw error	
		
		
		
	}
	
}
if($type=="user")
{
	
	if($field=="mobile")
	
	{
				
				$sql = mysqli_query($dbConn,"SELECT COUNT(*) as duplicate FROM lq_user WHERE mobile='$check'");
					
				$result = mysqli_fetch_array($sql,MYSQLI_ASSOC);
				if($result['duplicate'] > 0) 
				{
					
					$json['status']="success";
					$json['message']="This Mobile number Already Registered";
					
						
				}
		
		
		
	}
	if($field=="email")
	{
		$sql = mysqli_query($dbConn,"SELECT COUNT(*) as duplicate FROM lq_user WHERE email='$check'");
					
				$result = mysqli_fetch_array($sql,MYSQLI_ASSOC);
				if($result['duplicate'] > 0) 
				{
					
					$json['status']="success";
					$json['message']="This Email ID Already Registered";
					
						
				}
		
		
		
		
	}
	if($field=="username")
	{
		
		$sql = mysqli_query($dbConn,"SELECT COUNT(*) as duplicate FROM lq_user WHERE username='$check'");
					
				$result = mysqli_fetch_array($sql,MYSQLI_ASSOC);
				if($result['duplicate'] > 0) 
				{
					
					$json['status']="success";
					$json['message']="This username already Taken";
					
						
				}
		
		
		
		
	}
	else
	{
		
	// throw error	
		
		
		
	}
	
}

if($type=="customer")
{
	
	
	if($field=="mobile")
	{
		
					
				$sql = mysqli_query($dbConn,"SELECT COUNT(*) as duplicate FROM lq_customer WHERE telephone='$check'");
					
				$result = mysqli_fetch_array($sql,MYSQLI_ASSOC);
				if($result['duplicate'] > 0) 
				{
					
					$json['status']="success";
					$json['message']="This Mobile number Already Registered";
					
						
				}
		
		
	}
	if($field=="email")
	{
		
		
		   $sql = mysqli_query($dbConn,"SELECT COUNT(*) as duplicate FROM lq_customer WHERE email='$check'");
					
				$result = mysqli_fetch_array($sql,MYSQLI_ASSOC);
				if($result['duplicate'] > 0) 
				{
					
					$json['status']="success";
					$json['message']="This Email ID Already Registered";
					
						
				}
		
		
	}
	else
	{
		
	// throw error	
		
		
		
	}
	
}
	
	
}

else
{


		 $json['status']='failed';
	     $json['message']='Please fill all the fields';



}	


echo json_encode($json);


?>