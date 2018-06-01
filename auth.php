<?php
session_start();
if(isset($_SESSION['login_user'])){
	if($_SESSION['OTPflag']==0)
	{		
	if($_SESSION['user_role']=="admin")
	{
		header("location:admin");
		
	}
	}

}

?>
<!DOCTYPE html>
  <html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>G-MAD ADMIN PANEL | USER AUTHENTICATION </title>
    <link rel="icon" type="images/png" href="images/favicon.png">
    <!-- Bootstrap -->
    <link href="vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!-- NProgress -->
    <link href="vendors/nprogress/nprogress.css" rel="stylesheet">
    <!-- Animate.css -->
    <link href="vendors/animate.css/animate.min.css" rel="stylesheet">

	 <!-- PNotify -->
    <link href="vendors/pnotify/dist/pnotify.css" rel="stylesheet">
    <link href="vendors/pnotify/dist/pnotify.buttons.css" rel="stylesheet">
    <link href="vendors/pnotify/dist/pnotify.nonblock.css" rel="stylesheet">
	<link href="vendors/pnotify/dist/pnotify.brighttheme.css" rel="stylesheet" type="text/css" />
	<link href="vendors/pnotify/dist/pnotify.history.css" rel="stylesheet" type="text/css" />
	<link href="vendors/pnotify/dist/pnotify.mobile.css" rel="stylesheet" type="text/css" />
	
    <!-- Custom Theme Style -->
     <link href="build/css/custom.min.css" rel="stylesheet">
	 <link href="build/css/custom.css" rel="stylesheet">
	 <link href="build/css/style.css" rel="stylesheet">
     </head>

  <body class="login">
       <div>
          

       <div class="login_wrapper">
       
   	    <div class="animate form login_form">
        <section class="login_content">
		
		<center><a href="#"><img src="images/logo.png"></a></center> 
              
			  <form id="otp_form" action="">
              <h1>Enter OTP</h1>
			  <span style="color:red">OTP has been send to your registered mail and mobile number.</span>
              <div>
              <input name="otp" id="otp" type="password" class="form-control"  required="" />
              </div>
             
			  			
              <div>
              <center>  <input type="button" onClick="auth_otp()" id="otpbtn"  name="submit" class="btn btn-primary otpbtn" value="verify"/> </center>
              </div>

              <div class="clearfix"></div>

              <div class="separator">
              <div class="clearfix"></div>
              <br/>
			  <div>
                 <p>RellTech Pvt Ltd ©2018 All Rights Reserved.</p>
              </div>
			  </div>
			  
              </form>
        
		</section>
        </div>

      </div>
      </div>
	
	<!-- Script section -->
	
	
	<!-- jQuery -->
    <script src="vendors/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap -->
    <script src="vendors/bootstrap/dist/js/bootstrap.min.js"></script>
	
	 <!-- PNotify -->
	
    <script  type="text/javascript"src="vendors/pnotify/dist/pnotify.js"></script> 
	<script type="text/javascript" src="vendors/pnotify/dist/pnotify.animate.js"></script>
    <script  type="text/javascript"src="vendors/pnotify/dist/pnotify.buttons.js"></script>
    <script  type="text/javascript" src="vendors/pnotify/dist/pnotify.nonblock.js"></script>
    <script type="text/javascript" src="vendors/pnotify/dist/pnotify.confirm.js"></script>
    <script type="text/javascript" src="vendors/pnotify/dist/pnotify.mobile.js"></script>
    <script type="text/javascript" src="vendors/pnotify/dist/pnotify.desktop.js"></script>
    <script type="text/javascript" src="vendors/pnotify/dist/pnotify.history.js"></script>
    <script type="text/javascript" src="vendors/pnotify/dist/pnotify.callbacks.js"></script>
    <script type="text/javascript" src="vendors/pnotify/dist/pnotify.reference.js"></script>
	
	<!-- function -->
	<script>
	
	$("#otp_form").submit(function() {
    
     return false;
                                   });
	$("#otp").keyup(function(event) {
		
    if (event.keyCode === 13) {
		
        $("#otpbtn").click();
		
                               }
                    });
	
	</script>
	
    <script src="build/js/functions.js"></script>
	<!-- script section -->

</body>
</html>
