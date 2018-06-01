 <?php 
 require('common/header.php'); 
 require("../common/config.php");
 
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
                    <h2>Tax Rule List</h2>
                
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                      <!-- Main content -->
   

       <!-- Default box -->
	   
	  
     
	<div class="box-header with-border">
	
        
			<button type="button" class="btn btn-primary pull-right" id="del" disabled   data-toggle="tooltip" title="Delete">
              <i class="fa fa-fw fa-trash"></i> Delete</button>
            <a  class="btn btn-primary pull-right taxaddbtn" style="margin-right:5px;"  data-toggle="tooltip" title="Add New">
              <i class="fa fa-plus"></i> Add New</a>
            
          
        </div>
        <div class="box-body">
		
		<form id="form-user" enctype="multipart/form-data"  action="">
          <table id="data_table_lq" class="table table-bordered table-striped">
		  <thead>
                <tr>
				  <th style="width:1px"><input type="checkbox" onclick="$('input[name*=\'selected\']').prop('checked', this.checked);"></th>
				    <th>Rule Name</th>
					<th>Rate Name</th>
					<th>Rate</th>
					<th>Type</th>
					
					<th style="text-align:right;">Action</th>
                </tr>
			</thead>
            <tbody>
				<?php
					$sql="SELECT  r.tax_rule_id,r.based,t.name,t.rate,t.type FROM lq_tax_rule r LEFT JOIN lq_tax_rate t ON (t.tax_rate_id=r.tax_rate_id) ORDER BY r.tax_rule_id";
					$result=mysqli_query($dbConn,$sql);
					if($result){
						while($row=mysqli_fetch_array($result)){
							echo '<tr>';
							echo '<td><input type="checkbox" value="'.$row['tax_rule_id'].'" name="selected[]"></td>';
							
							
							echo '<td>'.$row['based'].'</td>';
							
							echo '<td>'.$row['name'].'</td>';
							echo '<td  style="text-align:right;">'.$row['rate'].'</td>';
							if($row['type']=="P")
							{
								echo '<td  style="text-align:center;">PERCENTAGE</td>';
						    }
							else
							{
								echo '<td  style="text-align:center;">AMOUNT</td>';
							}
							
							echo '<td style="text-align:right"><a class="btn btn-primary taxeditbtn" data-taxruleid="'.$row['tax_rule_id'].'"><i class="fa fa-fw fa-edit"></i>Edit</a></td>';
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
			
			
			  <!-- edit modal starts here -->
       <div id='edit_modal' class='modal fade'>
       <div class='modal-dialog'>
       <div class='modal-content'>
       <div class='modal-header'>
       <button type='button' class='close' data-dismiss='modal' aria-hidden='true'>&times;</button>
       <h3>Edit tax Rule</h3>
       </div>
       <div class='modal-body'>
	   <div>
	    <div>
	   
	    <span class='info-message'>   </span>
	   <form id="update_taxrule" action="" data-parsley-validate class="form-horizontal form-label-left">

                      <div class="form-group">
                      <label class="control-label col-md-3 col-sm-3 col-xs-12" for="category-name">Rule Name / Based On <span class="required">*</span>
                      </label>
                      <div class="col-md-6 col-sm-6 col-xs-12">
                      <input type="text" id="rule_name" name="rule_name" required="required" class="form-control col-md-7 col-xs-12" value="" >
                      </div>
                      </div>
                     
                      <div class="form-group">
                      <label class="control-label col-md-3 col-sm-3 col-xs-12">Tax Rate Name<span class="required">*</span>
                      </label>
                      <div class="col-md-6 col-sm-6 col-xs-12">
                      <select id="taxrate" name="taxrate" class="form-control" required>
                      <option value="">--Select Tax rate--</option>
                      </select>
                      </div>
                      </div>
			         
                      <div class="ln_solid"></div>
                      <div class="form-group">
                      <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
					   <input type="hidden" name="tax_rule_id" id="tax_rule_id"  />
                      <button type="button" class="btn btn-success edit_taxbtn">Save</button>
                      </div>
                      </div>

                      </form>
		
		
		
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
     <!-- edit modal ends -->
			
	
		
			  <!-- add new modal starts here -->
       <div id='add_modal' class='modal fade'>
       <div class='modal-dialog'>
       <div class='modal-content'>
       <div class='modal-header'>
       <button type='button' class='close' data-dismiss='modal' aria-hidden='true'>&times;</button>
       <h3>Add New tax Rule</h3>
       </div>
       <div class='modal-body'>
	   <div>
	    <div>
	   
	    <span class='info-message'>   </span>
	   <form id="add_taxrule" action="" data-parsley-validate class="form-horizontal form-label-left">

                      <div class="form-group">
                      <label class="control-label col-md-3 col-sm-3 col-xs-12" for="category-name">Rule Name / Based On <span class="required">*</span>
                      </label>
                      <div class="col-md-6 col-sm-6 col-xs-12">
                      <input type="text" id="rule_name" name="rule_name" required="required" class="form-control col-md-7 col-xs-12" value="" >
                      </div>
                      </div>
                     
                      <div class="form-group">
                      <label class="control-label col-md-3 col-sm-3 col-xs-12">Tax Rate Name<span class="required">*</span>
                      </label>
                      <div class="col-md-6 col-sm-6 col-xs-12">
                      <select id="addtaxrate" name="taxrate" class="form-control" required>
                      <option value="">--Select Tax rate--</option>
                      </select>
					 
                      </div>
                      </div>
			          
                      <div class="ln_solid"></div>
                      <div class="form-group">
                      <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                      <button type="button" class="btn btn-success save_taxbtn">Save</button>
                      </div>
                      </div>

                      </form>
		
		
		
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
     <!-- add new modal ends -->
			
          </div>
        </div>
        <!-- /page content -->
		<?php include('common/script.php'); ?>
		<script>
		
		
		  $(document).ready(function(){
	     
		 
            //tax rate ajax call
            $.ajax({
                type:'POST',
                url:'functions/ajaxTaxrate.php',
                success:function(html){
                    $('#taxrate').html(html);
					$('#addtaxrate').html(html);
					
                
                }
            }); 
			
			// Set status
					var status_id=$('#status_id').val();
					$("#status").val(status_id);
		
            });
		//Edit button
		$('.taxeditbtn').on('click',function(e){
		
       		var taxruleid=$(this).attr('data-taxruleid');
			  getTaxruleData(taxruleid);
			  $('#tax_rule_id').val(taxruleid);
			 $('#edit_modal').modal({show:true});
				
			
		});
		
		//Add button
		$('.taxaddbtn').on('click',function(e){
		
       		
			 $('#add_modal').modal({show:true});
				
			
		});
		
		
		//save button
		$('.save_taxbtn').on('click',function(e){
		
       		
			add_taxrule();
				
			
		});
		
		
		//update button
		$('.edit_taxbtn').on('click',function(e){
		
       		
			update_taxrule();
				
			
		});
		
		
		//Delete button listener
		$('#del').on('click',function(e){
			
			e.preventDefault();
			
			
			
			 delete_taxrule();
			
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
      //  $("#data_table_lq").DataTable({"order": [[ 2, "asc" ]]});

		</script>
		<?php include('common/footer.php'); ?>