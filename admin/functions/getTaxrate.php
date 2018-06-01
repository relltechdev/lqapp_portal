<?php
require("../../common/config.php");


$json=array();


if (!empty($_POST["id"])) {
  	
	
	
// Getting Data	
$id=mysqli_real_escape_string($dbConn,htmlspecialchars($_POST["id"]));





//insertion

try{
	
	date_default_timezone_set('Asia/Calcutta');
  
    $timestamp = date('Y-m-d H:i:s');
 
	
	$query="SELECT name,rate,type FROM lq_tax_rate WHERE tax_rate_id='$id'";
	$result =mysqli_query($dbConn,$query) or die("database error:". mysqli_error($dbConn));	
    if($result) 
	{
		
		 while($row = mysqli_fetch_array($result,MYSQLI_ASSOC))
		{ 
           $json['name']=$row['name'];
		   $json['rate']=$row['rate'];
		   $json['type']=$row['type'];
            
        }
				 mysqli_close($dbConn);
				
				 $json['status']='success';
	            
				
			
	}
		
	else
	{
		
		
		 $json['status']='failed';
	     $json['message']='Something went wrong';
	    
		
	}
	
		
	
	
	
            }
catch(MySQLException $e)
     {
	$json['status']='failed';
	$json['message']='exception occurred '.$e;
	mysqli_close($dbConn);
      }
	
	
}

else
{


		 $json['status']='failed';
	     $json['message']='Please fill all the fields';



}	


echo json_encode($json);


?>