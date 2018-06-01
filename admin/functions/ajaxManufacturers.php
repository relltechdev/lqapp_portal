<?php

include("../../common/config.php");



    $query = "SELECT name,manufacturer_id FROM lq_manufacturer ORDER BY name ASC";
    
    $result =mysqli_query($dbConn,$query) or die("database error:". mysqli_error($dbConn)); 
    
    $rowcount=mysqli_num_rows($result);
   

  
     $count=$rowcount;
    if($rowcount > 0)
	{
        echo '<option value="">--Select Manufacturer--</option>';
		
        while($row = mysqli_fetch_array($result,MYSQLI_ASSOC))
		{ 
            echo "<option value=".$row['manufacturer_id'].">".$row['name']."</option>";
            $count--;
        }
    }
	else
	{
        echo '<option value="">-- No data --</option>';
    }
    mysqli_close($dbConn);
?>