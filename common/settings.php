<?php
 $otp_security="";
 $session_timeout="";
$query = "SELECT * FROM lq_user_settings WHERE  user_id='$log_userid'";
   
     $result =mysqli_query($dbConn,$query) or die("database error:". mysqli_error($dbConn)); 
    //Count total number of rows
     $rowcount=mysqli_num_rows($result);
   

    //Display states list
    if($rowcount > 0){

        
    while ($row = mysqli_fetch_array($result, MYSQL_ASSOC)) {
           
         $otp_security=$row['SECURE_OTP'];
         $session_timeout=$row['IDLE_TIMEOUT'];
       
                                                          }
														  
                    }
					
					else
						
						{
							
         $otp_security="0";
         $session_timeout="off";
							
						}
 


?>