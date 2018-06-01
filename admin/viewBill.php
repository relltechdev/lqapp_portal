 <?php 
 require('common/header.php'); 
 require("../common/config.php");
 require("../common/util.php");
 require('common/imageresize.php');
 ?>
 
 <!-- page content -->
        <div class="right_col" role="main">
          <div class="">
            <div class="page-title">
              <div class="title_left">
                <h3>G-MAD Admin Panel </h3>
              </div>

                <div class="pull-right">
                <div class="col-md-5 col-sm-5 col-xs-12">
                  <div class="form-group">
				    
                     <a href="index.php"style="border: 1px solid #4CAF50;border-radius: 0px;background: #4CAF50; " data-toggle="tooltip" data-original-title="Home"  class="btn btn-primary viewbtn"> <i class="fa fa-home"></i></a>
                    
                  </div>
                </div>
              </div>
            </div>

			
			<?php
	
	            if(isset($_GET['id']))
				{
					$order_id=$_GET['id'];
					
				}
				else
				{
					$order_id=0;
				}
	
	?>
			
            <div class="clearfix"></div>

            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>View Bill</h2>
					
                <button type="button" class="btn btn-primary pull-right" id="print"   data-toggle="tooltip" title="Print">
              <i class="fa fa-fw fa-print"></i> Print </button>
			  
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                      <!-- Main content -->
   

       <!-- Default box -->
	   
	  
     
	
	
      	<?php
		
		
	$sql="select *, (SELECT `name` FROM `lq_customer_group` WHERE `customer_group_id`=(select `customer_group_id` from lq_customer where customer_id=o.customer_id)) as customer_group_name from `lq_order` o where order_id = '".$order_id."'";
	
	$result=mysqli_query($dbConn, $sql);
	$row=mysqli_fetch_array($result);
	?>
        <div class="box-body" id="printarea">
			<div class="row">
				<div class="col-md-4">
					<div class="panel panel-default">
						<div class="panel-heading">
							<h3 class="panel-title">
							<i class="fa fa-shopping-cart"></i>
							Order Details
							</h3>
						</div>
						<table class="table">
						<tbody>
							<tr>
								<td style="width: 1%;">
									<button class="btn btn-info btn-xs" title="" data-toggle="tooltip" data-original-title="Date Ordered"><i class="fa fa-fw fa-calendar "></i> </button>
								</td>
								<td>
									<?php //echo date('d/m/Y', strtotime($row['date_added']));
									echo $row['date_added'];
									?>
								</td>
							</tr>
							<tr>
								<td style="width: 1%;">
									<button class="btn btn-info btn-xs" title="" data-toggle="tooltip" data-original-title="Payment Method"><i class="fa fa-fw fa-credit-card "></i> </button>
								</td>
								<td>
									<?php 
									if($row['payment_method']=="")
									{
										echo "ORDER FAILED / PAYMENT DATA NOT FOUND";
									}
										else
										{
									echo $row['payment_method'];
										}
									?>
								</td>
							</tr>
							<tr>
								<td style="width: 1%;">
									<button class="btn btn-info btn-xs" title="" data-toggle="tooltip" data-original-title="Shipping Method"><i class="fa fa-fw fa-truck"></i> </button>
								</td>
								<td>
									<?php $ships=explode("-",$row['shipping_method']); echo "Door Delivery By LQ Pilot";?>
								</td>
							</tr>
						</table>
					</div>
				</div>
				<div class="col-md-4">
					<div class="panel panel-default">
						<div class="panel-heading">
							<h3 class="panel-title">
							<i class="fa fa-user"></i>
							Customer Details
							</h3>
						</div>
						<table class="table">
						<tbody>
							<tr>
								<td style="width: 1%;">
									<button class="btn btn-info btn-xs" title="" data-toggle="tooltip" data-original-title="Customer Name"><i class="fa fa-user "></i> </button>
								</td>
								<td>
									<?php echo $row['firstname'].' '.$row['lastname'];?>
								</td>
							</tr>
							<tr>
								<td style="width: 1%;">
									<button class="btn btn-info btn-xs" title="" data-toggle="tooltip" data-original-title="Customer Group Name"><i class="fa fa-fw fa-group "></i> </button>
								</td>
								<td>
									<?php echo $row['customer_group_name'];?>
								</td>
							</tr>
							<tr>
								<td style="width: 1%;">
									<button class="btn btn-info btn-xs" title="" data-toggle="tooltip" data-original-title="Email"><i class="fa fa-fw fa-envelope-o"></i> </button>
								</td>
								<td>
									<?php  echo $row['email'];?>
								</td>
							</tr>
							<tr>
								<td style="width: 1%;">
									<button class="btn btn-info btn-xs" title="" data-toggle="tooltip" data-original-title="Contact No"><i class="fa fa-fw fa-phone"></i> </button>
								</td>
								<td>
									<?php  echo $row['telephone'];?>
								</td>
							</tr>
							
						</table>
					</div>
				</div>
				<div class="col-md-4">
					<div class="panel panel-default">
						<div class="panel-heading">
							<h3 class="panel-title">
							<i class="fa fa-user"></i>
							Delivery Details
							</h3>
						</div>
						<table class="table">
						<?php $pilot_id=$row['pilot_id'];
						
						$psql="select * from lq_pilot where pilot_id='$pilot_id'";
						
								$pilot_result=mysqli_query($dbConn, $psql);
								$pilot_row=mysqli_fetch_array($pilot_result);
					          
						?>
						
						<tbody>
							<tr>
								<td style="width: 1%;">
									<button class="btn btn-info btn-xs" title="" data-toggle="tooltip" data-original-title="Pilot Name"><i class="fa fa-user "></i> </button>
								</td>
								<td>
									<?php echo $pilot_row['firstname'].' '.$pilot_row['lastname'];?>
								</td>
							</tr>
							<tr>
								<td style="width: 1%;">
									<button class="btn btn-info btn-xs" title="" data-toggle="tooltip" data-original-title="Pilot Contact"><i class="fa fa-fw fa-mobile "></i> </button>
								</td>
								<td>
									<?php echo $pilot_row['mobile'];?>
								</td>
							</tr>
							
							
						</table>
					</div>
				</div>
			</div>
			<div class="panel panel-default">
				<div class="panel-heading">
					<h3 class="panel-title">
					<i class="fa fa-info-circle"></i>
					Order (#<?php  echo $row['order_id'];?>)
					</h3>
				</div>
				<div class="panel-body">
					<table class="table table-bordered">
						<thead>
							<tr>
								<td style="width: 50%;">
									<b>Payment Address</b>
								</td>
								<td style="width: 50%;">
									<b>Shipping Adress</b>
								</td>
							</tr>
						</thead>
						<tbody>
							<tr>
								<td>
									<address>
									<?php echo $row['payment_firstname'].' '.$row['payment_lastname'];?>
									<br>
									<?php echo $row['payment_address_1'];?>
									<?php if(!empty($row['payment_address_2']))
										echo '<br>'. $row['payment_address_2'];
									?>
									<br>
									<?php echo $row['payment_city'];?>
									<br>
									<?php echo $row['payment_postcode'];?>
									<br>
									<?php echo $row['payment_zone'];?>
									<br>
									<?php echo $row['payment_country'];?>
									</address>
								</td>
							<td>
								<address>
									<?php echo $row['shipping_firstname'].' '.$row['shipping_lastname'];?>
									<br>
									<?php echo $row['shipping_address_1'];?>
									<?php if(!empty($row['shipping_address_2']))
										echo '<br>'. $row['shipping_address_2'];
									?>
									<br>
									<?php echo $row['shipping_city'];?>
									<br>
									<?php echo $row['shipping_postcode'];?>
									<br>
									<?php echo $row['shipping_zone'];?>
									<br>
									<?php echo $row['shipping_country'];?>
								</address>
							</td>
							</tr>
						</tbody>
					</table>
					 <table class="table table-bordered">
						  <thead>
							<tr>
							  <td><b>Product</b></td>
							  <td><b>Model</b></td>
							  <td class="text-right"><b>Quantity</b></td>
							  <td class="text-right"><b>Unit Price</b></td>
							  <td class="text-right"><b>Total</b></td>
							</tr>
						  </thead>
						  <tbody>
							<?php 
								$sql="select * from lq_order_product where order_id = '".$row['order_id']."'";
								$product_result=mysqli_query($dbConn, $sql);
								while($product_row=mysqli_fetch_array($product_result)){
							?>
											<tr>
							  <td><?php echo $product_row['name'];?></td>
							  <td><?php echo $product_row['model'];?></td>
							  <td class="text-right"><?php echo $product_row['quantity'];?></td>
							  <td class="text-right"><?php echo $product_row['price'];?></td>
							  <td class="text-right"><?php echo $product_row['total'];?></td>
							</tr>
								<?php }?>
							<?php 
								$sql="select * from lq_order_total where order_id  = '".$row['order_id']."' order by sort_order";
								$total_result=mysqli_query($dbConn, $sql);
								while($total_row=mysqli_fetch_array($total_result)){
							?>
							 <tr>
							  <td class="text-right" colspan="4"><b><?php echo $total_row['title'];?></b></td>
							  <td class="text-right"><?php echo $total_row['value'];?></td>
							</tr>
							<?php }?>
									
								  </tbody>
						</table>
				</div>	
			</div>
			
		 </div>
		
        <!-- /.box-body -->
        <div class="box-footer">
          
        </div>
        <!-- /.box-footer-->
    
      <!-- /.box -->
      

    
                  </div>
                </div>
              </div>
            </div>
			
				
			
			
          </div>
        </div>
		
        <!-- /page content -->
		<?php include('common/script.php'); ?>
	
		<script>
		
		$(document).ready(function(){
			
			
			
			
		});
		
		
	
		
		
		//print button listener
		$('#print').on('click',function(e){
			
			e.preventDefault();
			
			PrintElem('printarea');
			
			
			
			
		 });
		
		
		//PRINT Function
		 function PrintElem(elem)
{
    var mywindow = window.open('', 'PRINT', 'height=400,width=600');

    mywindow.document.write('<html><head><title>' + document.title  + '</title>');
	mywindow.document.write(' <link href="../vendors/font-awesome_old/css/font-awesome.min.css" rel="stylesheet">');
    mywindow.document.write(' <link href="../vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet"></head><body > <link href="../build/css/custom.min.css" rel="stylesheet"><link href="../build/css/style.css" rel="stylesheet">');
  //mywindow.document.write('<style>@media print {#printarea { background-color: white;height: 100%;width: 100%;position: fixed;top: 0;left: 0;margin: 0; padding: 15px;font-size: 14px; line-height: 18px; }}</style>');
        
  mywindow.document.write(document.getElementById(elem).innerHTML);
    mywindow.document.write(' <script src="../vendors/jquery/dist/jquery.min.js"/><script src="../vendors/bootstrap/dist/js/bootstrap.min.js"/> </body> </html>');

    mywindow.document.close(); // necessary for IE >= 10
    mywindow.focus(); // necessary for IE >= 10*/

    mywindow.print();
    mywindow.close();

    return true;
}

		</script>
	
		<?php include('common/footer.php'); ?>