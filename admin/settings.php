  <?php 
 require('common/header.php'); 
 require("../common/config.php");
		
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
				    
                  <a href="index.php"style="border: 1px solid #4CAF50;border-radius: 0px;background: #4CAF50; " data-toggle="tooltip" data-original-title="Home"  class="btn btn-primary viewbtn"> <i class="fa fa-home"></i></a>
                    
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

                  <form id="user_settings" action="" data-parsley-validate class="form-horizontal form-label-left">
                     
					  <div class="form-group">
                      <label class="control-label col-md-3 col-sm-3 col-xs-12" >TWO STEP VERIFICATION
                      </label>
                      <div class="col-md-6 col-sm-6 col-xs-12">
                     
                           <input type="checkbox" id="otplogin"  class="js-switch" /> 
                          <input type="hidden" id="otpvalue" name="otplogin" />
                      </div>
                      </div>
					  
					  <div class="form-group">
                      <label class="control-label col-md-3 col-sm-3 col-xs-12">IDLE SESSION LOGOUT
                      </label>
                      <div class="col-md-6 col-sm-6 col-xs-12">
                      <select id="timeout" name="timeout" class="form-control" required>
                      <option value="">--Select Options--</option>
					  <option value="off">Turn off</option>
                      <option value="10000">10 Minutes</option>
                      <option value="15000">15 Minutes</option>
                      <option value="30000">30 Minutes</option>
                      </select>
					 
                      </div>
                      </div>
			         
                      <div class="ln_solid"></div>
                      <div class="form-group">
                      <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
					 <input type="hidden" id="userid" name="id" value="<?php echo $log_userid;?>" />
                      <button type="button" class="btn btn-success save_settingsbtn">Save</button>
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
		
	
		?>
	  <script>
		
		 
       $(document).ready(function(){
	      loadUserSettings();
		  var changeCheckbox = document.querySelector('.js-switch');
         
         changeCheckbox.onchange = function() {
         if(changeCheckbox.checked==true)
		 {
			 $('#otplogin').val("ENABLE");
			 $('#otpvalue').val("ENABLE");
		 }
		 else
		 {
			  $('#otplogin').val("DISABLE");
			  $('#otpvalue').val("DISABLE");
			  
		 }
                                              };
		  
		$('.save_settingsbtn').on('click',function(){
			
		saveUserSettings();
			
			
		});
			
		
          
		
            });
		
		</script>
		
		<?php include('common/footer.php'); ?>