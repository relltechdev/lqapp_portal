<?php

include("../../common/config.php");

$json=array();

if (!empty($_POST['id'])) {
  	
	
	
// Getting Data	
$userid=mysqli_real_escape_string($dbConn,htmlspecialchars($_POST['id']));
$otp_security=mysqli_real_escape_string($dbConn,htmlspecialchars($_POST['otplogin']));
$timeout=mysqli_real_escape_string($dbConn,htmlspecialchars($_POST["timeout"]));




  


//insertion

try{
	
	date_default_timezone_set('Asia/Calcutta');
  
   $timestamp = date('Y-m-d H:i:s'); 
 
    $query = "SELECT * FROM lq_user_settings WHERE  user_id='$userid'";
    
     $result =mysqli_query($dbConn,$query) or die("database error:". mysqli_error($dbConn)); 
    //Count total number of rows
     $rowcount=mysqli_num_rows($result);
   

    //Display states list
    if($rowcount > 0)
	         {

 $query="UPDATE lq_user_settings SET SECURE_OTP='$otp_security',IDLE_TIMEOUT='$timeout' WHERE user_id='$userid'";
			 }
		else
		{
    $query="INSERT into lq_user_settings SET user_id='$userid',SECURE_OTP='$otp_security',IDLE_TIMEOUT='$timeout'";
		}
	
	$result =mysqli_query($dbConn,$query) or die("database error:". mysqli_error($dbConn));	
	
if($result==TRUE)
{
	mysqli_close($dbConn);
	$json['success']='Settings saved successfully';
}
	else
	{
		echo mysqli_error($dbConn);
		
		$json['error']='saving failed'; 
	    
		
	}
	
	
}
catch(MySQLException $e) {
	
	echo $e;
	$json['error']='exception occurred '.$e;
      }
	
	
}

else
{

$json['error']='saving failed';



}	


echo json_encode($json);

?>