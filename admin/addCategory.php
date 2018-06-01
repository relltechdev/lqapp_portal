 <?php include('common/header.php'); 
 require('common/imageresize2.php');
 
$image='';
$dplaceholder='images/no_image.png';
$dsrc='images/cache/no_image.png';

 
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
                     <a href="manageCategory.php" style="border: 1px solid #172d44;border-radius: 0px;background: #3f5367; "  id="viewbtn" class="btn btn-primary viewbtn"> <i class="fa fa-eye"></i> View Category</a>
                    
               </div>
               </div>
               </div>
			     <div class="pull-right">
                <div class="col-md-5 col-sm-5 col-xs-12">
                  <div class="form-group">
				    
                     <a href="addCategory.php" style="border: 1px solid #4CAF50;border-radius: 0px;background: #4CAF50; " data-toggle="tooltip" data-original-title="Add Product" id="viewbtn" class="btn btn-primary"> <i class="fa fa-plus"></i> Add New</a>
                    
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

                    <!-- tab panel begins-->
                    <div class="" role="tabpanel" data-example-id="togglable-tabs">
                      <ul id="myTab" class="nav nav-tabs bar_tabs" role="tablist">
                        <li role="presentation" class="active"><a href="#tab_content1" id="home-tab" role="tab" data-toggle="tab" aria-expanded="true">General</a>
                        </li>
                        <li role="presentation" class=""><a href="#tab_content2" role="tab" id="profile-tab" data-toggle="tab" aria-expanded="false">Global</a>
                        </li>
                      </ul>
                      <div id="myTabContent" class="tab-content">
					  
                        <div role="tabpanel" class="tab-pane fade active in" id="tab_content1" aria-labelledby="home-tab">
                          
						  
				      <br/>
					  
                      <form id="add_category" action="" data-parsley-validate class="form-horizontal form-label-left">

                      <div class="form-group">
                      <label class="control-label col-md-3 col-sm-3 col-xs-12" for="category-name">Category Name <span class="required">*</span>
                      </label>
                      <div class="col-md-6 col-sm-6 col-xs-12">
                      <input type="text" id="cat-name" name="cat_name" required="required" class="form-control col-md-7 col-xs-12">
                      </div>
                      </div>
                      <div class="form-group">
                      <label class="control-label col-md-3 col-sm-3 col-xs-12" for="description">Description<span class="required">*</span>
                      </label>
					  <div class="col-md-6 col-sm-6 col-xs-12">
                      <textarea id="desc" required="required" class="form-control" name="desc" data-parsley-trigger="keyup" data-parsley-minlength="20" data-parsley-maxlength="100" data-parsley-minlength-message="Come on! You need to enter at least a 20 caracters long comment.."
                      data-parsley-validation-threshold="10"></textarea>
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
                      <button type="button" class="btn btn-success save_catbtn">Save</button>
                      </div>
                      </div>

                      </form>
					
						  
						  
                       </div>
						
                      <div role="tabpanel" class="tab-pane fade" id="tab_content2" aria-labelledby="profile-tab">
                          
				      <form id="add_category_desc" data-parsley-validate class="form-horizontal form-label-left">
                      
					  <div class="form-group">
                      <label class="control-label col-md-3 col-sm-3 col-xs-12">Language<span class="required">*</span>
                      </label>
                      <div class="col-md-6 col-sm-6 col-xs-12">
                      <select id="lang" name="lang" class="form-control" required>
                      <option value="">--Select language--</option>
                      </select>
                      </div>
                      </div>
                      <div class="form-group">
                      <label class="control-label col-md-3 col-sm-3 col-xs-12" for="category-name">Category Name<span class="required">*</span>
                      </label>
                      <div class="col-md-6 col-sm-6 col-xs-12">
                      <input type="text" id="cat-name" name="cat_name" required="required" class="form-control col-md-7 col-xs-12">
                      </div>
                      </div>
                      <div class="form-group">
                      <label class="control-label col-md-3 col-sm-3 col-xs-12" for="description">Description<span class="required">*</span>
                      </label>
					  <div class="col-md-6 col-sm-6 col-xs-12">
                      <textarea id="desc" required="required" class="form-control" name="desc" data-parsley-trigger="keyup" data-parsley-minlength="20" data-parsley-maxlength="100" data-parsley-minlength-message="Come on! You need to enter at least a 20 caracters long comment.."
                      data-parsley-validation-threshold="10"></textarea>
					  </div>
                      </div>
                     
                    <input type="hidden" name="catid" id="lastcatid" value="" />
					
                      <div class="ln_solid"></div>
                      <div class="form-group">
                      <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                      <button type="submit" class="btn btn-success save_catdescbtn">Save</button>
                      </div>
                      </div>

                      </form>
						  
                      </div>
                        
                      </div>
                    </div>
					 <!-- tab panel ends-->

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
			
			add_category();
			
		 });
		//add category description function listener
		 $('.save_catdescbtn').on('click',function(e){
			
			e.preventDefault();
			
			add_category_desc();
			
		 });
		
		 $( "#remove-image" ).click(function() {
       	 $("#img-tag").attr("src", "images/cache/no_image.png");
	     $("#img-tag").attr("data-placeholder", "images/no_image.png");
	     $("#image").val("");
	 
           });
		   
		 
       $(document).ready(function(){
	      
		  $('#add_category')[0].reset();
	      $('#add_category_desc')[0].reset();
            
            $.ajax({
                type:'POST',
                url:'functions/ajaxLanguage.php',
                success:function(html){
                    $('#lang').html(html);
                
                }
            }); 
        
            });
		
		</script>
		
		<?php include('common/footer.php'); ?>