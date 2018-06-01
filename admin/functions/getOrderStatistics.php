<?php



$week_sorder_count="0";
$month_sorder_count="0";
$week_forder_count="0";
$month_forder_count="0";

try{
	
//week success orders	

	
	 $query ="SELECT COUNT(*) as count FROM lq_order WHERE transaction_status='SUCCESS' AND HOUR(TIMEDIFF(NOW(),date_added))/24 <=7";
    
     $result=mysqli_query($dbConn,$query) or die("database error:". mysqli_error($dbConn)); 

	 $data= mysqli_fetch_array($result,MYSQLI_ASSOC); 
	 
     if($data)
     {
     $week_sorder_count=$data['count'];
       
     }

//week failed orders
      $query ="SELECT COUNT(*) as count FROM lq_order WHERE transaction_status!='SUCCESS' AND HOUR(TIMEDIFF(NOW(),date_added))/24 <=7";
    
     $result=mysqli_query($dbConn,$query) or die("database error:". mysqli_error($dbConn)); 

	 $data= mysqli_fetch_array($result,MYSQLI_ASSOC); 
	 
     if($data)
     {
     $week_forder_count=$data['count'];
     
     }	
	
	//month success orders	

	
	 $query ="SELECT COUNT(*) as count FROM lq_order WHERE transaction_status='SUCCESS' AND MONTH(NOW())=MONTH(date_added) AND YEAR(NOW())=YEAR(date_added)";
    
     $result=mysqli_query($dbConn,$query) or die("database error:". mysqli_error($dbConn)); 

	 $data= mysqli_fetch_array($result,MYSQLI_ASSOC); 
	 
     if($data)
     {
     $month_sorder_count=$data['count'];
    
     }

  //month failed orders
      $query ="SELECT COUNT(*) as count FROM lq_order WHERE transaction_status!='SUCCESS' AND MONTH(NOW())=MONTH(date_added) AND YEAR(NOW())=YEAR(date_added)";
    
     $result=mysqli_query($dbConn,$query) or die("database error:". mysqli_error($dbConn)); 

	 $data= mysqli_fetch_array($result,MYSQLI_ASSOC); 
	 
     if($data)
     {
     $month_forder_count=$data['count'];
      
     }	
	 mysqli_close($dbConn);
}
	
	
	

   catch(MySQLException $e) {
	
 

    mysqli_close($dbConn);                 
						    }
	
	

   
  




























?>