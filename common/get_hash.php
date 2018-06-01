<?php
header('Content-Type: application/json; charset=utf8');
$SALT="7O0iLu2zyS";

$json=array();

$posted = array();
if(!empty($_POST)) {
    //print_r($_POST);
  foreach($_POST as $key => $value) {    
    $posted[$key] = $value; 
	
  }
  $posted['salt']=$SALT;
}





if(empty($posted['txnid'])) {
  // Generate random transaction id
  $txnid = substr(hash('sha256', mt_rand() . microtime()), 0, 20);
} else {
  $txnid = $posted['txnid'];
}
$hash = '';


// Hash Sequence
$hashSequence = "key|txnid|amount|productinfo|firstname|email|udf1|udf2|udf3|udf4|udf5|||||";
if(empty($posted['hash']) && sizeof($posted) > 0) {
  
   if( empty($posted['key'])
          || empty($posted['txnid'])
          || empty($posted['amount'])
          || empty($posted['firstname'])
          || empty($posted['email'])
          || empty($posted['productinfo'])
           ) 
  {
    $formError = 1;
	
	
  } else {
    //$posted['productInfo'] = json_encode(json_decode('[{"name":"tutionfee","description":"","value":"500","isRequired":"false"},{"name":"developmentfee","description":"monthly tution fee","value":"1500","isRequired":"false"}]'));
	$hashVarsSeq = explode('|', $hashSequence);
    $hash_string = '';	
	foreach($hashVarsSeq as $hash_var) {
      $hash_string .= isset($posted[$hash_var]) ? $posted[$hash_var] : '';
      $hash_string .= '|';
    }

   $hash_string .= $SALT;
 

    $hash = strtolower(hash('sha512', $hash_string));

 $json['hash_string']=$hash_string;
 $json['payment_hash']=$hash;


  
  }
   } 
  elseif(!empty($posted['hash']))
  {
  $hash = $posted['hash'];
  $json['payment_hash']=$hash;
  
  }

echo json_encode($json);
?>