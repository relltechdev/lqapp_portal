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
                    <h2>Product List</h2>
                
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                      <!-- Main content -->
   

       <!-- Default box -->
	   
	  
     
	<div class="box-header with-border">
	
        
			<button type="button" class="btn btn-primary pull-right" id="del" disabled   data-toggle="tooltip" title="Delete">
              <i class="fa fa-fw fa-trash"></i> Delete</button>
            <a href="addProduct.php" class="btn btn-primary pull-right" style="margin-right:5px;"  data-toggle="tooltip" title="Add New">
              <i class="fa fa-plus"></i> Add New</a>
            
          
        </div>
        <div class="box-body">
		
		<form id="form-user" enctype="multipart/form-data"  action="">
          <table id="data_table_lq" class="table table-bordered table-striped">
		  <thead>
                <tr>
				  <th style="width:1px"><input type="checkbox" onclick="$('input[name*=\'selected\']').prop('checked', this.checked);"></th>
				    <th>Image</th>
					<th>Product Name</th>
					<th>Model</th>
					<th>Price</th>
					<th>Tax</th>
					<th>Status</th>
                  
                  <th style="text-align:right;">Action</th>
                </tr>
			</thead>
            <tbody>
				<?php
					$sql="select p.product_id,p.image, pd.name, p.model,p.price, t.name as tax, p.status from lq_product p LEFT JOIN lq_product_description pd ON (p.product_id=pd.product_id) LEFT JOIN lq_tax_rule tr ON (p.tax_rule_id=tr.tax_rule_id) LEFT JOIN lq_tax_rate t ON (t.tax_rate_id=tr.tax_rate_id) WHERE pd.language_id='1' ORDER BY p.product_id";
					$result=mysqli_query($dbConn,$sql);
					if($result){
						while($row=mysqli_fetch_array($result)){
							echo '<tr>';
							echo '<td><input type="checkbox" value="'.$row['product_id'].'" name="selected[]"></td>';
							
							if(!empty($row['image'])){
								$filename='images/'.$row['image'];
								if (file_exists($filename)) {
									$test= pathinfo($row['image']);
									resize($row['image'],'40','40');
									$dirname= substr($test['dirname'], strlen('catalog/'));
									if(!empty($dirname))
										$dirname .='/';
						//echo $dirname.'<br>';
									$fileexp=explode(".",$test['basename']);
									$filename='images/cache/'.$dirname.$fileexp[0].'_40x40.'.$fileexp[1];
								}
								else{
								$filename='images/cache/no_image_40x40.png';
								}
							}
							else{
								$filename='images/cache/no_image_40x40.png';
							//resize('cache/no_image.png','40','40');
							}
							echo '<td style="text-align:left;"><img class="img-thumbnail" src="'.$filename.'"></td>';
							echo '<td>'.$row['name'].'</td>';
							echo '<td>'.$row['model'].'</td>';
							echo '<td  style="text-align:right;">'.$row['price'].'</td>';
							echo '<td  style="text-align:right;">'.$row['tax'].'</td>';
							if($row['status']==1)
								echo '<td>Enabled</td>';
							else
								echo '<td>Disabled</td>';
							echo '<td style="text-align:right"><a class="btn btn-primary" href="editProduct.php?id='.$row['product_id'].'&type=edit"><i class="fa fa-fw fa-edit"></i>Edit</a></td>';
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
			
			
			
			 delete_product();
			
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