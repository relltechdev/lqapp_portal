<?php

include("../../common/config.php");

  
//current date range
  $sdate=date('Y-m-d');
  $edate=date('Y-m-d', strtotime('+6 days'));
  $psdate="";
  $pedate="";
 
  // checking week
  
   if(isset($_GET['sdate'])&&isset($_GET['edate']))
   {
	   
	   $sdate=$_GET['sdate'];
	   $edate=$_GET['edate'];
	   
   }
   
   $datediff = strtotime($edate) - strtotime($sdate);
   $datediff=round($datediff / (60 * 60 * 24));
   $count=$datediff;
   $json['datediff']=$datediff;

   
   if($datediff>28 && $datediff <=31)  // date range of 1 to 31 days
   {
      $type="month";
	    
	 
   
   }
   else if($datediff>31)
   {
	   $type="year";
	  
   }
   else 
   {
    
  
       $type="week";
  
    }
  $aquery="";
  $bquery="";
  
  

  
   $json['sdate']=$sdate; //current starting date
   $json['edate']=$edate; //current ending date
  
   
   
  
  
  $json['type']=$type;
  
  
	
	
    //Query
	 $aquery ="SELECT COUNT(*) as count,SUM(ROUND(t.value, 0)) as value FROM lq_order o INNER JOIN lq_order_total t ON (o.order_id=t.order_id) WHERE o.tracking='completed' AND t.code='to_pay' AND o.date_added BETWEEN '$sdate' AND '$edate'"            
     $bquery = "SELECT COUNT(*) as count,SUM(ROUND(t.value, 0)) as value FROM lq_order o INNER JOIN lq_order_total t ON (o.order_id=t.order_id) WHERE o.tracking='' AND t.code='to_pay' AND o.date_added BETWEEN '$sdate' AND '$edate'";

	// echo $aquery."<br>";
	// echo $bquery."<br>";
	 
 $result1 =mysqli_query($dbConn,$aquery) or die("database error:". mysqli_error($dbConn));
 $result2 =mysqli_query($dbConn,$bquery) or die("database error:". mysqli_error($dbConn)); 	
    //Count total number of rows
     $rowcount1=mysqli_num_rows($result1);
	 $rowcount2=mysqli_num_rows($result2);
   

    //Display states list
    if($rowcount1 > 0 && $rowcount2> 0){

	
        
   $row1 = mysqli_fetch_array($result1, MYSQL_ASSOC);
   $row2 = mysqli_fetch_array($result2, MYSQL_ASSOC);
           
	   
		   
        
		 if($row1['count']!=0)
		 {
			 $json['gain']=$row1['value'];
		 }
		 else
		 {
			 $json['gain']=0;
		 }
		// $sql = "SELECT value FROM lq_order_total WHERE  code='to_pay' AND order_id='$order_id'";	
		 
		// $json['count1'][$i]=$row1['count'];
		
		 
		  if($row2['count']!=0)
		 {
			 $json['loss']=$row2['value'];
		 }
		 else
		 {
			 $json['loss'][$i]=0;
		 }
		// $json['count2'][$i]=$row2['count'];
    
           $json['expected']=$row1['value']+$row2['value'];                                            
     
       $json['status']="success";
       $json['msg']="Data loaded";
          

        }
    else
	   {
	    $json["status"]="failed";
       $json['msg']="Data loading failed";
	   
       }
	   
	  
   
 
   
  
   echo json_encode($json);
    mysqli_close($dbConn);
?>