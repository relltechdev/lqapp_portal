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
                     <a href="manageUser.php" style="border: 1px solid #172d44;border-radius: 0px;background: #3f5367; "  id="viewbtn" class="btn btn-primary viewbtn"> <i class="fa fa-eye"></i> User List</a>
                    
                  </div>
                </div>
              </div>
			     <div class="pull-right">
                <div class="col-md-5 col-sm-5 col-xs-12">
                  <div class="form-group">
				    
                     <a href="addUser.php" style="border: 1px solid #4CAF50;border-radius: 0px;background: #4CAF50; " data-toggle="tooltip" data-original-title="Add User" id="viewbtn" class="btn btn-primary"> <i class="fa fa-plus"></i> Add New</a>
                    
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
                    <h2> <small>Add New User</small></h2>
                   
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">

                    <!-- tab panel begins-->
                    <div class="" role="tabpanel" data-example-id="togglable-tabs">
                      <ul id="myTab" class="nav nav-tabs bar_tabs" role="tablist">
                        <li role="presentation" class="active"><a href="#tab_content1" id="home-tab" role="tab" data-toggle="tab" aria-expanded="true">Profile</a>
                        </li>
                        <li role="presentation" class=""><a href="#tab_content2" role="tab" id="profile-tab" data-toggle="tab" aria-expanded="false">Others</a>
                        </li>
                      </ul>
                      <div id="myTabContent" class="tab-content">
					  
                        <div role="tabpanel" class="tab-pane fade active in" id="tab_content1" aria-labelledby="home-tab">
                          
						  
				      <br/>
					  
                      <form id="add_user" action="" data-parsley-validate class="form-horizontal form-label-left">
                     
					  <div class="form-group">
                      <label class="control-label col-md-3 col-sm-3 col-xs-12" >First Name <span class="required">*</span>
                      </label>
                      <div class="col-md-6 col-sm-6 col-xs-12">
                      <input type="text"  name="firstname" required="required" class="form-control col-md-7 col-xs-12" >
                      </div>
                      </div>
					  <div class="form-group">
                      <label class="control-label col-md-3 col-sm-3 col-xs-12">Last Name<span class="required">*</span>
                      </label>
                      <div class="col-md-6 col-sm-6 col-xs-12">
                     <input type="text"  name="lastname"  class="form-control col-md-7 col-xs-12" >
                      </div>
                      </div>
					   <div class="form-group">
                      <label class="control-label col-md-3 col-sm-3 col-xs-12">User Name<span class="required">*</span>
                      </label>
                      <div class="col-md-6 col-sm-6 col-xs-12">
                      <input type="text"  name="username"  class="form-control col-md-7 col-xs-12 usernamecheck" >
                      </div>
                      </div>
					  <div class="form-group">
                      <label class="control-label col-md-3 col-sm-3 col-xs-12">Email<span class="required">*</span>
                      </label>
                      <div class="col-md-6 col-sm-6 col-xs-12">
                     <input type="email"  name="email" required="required" class="form-control col-md-7 col-xs-12 emailcheck" >
                      </div>
                      </div>
                      <div class="form-group">
                      <label class="control-label col-md-3 col-sm-3 col-xs-12" >Mobile <span class="required">*</span>
                      </label>
                      <div class="col-md-6 col-sm-6 col-xs-12">
                      <input type="text"  name="mobile" required="required" class="form-control col-md-7 col-xs-12 mobilecheck" >
                      </div>
                      </div>
					  
					  <div class="form-group">
                      <label class="control-label col-md-3 col-sm-3 col-xs-12" >Password <span class="required">*</span>
                      </label>
                      <div class="col-md-6 col-sm-6 col-xs-12">
                      <input type="text"  name="passkey" required="required" class="form-control col-md-7 col-xs-12" >
                      </div>
                      </div>
					  <div class="form-group">
                      <label class="control-label col-md-3 col-sm-3 col-xs-12">User Group<span class="required">*</span>
                      </label>
					  <div class="col-md-6 col-sm-6 col-xs-12">
                      <select id="usergroup" name="usergroup" class="form-control" required>
                      <option value="">--Select User Group--</option>
                      </select>
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
					  <input type="hidden" id="status_id"  />
                      </div>
                      </div>
			          <div class="form-group required">
				      <label class="control-label col-md-3 col-sm-3 col-xs-12" for="input-lastname">Photo</label>
				      <div class="col-md-6 col-sm-6 col-xs-12">
				      <a href="" id="thumb-image" data-toggle="modal" data-target="#myModal" class="img-thumbnail"><img id="img-tag" src="<?php echo $dsrc;?>" alt="" title="" data-placeholder="<?php echo $dplaceholder;?>" /></a>
                      <input type="hidden" name="image" value="<?php echo $image;?>" id="image" />
			          <button type="button" name="remove-image" id="remove-image" class="btn btn-small btn-danger"><i class="fa fa-fw fa-remove"></i>Remove image</button>
                      </div>
			          </div>
                      <div class="ln_solid"></div>
                      <div class="form-group">
                      <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                      <button type="button" class="btn btn-success save_userbtn">ADD</button>
                      </div>
                      </div>

                      </form>
					
						  
						  
                       </div>
						
                      <div role="tabpanel" class="tab-pane fade" id="tab_content2" aria-labelledby="profile-tab">
                          
				  <!--- Other Data content -->
				  
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
		
		require('filemanagertext.php');
		?>
		<script>
		   	// user group data ajax call
			 $.ajax({
                type:'POST',
                url:'functions/ajaxUserGroup.php',
                success:function(html){
                    $('#usergroup').html(html);
                
                }
            }); 
		
		   //mobile Number Validator
	        $('.usernamecheck').on('change',function(e) {
			
			$('.usernamecheck').css({"border-color": ""});
			var username=$('.usernamecheck').val();
			if(username!="")
			{
			formValidator(username,"user","username","usernamecheck");
			}
			
		 });
		//mobile Number Validator
		$('.mobilecheck').on('keyup',function(e) {
			
			$('.mobilecheck').css({"border-color": ""});
			var number=$('.mobilecheck').val();
			if(number!="")
			{
			formValidator(number,"user","mobile","mobilecheck");
			}
			
		 });
		 
		 //email Validator
		$('.emailcheck').on('keyup',function(e) {
			
			$('.emailcheck').css({"border-color": ""});
			var number=$('.emailcheck').val();
			if(number!="")
			{
			formValidator(number,"user","email","emailcheck");
			}
			
		 });
		
		//add category function listener
		$('.save_userbtn').on('click',function(e){
			
			e.preventDefault();
			
			add_user();
			
		 });
		
		
		
		   
		 
       $(document).ready(function(){
	      
		     $('#add_user')[0].reset();
		
            });
		
		</script>
		<?php include('common/footer.php'); ?>