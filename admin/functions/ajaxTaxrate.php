<?php

include("../../common/config.php");



    $query = "SELECT tax_rate_id,name FROM lq_tax_rate ORDER BY tax_rate_id";
    
    $result =mysqli_query($dbConn,$query) or die("database error:". mysqli_error($dbConn)); 
    
    $rowcount=mysqli_num_rows($result);
   

  
     $count=$rowcount;
    if($rowcount > 0)
	{
        echo '<option value="">--Select Tax Rate--</option>';
		
        while($row = mysqli_fetch_array($result,MYSQLI_ASSOC))
		{ 
            echo "<option value=".$row['tax_rate_id'].">".$row['name']."</option>";
            
        }
    }
	else
	{
        echo '<option value="">-- No data --</option>';
    }
    mysqli_close($dbConn);
?>