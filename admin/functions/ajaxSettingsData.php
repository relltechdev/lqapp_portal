<?php
include("../../common/config.php");
//Include database configuration file


if(isset($_POST["id"])&&!empty($_POST['id']))
       {

    
    $id=$_POST['id'];
    $json=array();
   
     $query = "SELECT * FROM lq_user_settings WHERE  user_id='$id'";
    
     $result =mysqli_query($dbConn,$query) or die("database error:". mysqli_error($dbConn)); 
    //Count total number of rows
     $rowcount=mysqli_num_rows($result);
   

    //Display states list
    if($rowcount > 0){

        
    while ($row = mysqli_fetch_array($result, MYSQL_ASSOC)) {
           
         $json['otp_security']=$row['SECURE_OTP'];
		 $json['session_timeout']=$row['IDLE_TIMEOUT'];
    
                                                          }
     
     
     
       $json['status']="success";
       $json['msg']="Settings loaded";
          

        }
    else
	   {
	    $json["status"]="failed";
       $json['msg']="settings not yet configured";
       }
	}
	   
	   else
	   {
	   $json["status"]="failed";
       $json['msg']="loading settings failed";
	   }

echo json_encode($json);


?>