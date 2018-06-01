<?php

if(!empty($_GET['id'])&&isset($_GET['id']))
{

$id=$_GET['id'];

try{
	
	

	
	 $query = "SELECT p.model,p.image,p.manufacturer_id,p.tax_rule_id,p.weight,p.price,p.status,pd.name,pd.description,pc.category_id FROM lq_product p LEFT JOIN lq_product_description pd ON (p.product_id=pd.product_id) LEFT JOIN lq_product_to_category pc ON (pc.product_id=p.product_id) WHERE p.product_id='$id' AND pd.language_id='1'";
    
     $result =mysqli_query($dbConn,$query) or die("database error:". mysqli_error($dbConn)); 

	 $data= mysqli_fetch_array($result,MYSQLI_ASSOC);

if($data)
{
  
$model=$data['model']; 
$image_url= $data['image']; 
$manufacturer=$data['manufacturer_id'];
$tax=$data['tax_rule_id'];
$status=$data['status'];
$price=number_format($data['price'],2);
$weight=number_format($data['weight'],2);
$name=$data['name'];
$description=$data['description'];
$category=$data['category_id'];



}
else
{ 
$$model="";
$image_url="";
$manufacturer="";
$tax="";
$price="";
$status="";
$weight="";
$name="";
$description="";
$category="";

}

	
	
	
}
	
	
	

   catch(MySQLException $e) {
	

	$msg='exception occurred '.$e;
                         
						    }
	
	
}
   
   mysqli_close($dbConn);
	

	
?>