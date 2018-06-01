<?php

include("../../common/config.php");



    $query = "SELECT c.category_id,d.name FROM lq_category c LEFT JOIN lq_category_description d ON (d.category_id=c.category_id) WHERE d.language_id='1' ORDER BY d.name ASC";
    
    $result =mysqli_query($dbConn,$query) or die("database error:". mysqli_error($dbConn)); 
    
    $rowcount=mysqli_num_rows($result);
   

  
     $count=$rowcount;
    if($rowcount > 0)
	{
        echo '<option value="">--Select Category--</option>';
		
        while($row = mysqli_fetch_array($result,MYSQLI_ASSOC))
		{ 
            echo "<option value=".$row['category_id'].">".$row['name']."</option>";
            $count--;
        }
    }
	else
	{
        echo '<option value="">-- No data --</option>';
    }
    mysqli_close($dbConn);
?>