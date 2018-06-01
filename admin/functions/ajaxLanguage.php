<?php

include("../../common/config.php");

if(isset($_GET['tag'])&&isset($_GET['id'])&&!empty($_GET['id']))
{       
           $id=$_GET['id'];
	
	if($_GET['tag']=="prolang")
	{
		 $query = "SELECT l.name,l.language_id FROM lq_language l LEFT JOIN lq_product_description pd ON (l.language_id=pd.language_id) WHERE l.status='1'  AND pd.product_id='$id' AND l.language_id NOT IN('1') ORDER BY name ASC";
    
         $result =mysqli_query($dbConn,$query) or die("database error:". mysqli_error($dbConn)); 
    
         $rowcount=mysqli_num_rows($result);
   

  
         $count=$rowcount;
       
	   if($rowcount > 0)
	    {
        echo '<option value="">--Select Language--</option>';
		
        while($row = mysqli_fetch_array($result,MYSQLI_ASSOC))
		{ 
            echo "<option value=".$row['language_id'].">".$row['name']."</option>";
            $count--;
        }
        }
	    else
	    {
        echo '<option value="">-- No data --</option>';
        }
		
	}
		if($_GET['tag']=="catlang")
	{
		 $query = "SELECT l.name,l.language_id FROM lq_language l LEFT JOIN lq_category_description cd ON (l.language_id=cd.language_id) WHERE l.status='1'  AND cd.category_id='$id' AND l.language_id NOT IN('1') ORDER BY name ASC";
    
         $result =mysqli_query($dbConn,$query) or die("database error:". mysqli_error($dbConn)); 
    
         $rowcount=mysqli_num_rows($result);
   

  
         $count=$rowcount;
       
	   if($rowcount > 0)
	    {
        echo '<option value="">--Select Language--</option>';
		
        while($row = mysqli_fetch_array($result,MYSQLI_ASSOC))
		{ 
            echo "<option value=".$row['language_id'].">".$row['name']."</option>";
            $count--;
        }
        }
	    else
	    {
        echo '<option value="">-- No data --</option>';
        }
		
	}
	
	
	
	
    }
	
	
    else
		
	if($_GET['tag']=="bannerlang")
	{
		 $query = "SELECT name,language_id FROM lq_language WHERE status='1' ORDER BY name ASC";
    
         $result =mysqli_query($dbConn,$query) or die("database error:". mysqli_error($dbConn)); 
    
         $rowcount=mysqli_num_rows($result);
   

  
         $count=$rowcount;
       
	   if($rowcount > 0)
	    {
        echo '<option value="">--Select Language--</option>';
		
        while($row = mysqli_fetch_array($result,MYSQLI_ASSOC))
		{ 
            echo "<option value=".$row['language_id'].">".$row['name']."</option>";
            $count--;
        }
        }
	    else
	    {
        echo '<option value="">-- No data --</option>';
        }
		
	}
	
	else
    {

    $query = "SELECT name,language_id FROM lq_language WHERE status='1' AND language_id NOT IN('1') ORDER BY name ASC";
    
    $result =mysqli_query($dbConn,$query) or die("database error:". mysqli_error($dbConn)); 
    
    $rowcount=mysqli_num_rows($result);
   

  
     $count=$rowcount;
    if($rowcount > 0)
	{
        echo '<option value="">--Select Language--</option>';
		
        while($row = mysqli_fetch_array($result,MYSQLI_ASSOC))
		{ 
            echo "<option value=".$row['language_id'].">".$row['name']."</option>";
            $count--;
        }
    }
	else
	{
        echo '<option value="">-- No data --</option>';
    }
	
    }
    mysqli_close($dbConn);
?>