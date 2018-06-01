<?php
session_start();

if(isset($_SESSION['login_user']))
  {
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

    <title>G-MAD ADMIN PANEL</title>
    <link rel="icon" type="images/png" href="images/favicon.png">
	
    <!-- Bootstrap -->
    <link href="vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="vendors/font-awesome_old/css/font-awesome.min.css" rel="stylesheet">
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
	<link href="build/css/style.css" rel="stylesheet">
  </head>

  <body class="login">
    <div>
      <a class="hiddenanchor" id="signup"></a>
      <a class="hiddenanchor" id="signin"></a>

        <div class="login_wrapper">
        <div class="animate form login_form">
        <section class="login_content">
		<center><a href="#"><img src="images/logo.png"></a></center> 
        <form id="auth_form" action="" >
        <h1>Portal Login</h1>
        <div>
        <input type="text" required="" class="form-control" name="username" placeholder="Username" required="" />
        </div>
        <div>
        <input type="password" required="" class="form-control" name="passkey" placeholder="Password" required="" />
        </div>
        <div>
        <input type="submit" id="loginbtn" onClick="auth_user()" class="btn btn-default loginbtn"   value="Log in" />
         <a class="reset_pass" href="#">Lost your password?</a>
              </div>

              <div class="clearfix"></div>

              <div class="separator">
                <p class="change_link">New to site?
                  <a href="#signup" class="to_register"> Create Account </a>
                </p>

                <div class="clearfix"></div>
                <br />

                <div>
                  
                  <p>RellTech Pvt Ltd ©2018 All Rights Reserved.</p>
                </div>
              </div>
            </form>
          </section>
        </div>

        <div id="register" class="animate form registration_form">
          <section class="login_content">
		   <center><a href="#"><img src="images/logo.png"></a></center> 
            <form>
              <h1>Create Account</h1>
              <div>
                <input type="text" class="form-control" name="username" placeholder="Username" required="" />
              </div>
              <div>
                <input type="email" class="form-control" name="email" placeholder="Email" required="" />
              </div>
              <div>
                <input type="password" id="passkey" class="form-control" name="passkey" placeholder="Password" required="" />
              </div>
              <div>
                <input type="button" class="btn btn-default regbtn" disabled=true value="Submit" />
              </div>

              <div class="clearfix"></div>

              <div class="separator">
                <p class="change_link">Already a member ?
                  <a href="#signin" class="to_register"> Log in </a>
                </p>

                <div class="clearfix"></div>
                <br />

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
	
	$("#auth_form").submit(function() {
    
     return false;
                                   });
	$("#passkey").keyup(function(event) {
		
    if (event.keyCode === 13) {
		
		
        $("#loginbtn").click();
		
                               }
                    });
	
	</script>
    <script src="build/js/functions.js"></script>
	<!-- script section -->
  </body>
</html>
