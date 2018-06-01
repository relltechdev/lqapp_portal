 <?php 
 require('common/header.php'); 
 require('common/imageresize2.php');
 require("../common/config.php");
 require("../common/util.php");
 require("functions/getCustomerData.php");
		
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
				    
                     <a href="manageCustomer.php" style="border: 1px solid #172d44;border-radius: 0px;background: #3f5367; " data-toggle="tooltip" data-original-title="Back" id="viewbtn" class="btn btn-primary viewbtn"> <i class="fa fa-reply"></i> back</a>
                    
                  </div>
                </div>
              </div>
			  
			    <div class="pull-right">
                <div class="col-md-5 col-sm-5 col-xs-12">
                  <div class="form-group">
				    
                     <a href="addCustomer.php" style="border: 1px solid #4CAF50;border-radius: 0px;background: #4CAF50; " data-toggle="tooltip" data-original-title="Add Customer" id="viewbtn" class="btn btn-primary viewbtn"> <i class="fa fa-plus"></i></a>
                    
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
                    <h2> <small>Edit Customer Data</small></h2>
                   
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
					  
                      <form id="update_customer" action="" data-parsley-validate class="form-horizontal form-label-left">
                     
					  <div class="form-group">
                      <label class="control-label col-md-3 col-sm-3 col-xs-12" >First Name <span class="required">*</span>
                      </label>
                      <div class="col-md-6 col-sm-6 col-xs-12">
                      <input type="text"  name="firstname" required="required" class="form-control col-md-7 col-xs-12" value="<?php echo $first_name; ?>">
                      </div>
                      </div>
					  <div class="form-group">
                      <label class="control-label col-md-3 col-sm-3 col-xs-12">Last Name<span class="required">*</span>
                      </label>
                      <div class="col-md-6 col-sm-6 col-xs-12">
                     <input type="text"  name="lastname"  class="form-control col-md-7 col-xs-12" value="<?php echo $last_name; ?>">
                      </div>
                      </div>
					  <div class="form-group">
                      <label class="control-label col-md-3 col-sm-3 col-xs-12">Email<span class="required">*</span>
                      </label>
                      <div class="col-md-6 col-sm-6 col-xs-12">
                      <input type="text" id="new_email" name="email" required="required" class="form-control col-md-7 col-xs-12 emailcheck" value="<?php echo $email; ?>">
					   <input type="hidden"  id="old_email"  value="<?php echo $email;  ?>">
                      </div>
                      </div>
                      <div class="form-group">
                      <label class="control-label col-md-3 col-sm-3 col-xs-12" >Mobile <span class="required">*</span>
                      </label>
                      <div class="col-md-6 col-sm-6 col-xs-12">
                      <input type="text"  id="new_mobile" name="mobile" required="required" class="form-control col-md-7 col-xs-12 mobilecheck" value="<?php echo $mobile;  ?>">
					  <input type="hidden"  id="old_mobile"  value="<?php echo $mobile;  ?>">
                      </div>
                      </div>
					  
					  <div class="form-group">
                      <label class="control-label col-md-3 col-sm-3 col-xs-12" >Password <span class="required">*</span>
                      </label>
                      <div class="col-md-6 col-sm-6 col-xs-12">
                      <input type="text"   name="newkey" required="required" class="form-control col-md-7 col-xs-12" placeholder="Enter New password">
                      <input type="hidden" name="oldkey" id="passkey" value="<?php echo $pwd;  ?>" />
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
                      <div class="ln_solid"></div>
                      <div class="form-group">
                      <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
					 <input type="hidden" name="customerid" id="customerid" value="<?php echo $id; ?>" />
                      <button type="button" class="btn btn-success save_customerbtn">Save</button>
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
		
         //mobile Number Validator
		$('.mobilecheck').on('keyup',function(e) {
			
			$('.mobilecheck').css({"border-color": ""});
			var oldnumber=Number($('#old_mobile').val());
			
			var number=Number($('.mobilecheck').val());
			
			if(number!=""&&oldnumber!=number)
			{
			formValidator(number,"customer","mobile","mobilecheck");
			}
			
		 });
		 
		 //email Validator
		$('.emailcheck').on('keyup',function(e) {
			var oldemail=$('#old_email').val();
			oldemail=$.trim(oldemail);
			$('.emailcheck').css({"border-color": ""});
			var mail=$('.emailcheck').val();
			mail=$.trim(mail);
			if(mail!=""&&oldemail!=mail)
			{
			formValidator(mail,"customer","email","emailcheck");
			}
			
		 });		
		//add category function listener
		$('.save_customerbtn').on('click',function(e){
			
			e.preventDefault();
			
			update_customer();
			
		 });
		
		
		 $("#remove-image" ).click(function() {
       	 $("#img-tag").attr("src", "images/cache/no_image.png");
	     $("#img-tag").attr("data-placeholder", "images/no_image.png");
	     $("#image").val("");
	 
           });
		   
		 
       $(document).ready(function(){
	      
		
         
			// Set status
				  var status_id=$('#status_id').val();
					$("#status").val(status_id);
		
            });
		
		</script>
		<?php include('common/footer.php'); ?>