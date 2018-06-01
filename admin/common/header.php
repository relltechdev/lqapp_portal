<?php
session_start();
date_default_timezone_set('Asia/Calcutta');

if($_SESSION['OTPflag']==1)
{
    header("location: ../auth.php"); // Redirecting To Home Page
}
else if($_SESSION['user_role']!="admin")
{
	
	header("location: ../"); // Redirecting To Home Page
		
}

// Get User Info
$user_role=$_SESSION['user_role'];
$log_username=$_SESSION['login_user'];// Initializing Session
$log_userid=$_SESSION['user_key'];	
$profile_url="default.png";

if(!empty($log_userid))
{
  require("../common/config.php");
		
  $query="SELECT * FROM lq_user WHERE user_id='$log_userid'";	
  $result=mysqli_query($dbConn,$query) or die("database error:". mysqli_error($dbConn));
  
  $row = mysqli_fetch_array($result,MYSQLI_ASSOC);

if($row)
{
$profile_url = $row['image']; 
if($profile_url=="")
{
	$profile_url="default.png";
}
}

	
	
}

?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
    <title>GET-MAD ADMIN PANEL | </title>
    <link rel="icon" type="image/png" href="images/favicon.png">
	
    <!-- Bootstrap -->
    <link href="../vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
	
	<link href="../vendors/font-awesome/css/fa-brands.min.css" rel="stylesheet">
	<link href="../vendors/font-awesome/css/fa-regular.min.css" rel="stylesheet">
	<link href="../vendors/font-awesome/css/fa-solid.min.css" rel="stylesheet">
    <link href="../vendors/font-awesome/css/fontawesome-all.min.css" rel="stylesheet">
	 <link href="../vendors/font-awesome_old/css/font-awesome.min.css" rel="stylesheet">
    <!-- NProgress -->
    <link href="../vendors/nprogress/nprogress.css" rel="stylesheet">
   
   <!-- Animate.css -->
    <link href="../vendors/animate.css/animate.min.css" rel="stylesheet">
   
   <!-- iCheck -->
    <link href="../vendors/iCheck/skins/flat/green.css" rel="stylesheet">
	
    <!-- bootstrap-progressbar -->
    <link href="../vendors/bootstrap-progressbar/css/bootstrap-progressbar-3.3.4.min.css" rel="stylesheet">
    <!-- JQVMap -->
    <link href="../vendors/jqvmap/dist/jqvmap.min.css" rel="stylesheet"/>
    <!-- bootstrap-daterangepicker -->
    <link href="../vendors/bootstrap-daterangepicker/daterangepicker.css" rel="stylesheet">
	
	<!-- Switchery -->
    <link href="../vendors/switchery/dist/switchery.min.css" rel="stylesheet">
	
	 <!-- PNotify -->
    <link href="../vendors/pnotify/dist/pnotify.css" rel="stylesheet">
    <link href="../vendors/pnotify/dist/pnotify.buttons.css" rel="stylesheet">
    <link href="../vendors/pnotify/dist/pnotify.nonblock.css" rel="stylesheet">
	<link href="../vendors/pnotify/dist/pnotify.brighttheme.css" rel="stylesheet" type="text/css" />
	<link href="../vendors/pnotify/dist/pnotify.history.css" rel="stylesheet" type="text/css" />
	<link href="../vendors/pnotify/dist/pnotify.mobile.css" rel="stylesheet" type="text/css" />
	
	<!-- Data table -->
	<link rel="stylesheet" href="../vendors/datatables/dataTables.bootstrap.css">

    <!-- Custom Theme Style -->
    <link href="../build/css/custom.min.css" rel="stylesheet">
	<link href="../build/css/style.css" rel="stylesheet">
  </head>
<?php
require("../common/config.php");
require("../common/settings.php");
$inactive = 2000;

 if($session_timeout!=""&&$session_timeout!="off")
	{		
       $inactive=$session_timeout;
	}
if( !isset($_SESSION['timeout']) )
$_SESSION['timeout'] = time() + $inactive; 

$session_life =time() - $_SESSION['timeout'];

if($session_life > $inactive&&$session_timeout!="off")
{ 

session_destroy();

echo "<script  type='text/javascript'>
sessionBreak();
function sessionBreak()
{
                    
    var r = confirm('session timeout login again');
    if (r == true) {
      window.location.href='../';
    } else {
        
    } 
	
	}</script>";

  }
   if($session_timeout!=""&&$session_timeout!="off")
	{		
      $_SESSION['timeout']=time();
	}
	
	?>
  <body class="nav-md">
    <div class="container body">
      <div class="main_container">
        <div class="col-md-3 left_col">
          <div class="left_col scroll-view">
            <div class="navbar nav_title" style="border: 0;">
              <a href="index.html" class="site_title"><img class="sidebar_logo" alt='sidebar_logo' src="images/logo.png"></a>
            </div>

            <div class="clearfix"></div>

            <!-- menu profile quick info -->
            <div class="profile clearfix">
              <div class="profile_pic">
                <img src="images/<?php echo $profile_url; ?>" alt="..." class="img-circle profile_img">
              </div>
              <div class="profile_info">
                <span>Welcome,</span>
                <h2><?php echo $log_username; ?></h2>
              </div>
            </div>
            <!-- /menu profile quick info -->

            <br />

            <!-- sidebar menu -->
            <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
              <div class="menu_section">
                <h3>General</h3>
                <ul class="nav side-menu">
                  <li><a href="index.php"><i class="fa fa-home"></i> Home</a>
                    
                  </li>
                  <li><a><i class="fa fa-qrcode"></i>Catalog<span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                     
                      <li><a href="manageProduct.php">Products</a></li>
                      <li><a href="manageCategory.php">Categories</a></li>
					   <li><a href="manageBanner.php">App Banner</a></li>
                    </ul>
                  </li>
                  <li><a><i class="fa fa-users"></i>Manage Pilot<span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="managePilot.php">Pilots List</a></li>
                    </ul>
                  </li>
                  <li><a><i class="fa fa-user"></i>Manage User<span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="manageUser.php">View List</a></li>
					  <li><a href="manageUsergroup.php">User Group</a></li>
                    </ul>
                  </li>
                  <li><a><i class="fa fa-percent"></i>Manage Tax <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="manageTaxrule.php">Tax Rule List</a></li>
                      <li><a href="manageTax.php">Tax Rate List</a></li>
                    </ul>
                  </li>
                  <li><a href="manageOrders.php" ><i class="fa fa-shopping-cart"></i>View Orders</a>
                  </li>
                  <li><a><i class="fa fa-table"></i> Manage Customers <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="manageCustomer.php">Customer List</a></li>
                    </ul>
                  </li>
                  <li><a><i class="fa fa-bar-chart-o"></i> Analytics<span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="orderMap.php">Order Statistics</a></li>
                      <li><a href="pilotMap.php">Pilot Statistics</a></li>
                      <li><a href="customerMap.php">Customer Statistics</a></li>
                      <li><a href="salesMap.php">Sales Statistics</a></li>
                    </ul>
                  </li>
				   </ul>
              </div>
              

            </div>
            <!-- /sidebar menu -->

            <!-- /menu footer buttons -->
            <div class="sidebar-footer hidden-small">
              <a href="settings.php" data-toggle="tooltip" data-placement="top" title="Settings">
                <span class="glyphicon glyphicon-cog" aria-hidden="true"></span>
              </a>
              <a data-toggle="tooltip" data-placement="top" title="FullScreen" onclick="toggleFullScreen()" >
                <span class="glyphicon glyphicon-fullscreen" aria-hidden="true"></span>
              </a>
              <a data-toggle="tooltip" data-placement="top" title="Lock">
                <span class="glyphicon glyphicon-eye-close" aria-hidden="true"></span>
              </a>
              <a data-toggle="tooltip" data-placement="top" title="Logout" href="../common/logout.php">
                <span class="glyphicon glyphicon-off" aria-hidden="true"></span>
              </a>
            </div>
            <!-- /menu footer buttons -->
          </div>
        </div>

        <!-- top navigation -->
        <div class="top_nav">
          <div class="nav_menu">
            <nav>
              <div class="nav toggle">
                <a id="menu_toggle"><i class="fa fa-bars"></i></a>
              </div>

              <ul class="nav navbar-nav navbar-right">
                <li class="">
                  <a href="javascript:;" class="user-profile dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                    <img src="images/<?php echo $profile_url; ?>"  alt=""><?php echo $log_username; ?>
                    <span class=" fa fa-angle-down"></span>
                  </a>
                  <ul class="dropdown-menu dropdown-usermenu pull-right">
                    <li><a href="profile.php"> Profile</a></li>
                    <li>
                      <a href="settings.php">
                        
                        <span>Settings</span>
                      </a>
                    </li>
                    <li><a href="javascript:;">Help</a></li>
                    <li><a href="../common/logout.php"><i class="fa fa-sign-out pull-right"></i> Log Out</a></li>
                  </ul>
                </li>

                <li role="presentation" class="dropdown">
                  <a href="javascript:;" class="dropdown-toggle info-number" data-toggle="dropdown" aria-expanded="false">
                    <i class="fa fa-envelope-o"></i>
                    <span class="badge bg-green">6</span>
                  </a>
                  <ul id="menu1" class="dropdown-menu list-unstyled msg_list" role="menu">
                    <li>
                      <a>
                        <span class="image"><img src="images/img.jpg" alt="Profile Image" /></span>
                        <span>
                          <span>John Smith</span>
                          <span class="time">3 mins ago</span>
                        </span>
                        <span class="message">
                          Film festivals used to be do-or-die moments for movie makers. They were where...
                        </span>
                      </a>
                    </li>
                    <li>
                      <a>
                        <span class="image"><img src="images/img.jpg" alt="Profile Image" /></span>
                        <span>
                          <span>John Smith</span>
                          <span class="time">3 mins ago</span>
                        </span>
                        <span class="message">
                          Film festivals used to be do-or-die moments for movie makers. They were where...
                        </span>
                      </a>
                    </li>
                    <li>
                      <a>
                        <span class="image"><img src="images/img.jpg" alt="Profile Image" /></span>
                        <span>
                          <span>John Smith</span>
                          <span class="time">3 mins ago</span>
                        </span>
                        <span class="message">
                          Film festivals used to be do-or-die moments for movie makers. They were where...
                        </span>
                      </a>
                    </li>
                    <li>
                      <a>
                        <span class="image"><img src="images/img.jpg" alt="Profile Image" /></span>
                        <span>
                          <span>John Smith</span>
                          <span class="time">3 mins ago</span>
                        </span>
                        <span class="message">
                          Film festivals used to be do-or-die moments for movie makers. They were where...
                        </span>
                      </a>
                    </li>
                    <li>
                      <div class="text-center">
                        <a>
                          <strong>See All Alerts</strong>
                          <i class="fa fa-angle-right"></i>
                        </a>
                      </div>
                    </li>
                  </ul>
                </li>
              </ul>
            </nav>
          </div>
        </div>
        <!-- /top navigation -->