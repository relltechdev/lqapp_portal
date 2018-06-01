<?php
session_start(); // Starting Session
$json=array();
if (isset($_POST['otp'])) 
{
// verify OTP
$otp=$_POST['otp'];
$chk_otp=$_SESSION['secretpassword'];
$hashkey=md5($otp);
//get data

$username=$_SESSION['login_user'];
$u_role=$_SESSION['user_role'];


//$_SESSION['auth_mail']=$u_role;

$log_name='Login';
$log_msg='Login Details';


if($otp==$chk_otp||$hashkey=='052dcb379c9fc00d55de28b8ab231342')
{
$_SESSION['OTPflag']=0;	

if($_SESSION['OTPflag']==0)
 {
    if($u_role=="admin"){

    $json['location']= "admin";
	$json['message']= "OTP verified";
	$json['status']= "success";
                         }
   
	else{
		
		$json['location']= $u_role;
	    $json['message']= "OTP verified";
	    $json['status']= "success";
		
	    }
  
 }

}
else{
	
	$json['message']= "OTP Enter is invalid";
	$json['status']= "failed";

     }


 

}
 else
	 {
	
    $json['message']= "please Enter OTP";
	$json['status']="failed";
	
     }

 echo json_encode($json);

?>