<?php
require("../../common/config.php");


$json=array();

if (isset($_POST['uid']))
{
$id = $_POST['uid'];

$fname = mysqli_real_escape_string($dbConn,htmlspecialchars($_POST['fname']));
$lname = mysqli_real_escape_string($dbConn,htmlspecialchars($_POST['lname']));
$uemailid = mysqli_real_escape_string($dbConn,htmlspecialchars($_POST['uemailid']));
$umobileno = mysqli_real_escape_string($dbConn,htmlspecialchars($_POST['umobileno']));
$pwd = mysqli_real_escape_string($dbConn,htmlspecialchars($_POST['upwd']));
if(strlen($pwd)<16)
{
	$upwd=md5($pwd);
}
else{
	$upwd = $_POST['upwd'];
    }

 if($fname!=""){$q0="firstname='$fname',";} else {$q0="";}
 if($lname!=""){$q1="lastname='$lname',";} else {$q1="";}
  if($uemailid!=""){$q2="email='$uemailid',";} else { $q2=""; }
   if($umobileno!=""){$q3="mobile='$umobileno',";} else { $q3=""; }
    if($upwd!=""){$q4="password='$upwd'";} else  { $q4=""; }








//insertion

try{
	
	date_default_timezone_set('Asia/Calcutta');
  
    $timestamp = date('Y-m-d H:i:s');
 
	
	$query="UPDATE lq_user SET $q0 $q1 $q2 $q3 $q4  WHERE user_id='$id'";

    $result=mysqli_query($dbConn,$query) or die("database error:". mysqli_error($dbConn)); 
	
    if($result) 
	{
				 mysqli_close($dbConn);
				
				 $json['status']='success';
	             $json['message']=' profile Updated Successfully';
				
			
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