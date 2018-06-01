 <?php 
 require('common/header.php'); 		
 ?>
<?php
require("../common/config.php");
?> 
<link rel="stylesheet" href="dist_files/imgareaselect.css"> 
<!-- header end -->  
  <!-- page content -->
        <div class="right_col" role="main">
          <div class="">
            <div class="page-title">
              <div class="title_left">
                <h3>ADMIN PANEL</h3>
              </div>

             <div class="pull-right">
                    <a style="border: 1px solid #172d44;border-radius: 0px;background: #3f5367; " href="profile.php" class="btn btn-primary topbtn"><i class="fa fa-backward"></i> Back</a>
              </div>
            </div>
            <div class="clearfix"></div>
            

            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Edit Profile<small>G-MAD PORTAL</small></h2>
                    <ul class="nav navbar-right panel_toolbox">
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                      </li>
                      
                    </ul>
               
					
					  <?php
			  
			   require("../common/config.php");
		
              $data="SELECT * FROM lq_user WHERE user_id='$log_userid'";	
              $result=mysqli_query($dbConn,$data) or die("database error:". mysqli_error($dbConn));

              $row = mysqli_fetch_array($result,MYSQLI_ASSOC);

              if($row)
              { 
		  
              $uid=$row['user_id']; 
              $fname = $row['firstname']; 
			  $lname = $row['lastname']; 
              $uname=$row['username']; 
              $email_id = $row['email']; 
              $mobile_no = $row['mobile'];
              $created_time = $row['date_added'];
              $profile_url = $row['image']; 
              if($profile_url=="")
              {
	          $profile_url="default.png";
              }
			  $key=$row['password'];
              }
              else
               {
               $uid="";
               $fname = "";
			   $lname = "";
               $uname="";
               $email_id =""; 
               $mobile_no = "";
               $created_time = "";
			   $key="";
               }
			  
			  
			  
			  
			  ?>
                    <div class="clearfix"></div>
                  </div>
				  
				  <div class="col-md-6 col-xs-12">
                  <div class="x_content">
                    <br />
                    <form id="user_pofile_form" class="form-horizontal form-label-left input_mask" action=" " method="post">

					<div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">First Name</label>
                        <div class="col-md-9 col-sm-9 col-xs-12">
                          <input type="text" class="form-control has-feedback-left"  name="fname" placeholder="<?php echo $fname; ?>" value="">
                        <span class="fa fa-user form-control-feedback left" aria-hidden="true"></span>
                        </div>
                      </div>
					  
					  <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Last Name</label>
                        <div class="col-md-9 col-sm-9 col-xs-12">
                          <input type="text" class="form-control has-feedback-left"  name="lname" placeholder="<?php echo $lname; ?>" value="">
                        <span class="fa fa-user form-control-feedback left" aria-hidden="true"></span>
                        </div>
                      </div>
					  
					  <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Email ID</label>
                        <div class="col-md-9 col-sm-9 col-xs-12">
                        <input type="text" name="uemailid" id="new_email" class="form-control has-feedback-left emailcheck"  placeholder='<?php if($email_id!=""){echo $email_id;} else {echo"<i> no data</i>";} ?>' value="">
                       <input type="hidden"  id="old_email"  value="<?php echo $email_id;  ?>">
					   <span class="fa fa-envelope form-control-feedback left" aria-hidden="true"></span>
                        </div>
                      </div>
					  <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Contact Number</label>
                        <div class="col-md-9 col-sm-9 col-xs-12">
                        <input type="text" name="umobileno" id="new_mobile" class="form-control has-feedback-left mobilecheck"  placeholder='<?php  if($mobile_no!=""){echo $mobile_no;} else {echo" no data";} ?>' value="">
                        <input type="hidden"  id="old_mobile"  value="<?php echo $mobile_no;  ?>">
						<span class="fa fa-phone form-control-feedback left" aria-hidden="true"></span>
                        </div>
                      </div>
					   <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Password</label>
                        <div class="col-md-9 col-sm-9 col-xs-12">
                          <input type="password" name="upwd" class="form-control has-feedback-left"  placeholder='ENTER NEW PASSWORD' value="<?php echo $key ?>" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = '<?php echo $key ?>';}" tooltip="Change Password">
                        <span class="fa fa-unlock form-control-feedback left" aria-hidden="true"></span>
                        </div>
                      </div>
					 
                          <input type="hidden" name="uid" value="<?php echo $uid ?>" />
                      <div class="ln_solid"></div>
                      <div class="form-group">
                        <div class="col-md-9 col-sm-9 col-xs-12 col-md-offset-3">
                          <!--<button type="button" class="btn btn-primary">Cancel</button> -->
						   
                          <button type="button" id="updateprofilebtn" class="btn btn-success" name="editprofile">Save</button>
                        </div>
                      </div>

                    </form>
                  </div>
				  </div>
				  
				  <div class="col-md-6 col-xs-12">
				  <div class="x_content">
                    <br />
                   <!-- <form class="form-horizontal form-label-left input_mask"> -->

		<!--profile pic uploader start -->			
					
					<div class=''>
	                </div>
                      

					<div class="container">
		
	
	<div>
		<img class="img-circle" id="profile_picture" height="128" data-src="default.jpg"  data-holder-rendered="true" style="width: 140px; height: 140px;" src="images/<?php echo $profile_url; ?>"/>
		<br><br>
		<a type="button" class="btn btn-primary" id="change-profile-pic">Change Profile Picture</a>
	</div>
	<div id="profile_pic_modal" class="modal fade">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				   <h3>Change Profile Picture</h3>
				</div>
				<div class="modal-body">
					<form id="cropimage" method="post" enctype="multipart/form-data" action="change_pic.php">
						<strong>Upload Image:</strong> <br><br>
						<input type="file" name="profile-pic" id="profile-pic" />
						<input type="hidden" name="hdn-profile-id" id="hdn-profile-id" value="<?php echo $uid;?>" />
						<input type="hidden" name="hdn-x1-axis" id="hdn-x1-axis" value="" />
						<input type="hidden" name="hdn-y1-axis" id="hdn-y1-axis" value="" />
						<input type="hidden" name="hdn-x2-axis" value="" id="hdn-x2-axis" />
						<input type="hidden" name="hdn-y2-axis" value="" id="hdn-y2-axis" />
						<input type="hidden" name="hdn-thumb-width" id="hdn-thumb-width" value="" />
						<input type="hidden" name="hdn-thumb-height" id="hdn-thumb-height" value="" />
						<input type="hidden" name="action" value="" id="action" />
						<input type="hidden" name="image_name" value="" id="image_name" />
						<input type="hidden" name="iname" value="<?php echo $fname."15".$uid."4326"; ?>" id="iname" />
						<input type="hidden" name="uname" value="<?php echo $uname; ?>" id="uname" />
						<div id='preview-profile-pic'></div>
					<div id="thumbs" style="padding:5px; width:600p"></div>
					</form>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
					<button type="button" id="save_crop" class="btn btn-primary">Crop & Save</button>
				</div>
			</div>
		</div>
	</div>
		
			
</div>

<!-- profile pic uploader end -->
                  <!--  </form> -->
                  </diV>
				  </div>
				  
                </div>
               </div>

              


              
            </div>

     
          </div>
        </div>
       
		
	  <!-- /page content -->
<?php  include('common/script.php');   ?>
<script src="dist_files/jquery.imgareaselect.js" type="text/javascript"></script>
<script src="dist_files/jquery.form.js"></script>
<script src="dist_files/functions.js"></script>
<script>
$('#updateprofilebtn').on('click',function(e){
	e.preventDefault();
	saveUserProfile();
  });


//mobile Number Validator
		$('.mobilecheck').on('keyup',function(e) {
			
			$('.mobilecheck').css({"border-color": ""});
			var oldnumber=Number($('#old_mobile').val());
			var number=Number($('.mobilecheck').val());
			if(number!=""&&oldnumber!=number)
			{
			formValidator(number,"user","mobile","mobilecheck");
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
			formValidator(mail,"user","email","emailcheck");
			}
			
		 });		

</script>

<?php include('common/footer.php'); ?>
	   
	  