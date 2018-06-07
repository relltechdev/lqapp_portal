<?php

include("../../common/config.php");

//current date range
  $daycheck=date("D",strtotime(date('Y-m-d')));
  $sdate="";
  $edate="";
  if($daycheck!="Mon")
  {
  $sdate=date('Y-m-d', strtotime('previous monday', strtotime($daycheck)));
  $edate=new DateTime($sdate);
  $edate->modify("+6 day");
  $edate=$edate->format("Y-m-d");
  }
  else
  {
  $sdate=date('Y-m-d');
  $edate=date('Y-m-d', strtotime('+6 days'));
  }
  

  // past date range  
  $psdate=date('Y-m-d', strtotime('previous monday', strtotime($sdate)));
 
  $pedate=new DateTime($psdate);
  $pedate->modify("+6 day");
  $pedate=$pedate->format("Y-m-d");
  $json=array();
  $data1=array();
  $data2=array();
  $type="week";
  $aquery="";
  $bquery="";
  

   if(isset($_GET['sdate'])&&isset($_GET['edate']))
   {
	   
	   $sdate=$_GET['sdate'];
	   $edate=$_GET['edate'];
	   
   }
   $json['sdate']=$sdate; //current starting date
   $json['edate']=$edate; //current ending date
   $json['psdate']=$psdate; //past starting date
   $json['pedate']=$pedate; //past ending date
   
   
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
    
  
  
  $json['type']=$type;
  
  
  if($type=="week")
  {
	  $tsdate=$sdate;
	  $tedate=$edate;
	  
	  //date 2
	  
	  $tpsdate=$psdate;
	  $tpedate=$pedate;
  
   for( $i=0; $i<=$count; $i++)
   {
    
    //Query
	
	 $aquery = "SELECT DATE(date_added) as date,COUNT(*) as count FROM lq_order WHERE  date_added BETWEEN '$tsdate' AND '$tsdate'";
     $bquery = "SELECT DATE(date_added) as date,COUNT(*) as count FROM lq_order WHERE  date_added BETWEEN '$tpsdate' AND '$tpsdate'";

 $result1 =mysqli_query($dbConn,$aquery) or die("database error:". mysqli_error($dbConn));
 $result2 =mysqli_query($dbConn,$bquery) or die("database error:". mysqli_error($dbConn)); 	
    //Count total number of rows
     $rowcount1=mysqli_num_rows($result1);
	 $rowcount2=mysqli_num_rows($result2);
   

    //Display states list
    if($rowcount1 > 0 && $rowcount2> 0){

        
   $row1 = mysqli_fetch_array($result1, MYSQL_ASSOC);
   $row2 = mysqli_fetch_array($result2, MYSQL_ASSOC);
           
         $json['date1'][$i]=$tsdate;
		 $json['count1'][$i]=$row1['count'];
		 $json['date2'][$i]=$tpsdate;
		 $json['count2'][$i]=$row2['count'];
    
                                                          
     
	
       $json['label1']="This Week";
	   $json['label2']="Last Week";
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
  
  else if(type=="month")
  {
	  
	  
	  
	  
	  
  }
   
  
  
  
  
  
 
   
  
   echo json_encode($json);
    mysqli_close($dbConn);
?>