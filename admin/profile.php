  <?php 
 require('common/header.php'); 
 require("../common/config.php");
		
 ?>
<?php

$getudata="SELECT * FROM lq_user WHERE user_id='$log_userid'";	
  $udataresult=mysqli_query($dbConn,$getudata) or die("database error:". mysqli_error($dbConn));

$row = mysqli_fetch_array($udataresult,MYSQLI_ASSOC);

if($row)
{
  

$uid=$row['user_id']; 
$name = $row['firstname']." ".$row['lastname']; 

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
$errormsg="no data found something went wrong";
}



?>   <!-- page content -->
        <div class="right_col" role="main">
        <div class="">
        <div class="page-title">
        <div class="title_left">
        <h3>ADMIN PANEL</h3>
        </div>

           <div class="pull-right">
                    <a style="border: 1px solid #172d44;border-radius: 0px;background: #3f5367; " href="editprofile.php" class="btn btn-primary topbtn"> <i class="fa fa-pencil"></i> Edit Profile</a>
              </div>
              </div>
            
            <div class="clearfix"></div>

            <div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>User Profile <small>G-MAD PORTAL</small></h2>
                    <ul class="nav navbar-right panel_toolbox">
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                      </li>
                      
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                  <div class="col-md-3 col-sm-3 col-xs-12 profile_left">
                  <div class="profile_img">
                        
					<div id="crop-avatar">
                    <!-- Current avatar -->
                    <img width="180px" height="180px" class="img-responsive avatar-view" src="images/<?php echo $profile_url; ?> " alt="Avatar" title="avatar">
                    </div>
                    </div>
                    <h3><?php echo strtoupper($name); ?></h3>
                      <h4><?php echo $name; ?><b><a href='index.php'><?php echo "@".$uname?></a></b></h4>
                      <ul class="list-unstyled user_data">
                       
					   <li><i class="fa fa-envelope user-profile-icon"></i> <?php if($email_id!=""){echo $email_id;} else {echo"<i> no data</i>";} ?>
                        </li>

                        <li>
                          <i class="fa fa-briefcase user-profile-icon"></i> <?php echo $user_role; ?>
                        </li>

                        <li class="m-top-xs">
                          <i class="fa fa-phone user-profile-icon"></i><?php if($mobile_no!=""){echo " ".$mobile_no;} else {echo"<i> no data</i>";} ?>
                         
                        </li>
                      </ul>

                      <a href="editprofile.php" class="btn btn-success"><i class="fa fa-edit m-right-xs"></i>Edit Profile</a>
                      <br />
					  </div>
 
 <div class="col-md-9 col-sm-9 col-xs-12">
     <div class="profile_title">
                        
	<div class="col-md-6">
    <h2>Hi <b><?php echo $name; ?></b> </h2>
    </div>     
<div>

<h5>Your Profile was created on <?php echo $created_time; ?> </h5>
</div>						
     </div>
 </div>

            
                </div>
				
              </div>
            </div>
          </div>
        </div>
		</diV>
        <!-- /page content -->

       <!-- /page content -->
		<?php 
		
		include('common/script.php'); 
		
	
		?>
	   <script>


var countdown;

$("#msg").show().hover(function() {
    clearTimeout(countdown);
})

countdown = setTimeout(function() {
$('#msg').hide();
}, 3000);

</script>
	 <?php include('common/footer.php'); ?>