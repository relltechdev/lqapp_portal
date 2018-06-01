<?php

include("../../common/config.php");



    $query = "SELECT  r.tax_rule_id,r.based,tr.name,tr.rate FROM lq_tax_rule r LEFT JOIN lq_tax_rate tr ON (r.tax_rate_id=tr.tax_rate_id) ORDER BY r.tax_rule_id ASC";
    
    $result =mysqli_query($dbConn,$query) or die("database error:". mysqli_error($dbConn)); 
    
    $rowcount=mysqli_num_rows($result);
   

  
     $count=$rowcount;
    if($rowcount > 0)
	{
        echo '<option value="">--Select Tax Rule--</option>';
		
        while($row = mysqli_fetch_array($result,MYSQLI_ASSOC))
		{ 
            echo "<option value=".$row['tax_rule_id'].">".strtoupper($row['based'])." - ".$row['name']."</option>";
            $count--;
        }
    }
	else
	{
        echo '<option value="">-- No data --</option>';
    }
    mysqli_close($dbConn);
?>