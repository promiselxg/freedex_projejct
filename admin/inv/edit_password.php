<?php
    include_once('scripts/userlog.php');
?>
<?php
	if($log_username == ""){
		header('location:dashboard');exit();
	}
	//echo $log_username;
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Edit Password</title>

    <!-- Bootstrap -->
    <link href="../vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="../vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!-- NProgress -->
    <link href="../vendors/nprogress/nprogress.css" rel="stylesheet">

    <!-- Custom Theme Style -->
    <link href="../vendors/build/css/custom.min.css" rel="stylesheet">
  </head>

  <body class="nav-md">
    <div class="container body">
      <div class="main_container">
        <div class="col-md-3 left_col">
          <div class="left_col scroll-view">
            <div class="clearfix"></div>

            <!-- menu profile quick info -->
            <div class="profile clearfix">
              <div class="profile_pic">
                <img src="images/img.jpg" alt="..." class="img-circle profile_img">
              </div>
              <div class="profile_info">
                <span>Welcome,</span>
                <h2><?php echo $log_username;?></h2>
              </div>
              <div class="clearfix"></div>
            </div>
            <!-- /menu profile quick info -->

            <br />

            <!-- sidebar menu -->
            <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
              <?php include_once("includes/sideBar.php");?>
        </div>

        <!-- top navigation -->
        <div class="top_nav">
            <?php include_once("includes/use_profile_link.php");?>
        </div>
        <!-- /top navigation -->

        <!-- page content -->
        <div class="right_col" role="main">
          <div class="">
            <div class="clearfix"></div>

            <div class="row">
              <div class="col-md-12 col-sm-12  ">
                <div class="x_panel">
					 <div class="x_title">
						<h2>Update Password</h2>
						<div class="clearfix"></div>
					 </div>
					<div class="x_content">
                     <div class="row">
						<div class="col-md-12 col-sm-12 col-xs-12">
							<div class="x_panel">
								<div class="clearfix"></div>
								<div class="x_content">
									<form onsubmit="return false">
								
								
								<div class="form-group">
								  <label for="category">Current Password</label>
								  <input type="password" id="current_password" class="form-control"  data-parsley-trigger="change" value=""/>
								</div>
                                <div class="form-group">
								  <label for="category">New Password</label>
								  <input type="password" id="new_password" class="form-control"  data-parsley-trigger="change" value=""/>
								</div>
                                <div class="form-group">
								  <label for="category">Confirm Password</label>
								  <input type="password" id="confirm_password" class="form-control"  data-parsley-trigger="change" value=""/>
								</div>
								<span class="btn btn-success" onclick="changePassword()" style="cursor:pointer" id="cate_Btn">Update Password</span>
							</form>
									<br><br>
									
									
									
								</div>
							</div>
						</div>
					 </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- /page content -->

        <!-- footer content -->
        <footer>
          <?php include_once("includes/footer.php");?>
        </footer>
        <!-- /footer content -->
      </div>
    </div>

    <!-- jQuery -->
    <script src="../vendors/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap -->
   <script src="../vendors/bootstrap/dist/js/bootstrap.bundle.js"></script>
    <!-- FastClick -->
    <script src="../vendors/fastclick/lib/fastclick.js"></script>
    <!-- NProgress -->
    <script src="../vendors/nprogress/nprogress.js"></script>
    
    <!-- Custom Theme Scripts -->
    <script src="../vendors/build/js/custom.min.js"></script>
    <script src="js/ajax.js"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script src="js/custom.js"></script>
  </body>
</html>
