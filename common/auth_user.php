<?php
include('config.php');
session_start(); // Starting Session
$json=array();
$auth_mail="";
$auth_mobile="";
$auth_name="";
$headers="";
$status="";
if (isset($_POST['username'])&&isset($_POST['passkey'])&&!empty($_POST['username'])&&!empty($_POST['passkey'])) 
{
// Define $username and $password
$username=$_POST['username'];
$password=$_POST['passkey'];

// To protect MySQL injection for Security purpose
$username = stripslashes($username);
$password = stripslashes($password);
$username = mysqli_real_escape_string($dbConn,$username);
$password = mysqli_real_escape_string($dbConn,$password);
$epwd=md5($password);


// SQL query to fetch information of registerd users and finds user match.

$query="SELECT u.*,ug.name as role_name FROM  lq_user u LEFT JOIN lq_user_group ug ON (u.user_group_id=ug.user_group_id) WHERE u.password='$epwd' AND (u.username='$username' OR u.email='$username') ";
$resultset= mysqli_query($dbConn,$query) or die("database error:". mysqli_error($dbConn));	

$rows=mysqli_fetch_array($resultset,MYSQLI_ASSOC);
$count =mysqli_num_rows($resultset);
$u_role =$rows['role_name'];
$auth_mail=$rows['email'];
$auth_mobile=$rows['mobile'];
$auth_name==$rows['firstname'];
$log_username=$rows['username'];
$log_userid=$rows['user_id'];
$status=$rows['status'];




	
if ($count == 1&&$status!="0") {

$_SESSION['user_role']=$u_role;
$_SESSION['login_user']=$log_username; // Initializing Session
$_SESSION['user_key']=$log_userid;	
	
//Sending mail 
$from = 'support@lq.com';
$to =$auth_mail;
$subject = 'One time password for login';
$str = '';

for($i=7;$i>0;$i--){
    $str = $str.chr(rand(97,122)); 

    /*  The above line concatenates one character at a time for
        seven iterations within the ASCII range mentioned.
        So, we get a seven characters random OTP comprising of
        all small alphabets. 
    */
}


$body = '<html>
<head><style type="text/css">

p{
	font-size:18px
}
table {
    border-collapse: collapse;
    width: 75%;
}

th, td {
    text-align: left;
    padding: 8px;
}

tr:nth-child(even){background-color: #f2f2f2;}
tr:nth-child(odd){background-color: #ECF5C6;}
.row1 tr{background-color: #ECF5C6;}
.row2 tr{background-color: #f2f2f2;}
th {
    background-color: #4CAF50;
    color: white;
}
</style>
</head><body>
hi <b>'.$auth_name.'</b><br>Your one time password is : '.$str.

'</body></html>';
$headers .= "From: ".$from. "\r\n" ."Reply-To: ".$from. "\r\n"."MIME-Version: 1.0 \n"."Content-Type: text/html; charset=ISO-8859-1 n";

/* mail($to, $subject, $body, $headers);


$ch = curl_init();
if (strpos($auth_mobile, '@') !== FALSE)
{
$auth_mobile="9940104048";
}
else if (strlen($auth_mobile)<10)
{
	$auth_mobile="9940104048";
}
$smsto = $auth_mobile;
$sendstatus="";
$message = "Hi ".$auth_name.", your LOGIN OTP for SARDIUS WEB PORTAL is '".$str."'. "; 
$msg=$message;
$otpmessage=urlencode($message);



curl_setopt_array($ch, array(
  CURLOPT_URL => "http://api.msg91.com/api/sendhttp.php?sender=SARDIS&route=4&mobiles=".$smsto."&authkey=195104AES9uRzKkROB5a69ba0b&country=91&message=".$otpmessage."&unicode=1",
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => "",
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 30,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => "GET",
  CURLOPT_SSL_VERIFYHOST => 0,
  CURLOPT_SSL_VERIFYPEER => 0,
));

$response = curl_exec($ch);
$err = curl_error($ch);

curl_close($ch);

if ($err) {
 $sendstatus=0;
} 
else 
{
  $sendstatus=1;
}

*/
require('settings.php');
if($otp_security!="ENABLE")
{
$_SESSION['secretpassword'] ="";
$_SESSION['OTPflag']=0;
        $json['status']="success";
		$json['message']="Login Successful";
		$json['key']=$u_role;
}
else
{
$_SESSION['secretpassword'] =$str;
$_SESSION['OTPflag']=1;
}


$log_msg='OTP for the '.$u_role.' '.$log_username.' is '.$str;
if($_SESSION['OTPflag']==1){
	
	    $json['status']="success";
		$json['message']="Login Successful";
		$json['key']="auth.php?userAuth=".strrev($str).md5($str);
 

}



}
 else
	 {
	if($status=="0")
	{ 
		$json['status']="failed";
		$json['message']="You have been Blocked";
		
		
	}
	else
	{
		
        $json['status']="failed";
		$json['message']="Username or Password is Invalid";
	}

     }
mysqli_close($dbConn); // Closing Connection
}
else{
	    $json['status']="failed";
		$json['message']="Please fill the fields";
    }
echo json_encode($json);
?>