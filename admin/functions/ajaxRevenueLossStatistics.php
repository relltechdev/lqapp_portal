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
	    
	  $aquery = "SELECT DATE(date_added) as date,COUNT(*) as count FROM lq_order WHERE  date_added BETWEEN '$sdate' AND '$edate'";
   
   }
   else if($datediff>31)
   {
	   $type="year";
	   $query = "SELECT MONTH(date_added) as date,COUNT(*) as count FROM lq_order WHERE  date_added BETWEEN '$sdate' AND '$edate'";
   }
   else {
    
  
  
  $daycheck=date("D",strtotime($sdate));
  
  if($daycheck!="Mon")
  {
  $sdate=date('Y-m-d', strtotime('next monday', strtotime($sdate)));
  $edate=new DateTime($sdate);
  $edate->modify("+6 day");
  $edate=$edate->format("Y-m-d");
  }
  
 

  // past date range  
  $psdate=date('Y-m-d', strtotime('previous monday', strtotime($sdate)));
 
  $pedate=new DateTime($psdate);
  $pedate->modify("+6 day");
  $pedate=$pedate->format("Y-m-d");
  $json=array();
  $data1=array();
  $label=array();
  $data2=array();
  $type="week";
  
    }
  $aquery="";
  $bquery="";
  

  
   $json['sdate']=$sdate; //current starting date
   $json['edate']=$edate; //current ending date
   $json['psdate']=$psdate; //past starting date
   $json['pedate']=$pedate; //past ending date
   
   
  
  
  $json['type']=$type;
  
  
  if($type=="week")
  {
	  $tsdate=$sdate;
	  $tedate=$edate;
	  
	  //date 2
	  
	  $tpsdate=$psdate;
	  $tpedate=$pedate;
  $json['label']=['Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday', 'Sunday'];
   for( $i=0; $i<=$count; $i++)
   {
    
	 // increment temp end date 1
	 // $json['tdate'][$i]=$tsdate;
	  $tedate = new DateTime($tsdate);
	  $tedate->modify("+1 day");
	  $tedate=$tedate->format("Y-m-d");
	  
	  // increment temp date 2
	 // $json['tpdate'][$i]=$tpsdate;
	  $tpedate = new DateTime($tpsdate);
	  $tpedate->modify("+1 day");
	  $tpedate=$tpedate->format("Y-m-d");
	 
	 // $tsdate = new DateTime($tdate);
	 // $tsdate=$tsdate->format("Y-m-d");
	
	
	
	
	
	
    //Query
	                    
	 $aquery = "SELECT DATE_FORMAT(o.date_added,'%d-%m-%Y') as date,ROUND(t.value, 0) as value,COUNT(*) as count FROM lq_order o INNER JOIN lq_order_total t ON (o.order_id=t.order_id) WHERE o.tracking='' AND t.code='to_pay' AND o.date_added BETWEEN  '$tsdate' AND '$tedate'";
     $bquery = "SELECT DATE_FORMAT(o.date_added,'%d-%m-%Y') as date,ROUND(t.value, 0) as value,COUNT(*) as count FROM lq_order o INNER JOIN lq_order_total t ON (o.order_id=t.order_id) WHERE o.tracking='' AND t.code='to_pay' AND o.date_added BETWEEN  '$tpsdate' AND '$tpedate'";

	 
	 
 $result1 =mysqli_query($dbConn,$aquery) or die("database error:". mysqli_error($dbConn));
 $result2 =mysqli_query($dbConn,$bquery) or die("database error:". mysqli_error($dbConn)); 	
    //Count total number of rows
     $rowcount1=mysqli_num_rows($result1);
	 $rowcount2=mysqli_num_rows($result2);
   

    //Display states list
    if($rowcount1 > 0 && $rowcount2> 0){

	
        
   $row1 = mysqli_fetch_array($result1, MYSQL_ASSOC);
   $row2 = mysqli_fetch_array($result2, MYSQL_ASSOC);
           
	   
		   
         $d1=new DateTime($tsdate);
		 $json['date1'][$i]=$d1->format("d M Y");
		 if($row1['count']!=0)
		 {
			 $json['revenueloss1'][$i]=$row1['value'];
		 }
		 else
		 {
			 $json['revenueloss1'][$i]=0;
		 }
		// $sql = "SELECT value FROM lq_order_total WHERE  code='to_pay' AND order_id='$order_id'";	
		 
		// $json['count1'][$i]=$row1['count'];
		 $d2=new DateTime($tpsdate);
		 $json['date2'][$i]=$d2->format("d M Y");
		 
		  if($row2['count']!=0)
		 {
			 $json['revenueloss2'][$i]=$row2['value'];
		 }
		 else
		 {
			 $json['revenueloss2'][$i]=0;
		 }
		// $json['count2'][$i]=$row2['count'];
    
                                                          
     
	
       $json['label1']="Selected Week";
	   $json['label2']="Previous Week";
       $json['status']="success";
       $json['msg']="Data loaded";
          

        }
    else
	   {
	    $json["status"]="failed";
       $json['msg']="Data loading failed";
       }
	   
	   // increment temp date 1
	 // $json['tdate'][$i]=$tsdate;
	  $tdate = new DateTime($tsdate);
	  $tdate->modify("+1 day");
	  $tdate=$tdate->format("Y-m-d");
	  $tsdate=$tdate;
	  // increment temp date 2
	 // $json['tpdate'][$i]=$tpsdate;
	  $tpdate = new DateTime($tpsdate);
	  $tpdate->modify("+1 day");
	  $tpdate=$tpdate->format("Y-m-d");
	  $tpsdate=$tpdate;
	 // $tsdate = new DateTime($tdate);
	 // $tsdate=$tsdate->format("Y-m-d");
	
	   
   }
   
  }
  
  else if($type=="month")
  {
	  
	   
	  $tsdate=$sdate;
	  $tedate=$edate;
	  
	  
	  
	   // past date range  
  $psdate=date('Y-m-d', strtotime('previous month', strtotime($sdate)));
 
  $pedate=new DateTime($psdate);
  $pedate->modify("+6 day");
  $pedate=$pedate->format("Y-m-d");
  $json=array();
  $data1=array();
  $data2=array();
  
   
	  //date 2
	  
	  $tpsdate=$psdate;
	  $tpedate=$pedate;
  
   $label1=new DateTime($tsdate);
   $json['label1']=$label1->format("M Y");
   $label2=new DateTime($psdate);
   $json['label2']=$label2->format("M Y");
  
   for( $i=0; $i<=$count; $i++)
   {
    
	 // increment temp end date 1
	 // $json['tdate'][$i]=$tsdate;
	  $tedate = new DateTime($tsdate);
	  $tedate->modify("+1 day");
	  $tedate=$tedate->format("Y-m-d");
	  
	  // increment temp date 2
	 // $json['tpdate'][$i]=$tpsdate;
	  $tpedate = new DateTime($tpsdate);
	  $tpedate->modify("+1 day");
	  $tpedate=$tpedate->format("Y-m-d");
	 
	 // $tsdate = new DateTime($tdate);
	 // $tsdate=$tsdate->format("Y-m-d");
	
	
	
	
	$json['label'][$i]=($i+1);
	
    //Query
	                    
	 $aquery = "SELECT DATE_FORMAT(o.date_added,'%d-%m-%Y') as date,ROUND(t.value, 0) as value,COUNT(*) as count FROM lq_order o INNER JOIN lq_order_total t ON (o.order_id=t.order_id) WHERE o.tracking='' AND t.code='to_pay' AND o.date_added BETWEEN  '$tsdate' AND '$tedate'";
     $bquery = "SELECT DATE_FORMAT(o.date_added,'%d-%m-%Y') as date,ROUND(t.value, 0) as value,COUNT(*) as count FROM lq_order o INNER JOIN lq_order_total t ON (o.order_id=t.order_id) WHERE o.tracking='' AND t.code='to_pay' AND o.date_added BETWEEN  '$tpsdate' AND '$tpedate'";

 $result1 =mysqli_query($dbConn,$aquery) or die("database error:". mysqli_error($dbConn));
 $result2 =mysqli_query($dbConn,$bquery) or die("database error:". mysqli_error($dbConn)); 	
    //Count total number of rows
     $rowcount1=mysqli_num_rows($result1);
	 $rowcount2=mysqli_num_rows($result2);
   

    //Display states list
    if($rowcount1 > 0 && $rowcount2> 0){

        
   $row1 = mysqli_fetch_array($result1, MYSQL_ASSOC);
   $row2 = mysqli_fetch_array($result2, MYSQL_ASSOC);
           
         $d1=new DateTime($tsdate);
		 $json['date1'][$i]=$d1->format("d M Y");
		 $json['revenueloss1'][$i]=$row1['count'];
		 $d2=new DateTime($tpsdate);
		 $json['date2'][$i]=$d2->format("d M Y");
		 $json['revenueloss2'][$i]=$row2['count'];
    
	   
       
       $json['status']="success";
       $json['msg']="Data loaded";
          

        }
    else
	   {
	    $json["status"]="failed";
       $json['msg']="Data loading failed";
       }
	   
	   // increment temp date 1
	 // $json['tdate'][$i]=$tsdate;
	  $tdate = new DateTime($tsdate);
	  $tdate->modify("+1 day");
	  $tdate=$tdate->format("Y-m-d");
	  $tsdate=$tdate;
	  // increment temp date 2
	 // $json['tpdate'][$i]=$tpsdate;
	  $tpdate = new DateTime($tpsdate);
	  $tpdate->modify("+1 day");
	  $tpdate=$tpdate->format("Y-m-d");
	  $tpsdate=$tpdate;
	 // $tsdate = new DateTime($tdate);
	 // $tsdate=$tsdate->format("Y-m-d");
	
	   
   } 
	  
	  
	  
  }
  
   else if($type=="year")
  {
	  
	  
	$cyear=date("Y",strtotime($sdate));
	$pyear=date('Y', strtotime('previous year', strtotime($sdate)));
	$smonth=1;
	$emonth=12;
	 
    
  $json=array();
  $data1=array();
  $data2=array();
  
   
	  //date 2
	  
	  $tpsdate=$psdate;
	  $tpedate=$pedate;
  
  
   for( $i=0; $i<$emonth; $i++)
   {
    
	 
	
	
   $monthNum  =$i+1;
   $dateObj   = DateTime::createFromFormat('!m', $monthNum);
   $monthName = $dateObj->format('F'); // March
	
	$json['label'][$i]=$monthName;
	
    //Query
	                    
	 $aquery = "SELECT COUNT(*) as count,SUM(ROUND(t.value, 0)) as value FROM lq_order o INNER JOIN lq_order_total t ON (o.order_id=t.order_id) WHERE o.tracking='' AND t.code='to_pay'  AND MONTH(o.date_added)='$monthNum' AND YEAR(o.date_added)='$cyear'";
     $bquery = "SELECT COUNT(*) as count,SUM(ROUND(t.value, 0)) as value FROM lq_order o INNER JOIN lq_order_total t ON (o.order_id=t.order_id) WHERE o.tracking='' AND t.code='to_pay'  AND MONTH(o.date_added)='$monthNum' AND YEAR(o.date_added)='$pyear'";

 $result1 =mysqli_query($dbConn,$aquery) or die("database error:". mysqli_error($dbConn));
 $result2 =mysqli_query($dbConn,$bquery) or die("database error:". mysqli_error($dbConn)); 	
    //Count total number of rows
     $rowcount1=mysqli_num_rows($result1);
	 $rowcount2=mysqli_num_rows($result2);
   

    //Display states list
    if($rowcount1 > 0 && $rowcount2> 0){

        
   $row1 = mysqli_fetch_array($result1, MYSQL_ASSOC);
   $row2 = mysqli_fetch_array($result2, MYSQL_ASSOC);
           
        
		 $json['date1'][$i]=$monthName+" "+$cyear;
		 $json['revenueloss1'][$i]=$row1['value'];
		 
		 $json['date2'][$i]=$monthName+" "+$pyear;
		 $json['revenueloss2'][$i]=$row2['value'];
    
	   
       $json['label1']=$cyear;
	   $json['label2']=$pyear;
       $json['status']="success";
       $json['msg']="Data loaded";
          

        }
    else
	   {
	    $json["status"]="failed";
       $json['msg']="Data loading failed";
       }
	   

	
	   
   }  
	  
	  
	  
  }
   
  
  
  
  
  
 
   
  
   echo json_encode($json);
    mysqli_close($dbConn);
?>