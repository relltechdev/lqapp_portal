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

            <div class="clearfix"></div>

            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Customers List</h2>
                
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                      <!-- Main content -->
   

       <!-- Default box -->
	   
	  
     
	<div class="box-header with-border">
	
        
			<button type="button" class="btn btn-primary pull-right" id="del" disabled   data-toggle="tooltip" title="Delete">
              <i class="fa fa-fw fa-trash"></i> Delete</button>
            <a href="addCustomer.php" class="btn btn-primary pull-right" style="margin-right:5px;"  data-toggle="tooltip" title="Add New">
              <i class="fa fa-plus"></i> Add New</a>
            
          
        </div>
        <div class="box-body">
		
		<form id="form-user" enctype="multipart/form-data"  action="">
          <table id="data_table_lq" class="table table-bordered table-striped">
		  <thead>
                <tr>
				  <th style="width:1px"><input type="checkbox" onclick="$('input[name*=\'selected\']').prop('checked', this.checked);"></th>
					<th>Name</th>
					<th>Email</th>
					<th>Mobile</th>
					<th>Created Date</th>
					<th>Status</th>
                  
                  <th style="text-align:center;">Action</th>
                </tr>
			</thead>
            <tbody>
				<?php
				
				if(isset($_GET['id']))
				{
					$customer_id=$_GET['id'];
					$sql="SELECT customer_id,CONCAT(firstname, ' ', lastname) as name,telephone,email,status,DATE_FORMAT(date_added,'%M %d %Y') as date_added FROM  lq_customer WHERE customer_id='$customer_id'";
				}
				else
				{
					$sql="SELECT customer_id,CONCAT(firstname, ' ', lastname) as name,telephone,email,status,DATE_FORMAT(date_added,'%M %d %Y') as date_added FROM  lq_customer ORDER BY customer_id";
					
				}
					$result=mysqli_query($dbConn,$sql);
					if($result){
						while($row=mysqli_fetch_array($result)){
							echo '<tr>';
							echo '<td><input type="checkbox" value="'.$row['customer_id'].'" name="selected[]"></td>';
							
							echo '<td>'.$row['name'].'</td>';
							echo '<td>'.$row['email'].'</td>';
							echo '<td>'.$row['telephone'].'</td>';
							echo '<td>'.$row['date_added'].'</td>';
							if($row['status']==1)
								echo '<td>Enabled</td>';
							else
								echo '<td>Disabled</td>';
							echo '<td style="text-align:center"><a class="btn btn-primary" href="editCustomer.php?id='.$row['customer_id'].'&type=edit"><i class="fa fa-fw fa-edit"></i>Edit</a>&nbsp;<a class="btn btn-info customerinfobtn" data-customerid="'.$row['customer_id'].'"><i class="fa  fa-info"></i> info</a></td>';
							echo '</tr>';
						}
						mysqli_close($dbConn);
					}
				?>
			</tbody>
		</table>
			</form>
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
			
				  <!-- info modal starts here -->
       <div id='info_modal' class='modal fade'>
       <div class='modal-dialog'>
       <div class='modal-content'>
       <div class='modal-header'>
       <button type='button' class='close' data-dismiss='modal' aria-hidden='true'>&times;</button>
       <h3>Customer Information</h3>
       </div>
         <div class='modal-body'>
	   <div>
	    <div>
	   
	     <span class='info-message'>   </span>
	   <table class="table table-bordered data info-table" width="100%">
                     
                    <tbody>
                          
                          <tr>
                          <td  >
						   <!--profile pic -->
	                     
	           <a href="" class="orderlink" target="_blank"> <button type="button" style="padding-left: 48px;padding-right: 43px;" class="btn btn-primary pull-right bill_btn"    data-toggle="tooltip" title="History">
                                                                   <i class="fa fa-fw fa-file-alt"></i>Order History</button> </a>
                
				        
	                        <!--pic end -->
						  
						  </td>
                          
                          
                          </tr>
                          
                    </tbody>
                    </table>
	   
		
		
		
		</div>
		
		
		</div>
		<div>
        </div>
	    </div> <!--modal body end -->
        <div class='modal-footer'>
          <button type='button' class='btn btn-default' data-dismiss='modal'>Close</button>
          
        </div>
      </div>
      </div>
      </div>
     <!-- options modal ends -->
			
			
          </div>
        </div>
		
        <!-- /page content -->
		<?php include('common/script.php'); ?>
	
		<script>
		
		$(document).ready(function(){
			
			
			var url_string = window.location.href;
            var url = new URL(url_string);
            var c = url.searchParams.get("id");
			if(c!=""&&c!=null)
			{
				 var base_url="http://"+window.location.hostname+"/lqapp";
		var link = base_url+'/admin/manageOrders.php?id='+c;
		$('.orderlink').attr('href',link);
		console.log(link);
			 $('#info_modal').modal({show:true});
			
			}
            console.log(c);
			
		});
		
		
		//Pilot info button
		$('.customerinfobtn').on('click',function(e){
		
       		var customerid=$(this).attr('data-customerid');
		var base_url="http://"+window.location.hostname+"/lqapp";
		var link = base_url+'/admin/manageOrders.php?id='+customerid;
		    
			$('.orderlink').attr('href',link);
		 
			 $('#info_modal').modal({show:true});
				
			
		});
		
		
		//Delete button listener
		$('#del').on('click',function(e){
			
			e.preventDefault();
			
			
			
			 delete_customer();
			
			//confirm('Are you sure?') ? $('#form-user').submit() : false;
			
		 });
		
		
		
		  $('input[type="checkbox"]').click(function(){

			if ($('input[name*=\'selected\']').is(":checked")) {
         // do something if the checkbox is NOT checked
					$("#del").prop( "disabled", false );
			}
			else{
				  $("#del").prop( "disabled", true );
			}


            

        });
        $("#data_table_lq").DataTable({"order": [[ 4, "asc" ]]});

		</script>
	
		<?php include('common/footer.php'); ?>