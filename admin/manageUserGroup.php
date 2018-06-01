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
                    <h2>User Group List</h2>
                
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                      <!-- Main content -->
   

       <!-- Default box -->
	   
	  
     
	<div class="box-header with-border">
	
        
			<button type="button" class="btn btn-primary pull-right" id="del" disabled   data-toggle="tooltip" title="Delete">
              <i class="fa fa-fw fa-trash"></i> Delete</button>
            <a href="addUsergroup.php" class="btn btn-primary pull-right" style="margin-right:5px;"  data-toggle="tooltip" title="Add New">
              <i class="fa fa-plus"></i> Add New</a>
            
          
        </div>
        <div class="box-body">
		
		<form id="form-user" enctype="multipart/form-data"  action="">
          <table id="data_table_lq" class="table table-bordered table-striped">
		  <thead>
                <tr>
				  <th style="width:1px"><input type="checkbox" onclick="$('input[name*=\'selected\']').prop('checked', this.checked);"></th>
					<th>Group ID</th>
					<th>Name</th>
					<th>Permission</th>
                  <th style="text-align:center;">Action</th>
                </tr>
			</thead>
            <tbody>
				<?php
					$sql="SELECT user_group_id,name,permission FROM lq_user_group ORDER BY user_group_id";
					$result=mysqli_query($dbConn,$sql);
					if($result){
						while($row=mysqli_fetch_array($result)){
							echo '<tr>';
							echo '<td><input type="checkbox" value="'.$row['user_group_id'].'" name="selected[]"></td>';
							
							echo '<td>'.$row['user_group_id'].'</td>';
							echo '<td>'.$row['name'].'</td>';
							echo '<td>'.$row['permission'].'</td>';
							echo '<td style="text-align:center"><a class="btn btn-primary" href="editUsergroup.php?id='.$row['user_group_id'].'&type=edit"><i class="fa fa-fw fa-edit"></i>Edit</a>&nbsp;</td>';
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
			
          </div>
        </div>
		
        <!-- /page content -->
		<?php include('common/script.php'); ?>
	
		<script>
		
		
		//Delete button listener
		$('#del').on('click',function(e){
			
			e.preventDefault();
			
			
			
			 delete_usergroup();
			
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
        $("#data_table_lq").DataTable({"order": [[ 2, "asc" ]]});

		</script>
	
		<?php include('common/footer.php'); ?>