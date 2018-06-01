  <?php 
 require('common/header.php'); 
 require('common/imageresize2.php');
 require("../common/config.php");
 require("../common/util.php");
 require("functions/getBannerData.php");



if(!empty($image_url))
		{
			$image=$image_url;
			
			$dplaceholder='images/'.$image;
			if (file_exists($dplaceholder)) {
				resize2($image,'100','100');
			$imageltrim=str_replace('catalog/','',$image_url);
			
			$parts = explode('.', $imageltrim);
			$last = array_pop($parts);
			$parts = array(implode('.', $parts), $last);

			$imgexplode= $parts[0].'_100x100.'.$parts[1]; 
			$dsrc='images/cache/'.$imgexplode;
			}
			else{
				$image='';
				$dplaceholder='images/no_image.png';
				$dsrc='images/cache/no_image.png';
			}
		}
		else{
			$image='';
		        $dplaceholder='images/no_image.png';
				$dsrc='images/cache/no_image.png';
		}
		
		
 ?>
 <!-- page content -->
        <div class="right_col" role="main">
          <div class="">
            <div class="page-title">
              <div class="title_left">
                <h3>G-MAD Admin Panel</h3>
              </div>

             <div class="pull-right">
                <div class="col-md-5 col-sm-5 col-xs-12">
                  <div class="form-group">
				    
                     <a href="manageBanner.php" style="border: 1px solid #172d44;border-radius: 0px;background: #3f5367; " data-toggle="tooltip" data-original-title="Back" id="viewbtn" class="btn btn-primary viewbtn"> <i class="fa fa-reply"></i> back</a>
                    
                  </div>
                </div>
              </div>
			  
			    <div class="pull-right">
                <div class="col-md-5 col-sm-5 col-xs-12">
                  <div class="form-group">
				    
                     <a href="addBanner.php" style="border: 1px solid #4CAF50;border-radius: 0px;background: #4CAF50; " data-toggle="tooltip" data-original-title="Add Banner" id="viewbtn" class="btn btn-primary viewbtn"> <i class="fa fa-plus"></i></a>
                    
                  </div>
                </div>
              </div>
            </div>

            <div class="clearfix"></div>

            <div class="row">
           
		   
		   
		   <!-- tab panel starts -->
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2> <small>Add New Category</small></h2>
                   
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                   
				     <form id="update_banner" action="" data-parsley-validate class="form-horizontal form-label-left">

                      <div class="form-group">
                      <label class="control-label col-md-3 col-sm-3 col-xs-12" for="category-name">Banner Name <span class="required">*</span>
                      </label>
                      <div class="col-md-6 col-sm-6 col-xs-12">
                      <input type="text" id="banner_name" name="banner_name" required="required" class="form-control col-md-7 col-xs-12" value="<?php echo $name;  ?>" >
                      </div>
                      </div>
                      <div class="form-group">
                      <label class="control-label col-md-3 col-sm-3 col-xs-12">Language<span class="required">*</span>
                      </label>
                      <div class="col-md-6 col-sm-6 col-xs-12">
                      <select id="lang" name="lang" class="form-control" required>
                      <option value="">--Select language--</option>
                      </select>
					  <input type="hidden" id="lang_id" value="<?php echo $lang; ?>" />
                      </div>
                      </div>
                     
                      <div class="form-group">
                      <label class="control-label col-md-3 col-sm-3 col-xs-12">Status <span class="required">*</span>
                      </label>
                      <div class="col-md-6 col-sm-6 col-xs-12">
                      <select id="status" name="status" class="form-control" required>
                      <option value="">--Select--</option>
                      <option value="1">Enabled</option>
                      <option value="0">Disabled</option>
                      </select>
					  <input type="hidden" id="status_id" value="<?php echo $status; ?>" />
                      </div>
                      </div>
			          <div class="form-group required">
				      <label class="control-label col-md-3 col-sm-3 col-xs-12" for="input-lastname">Image</label>
				      <div class="col-md-6 col-sm-6 col-xs-12">
				      <a href="" id="thumb-image" data-toggle="modal" data-target="#myModal" class="img-thumbnail"><img id="img-tag" src="<?php echo $dsrc;?>" alt="" title="" data-placeholder="<?php echo $dplaceholder;?>" /></a>
                      <input type="hidden" name="image" value="<?php echo $image;?>" id="image" />
			          <button type="button" name="remove-image" id="remove-image" class="btn btn-small btn-danger"><i class="fa fa-fw fa-remove"></i>Remove image</button>
                      </div>
			          </div>
                      <div class="ln_solid"></div>
                      <div class="form-group">
                      <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
					   <input type="hidden" name="bannerid" id="banner_id" value="<?php echo $id; ?>" />
                      <button type="button" class="btn btn-success save_catbtn">Save</button>
                      </div>
                      </div>

                      </form>
                 

                  </div>
                </div>
              </div>
			  <!-- tab panel end -->
			  
			  
			  
			  
            </div>
          </div>
        </div>
        <!-- /page content -->
		<?php 
		
		include('common/script.php'); 
		
		require('filemanagertext.php');
		?>
	  <script>
		//add category function listener
		$('.save_catbtn').on('click',function(e){
			
			e.preventDefault();
			
			update_banner();
			
		 });
		
		 $( "#remove-image" ).click(function() {
       	 $("#img-tag").attr("src", "images/cache/no_image.png");
	     $("#img-tag").attr("data-placeholder", "images/no_image.png");
	     $("#image").val("");
	 
           });
		   
		 
       $(document).ready(function(){
	      var banner_id=$('#banner_id').val();
		 
            //language ajax call
              $.ajax({
                type:'GET',
                url:'functions/ajaxLanguage.php',
				data:{"tag":"bannerlang"},
                success:function(html){
                    $('#lang').html(html);
					var lang=$('#lang_id').val();
					$('#lang').val(lang);
                
                }
            }); 
			
			// Set status
					var status_id=$('#status_id').val();
					$("#status").val(status_id);
		
            });
			
			
		
		</script>
		
		<?php include('common/footer.php'); ?>