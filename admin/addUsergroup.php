 <?php include('common/header.php'); 

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
                     <a href="manageuserGroup.php" style="border: 1px solid #172d44;border-radius: 0px;background: #3f5367; "  id="viewbtn" class="btn btn-primary viewbtn"> <i class="fa fa-eye"></i> View User Group</a>
                    
               </div>
               </div>
               </div>
			     <div class="pull-right">
                <div class="col-md-5 col-sm-5 col-xs-12">
                  <div class="form-group">
				    
                     <a href="addusergroup.php" style="border: 1px solid #4CAF50;border-radius: 0px;background: #4CAF50; " data-toggle="tooltip" data-original-title="Add User group" id="viewbtn" class="btn btn-primary"> <i class="fa fa-plus"></i> Add New</a>
                    
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
                    <h2> <small>Add New User Group</small></h2>
                   
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
					  
                      <form id="add_usergroup" action="" data-parsley-validate class="form-horizontal form-label-left">

                      <div class="form-group">
                      <label class="control-label col-md-3 col-sm-3 col-xs-12" for="category-name">Name<span class="required">*</span>
                      </label>
                      <div class="col-md-6 col-sm-6 col-xs-12">
                      <input type="text" id="name" name="name" required="required" class="form-control col-md-7 col-xs-12">
                      </div>
                      </div>
                      <div class="form-group">
                      <label class="control-label col-md-3 col-sm-3 col-xs-12" for="description">Description<span class="required">*</span>
                      </label>
					  <div class="col-md-6 col-sm-6 col-xs-12">
                      <textarea id="permission"  class="form-control" name="permission" data-parsley-trigger="keyup" data-parsley-minlength="20" data-parsley-maxlength="100" data-parsley-minlength-message="Come on! You need to enter at least a 20 caracters long comment.."
                      data-parsley-validation-threshold="10"></textarea>
					  </div>
                      </div>
                     
                      <div class="ln_solid"></div>
                      <div class="form-group">
                      <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                      <button type="button" class="btn btn-success save_usergroupbtn">Save</button>
                      </div>
                      </div>

                      </form>
					
						  
						  
                       </div>
						
                      <div role="tabpanel" class="tab-pane fade" id="tab_content2" aria-labelledby="profile-tab">
                          
				       <div class="col-md-3 col-sm-3 col-xs-12">
				       <span style="align:center">No Data </span>
				       </div>
						  
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
		
		?>
		<script>
		
	
		//add category function listener
		$('.save_usergroupbtn').on('click',function(e){
			
			e.preventDefault();
			
			add_usergroup();
			
		 });
		
		
		</script>
		
		<?php include('common/footer.php'); ?>