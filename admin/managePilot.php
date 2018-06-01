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
                    <h2>Pilot List</h2>
                
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                      <!-- Main content -->
   

       <!-- Default box -->
	   
	  
     
	<div class="box-header with-border">
	
        
			<button type="button" class="btn btn-primary pull-right" id="del" disabled   data-toggle="tooltip" title="Delete">
              <i class="fa fa-fw fa-trash"></i> Delete</button>
            <a href="addPilot.php" class="btn btn-primary pull-right" style="margin-right:5px;"  data-toggle="tooltip" title="Add New">
              <i class="fa fa-plus"></i> Add New</a>
            
          
        </div>
        <div class="box-body">
		
		<form id="form-user" enctype="multipart/form-data"  action="">
          <table id="data_table_lq" class="table table-bordered table-striped">
		  <thead>
                <tr>
				  <th style="width:1px"><input type="checkbox" onclick="$('input[name*=\'selected\']').prop('checked', this.checked);"></th>
				    <th>Image</th>
					<th>Name</th>
					<th>Email</th>
					<th>Mobile</th>
					<th>Registered Date</th>
					<th>Status</th>
                  
                  <th style="text-align:right;">Action</th>
                </tr>
			</thead>
            <tbody>
				<?php
				if(isset($_GET['id']))
				{
					$pilot_id=$_GET['id'];
					$sql="SELECT pilot_id,firstname,lastname,email,mobile,image,status,DATE_FORMAT(date_added,'%M %d %Y') as date_added FROM lq_pilot WHERE pilot_id='$pilot_id'";
				}
				else
				{
					$sql="SELECT pilot_id,firstname,lastname,email,mobile,image,status,DATE_FORMAT(date_added,'%M %d %Y') as date_added FROM lq_pilot ORDER BY pilot_id";
					
				}
					$result=mysqli_query($dbConn,$sql);
					if($result){
						while($row=mysqli_fetch_array($result)){
							echo '<tr>';
							echo '<td><input type="checkbox" value="'.$row['pilot_id'].'" name="selected[]"></td>';
							
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
							echo '<td>'.$row['firstname'].' '.$row['firstname'].'</td>';
							echo '<td>'.$row['email'].'</td>';
							echo '<td>'.$row['mobile'].'</td>';
							echo '<td>'.$row['date_added'].'</td>';
							if($row['status']==1)
								echo '<td>Enabled</td>';
							else
								echo '<td>Disabled</td>';
							echo '<td style="text-align:right"><a class="btn btn-primary" href="editPilot.php?id='.$row['pilot_id'].'&type=edit"><i class="fa fa-fw fa-edit"></i>Edit</a>&nbsp;<a class="btn btn-info pilotinfobtn" data-pilotid="'.$row['pilot_id'].'"><i class="fa  fa-info"></i> info</a></td>';
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
       <h3>Live Information</h3>
       </div>
       <div class='modal-body'>
	   <div>
	    <div>
	   
	    <span class='info-message'>   </span>
	   <table class="table table-bordered data info-table" width="100%">
                     
                    <tbody>
                          <tr>
                          <th><i class="fa fa-circle availablity"></i><span class='info-availability'> offline</span></th>
                          <th colspan='2'>Location</th>
						 
                          </tr>
                          <tr>
                          <td rowspan="2" style="width: 210px;">
						   <!--profile pic -->
	                     
	                      <div class="card">
                          <img class='info-image' src="<?php echo $filename; ?>" alt="Avatar" style="width:60%"/>
                          <div class="container">
                          <h4><b class="info-name">No data</b></h4> 
                          <p class="info-contact">No data</p> 
						  <h4>₹ <span class="info-cash" >0000</span></h4> 
                          </div>
                          </div>           
	                      
	                        <!--pic end -->
						  
						  </td>
                          <td rowspan="2" colspan='2' >
						  <div id="pilotmap" style="width:auto;height:300px;"></div>
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
				// getLiveData(c);
			// $('#info_modal').modal({show:true});
			   	$('.pilotinfobtn') .click();
			}
			
			
		});
		
		function pilotMap(slat,slng,pilot) {
			var loc = new google.maps.LatLng(slat,slng);
      
   var mapOptions = {
        center: loc,
        zoom: 15,
		            }
	
     var map = new google.maps.Map(document.getElementById("pilotmap"), mapOptions);
      var marker = new google.maps.Marker({
          map: map,
          position:loc,
          title: pilot,
		  icon: 'images/pilot.png' 
        });
                                           }
		//Pilot info button
		$('.pilotinfobtn').on('click',function(e){
		
       		var pilotid=$(this).attr('data-pilotid');
			   getLiveData(pilotid);
			 $('#info_modal').modal({show:true});
				
			
		});
		
		//Delete button listener
		$('#del').on('click',function(e){
			
			e.preventDefault();
			
			
			
			 delete_pilot();
			
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
		<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBIcJjkM-A86b5VRdCosQk-YxDCA96Q1m4"></script>
		<?php include('common/footer.php'); ?>