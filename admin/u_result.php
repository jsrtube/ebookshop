<?php 
session_start();
if(!isset($_SESSION['username'])){
	header('location:../index.html');
}


?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Result</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Tempusdominus Bootstrap 4 -->
  <link rel="stylesheet" href="plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- JQVMap -->
  <link rel="stylesheet" href="plugins/jqvmap/jqvmap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/adminlte.min.css">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="plugins/daterangepicker/daterangepicker.css">
  <!-- summernote -->
  <link rel="stylesheet" href="plugins/summernote/summernote-bs4.min.css">
</head>
<body class="hold-transition sidebar-mini layout-fixed">


  <!-- Preloader -->
  

 

     

    <!-- Content Header (Page header) -->
    
    <!-- /.content-header -->

    <!-- Main content -->
   <div class="col-12">
                    <nav class="navbar navbar-expand navbar-orange navbar-light">
                      <!-- Left navbar links -->
                      <ul class="navbar-nav">
                        <li class="nav-item">
                          <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
                        </li>
						<li class="nav-item d-none d-sm-inline-block">
                          <a href="#" class="nav-link" style="color: #fff;">JSR Smart Ebook</a>
                        </li>
                        <li class="nav-item d-none d-sm-inline-block">
                          <a href="../index.html" class="nav-link">Home</a>
                        </li>
						
                        <li class="nav-item d-none d-sm-inline-block">
                          <a href="#" class="nav-link">Contact</a>
                        </li>
                      </ul>

                      <!-- Right navbar links -->
                      <ul class="navbar-nav ml-auto">
                        <!-- Navbar Search -->
                        <li class="nav-item">
                          <a class="nav-link" data-widget="navbar-search" data-target="#navbar-search5" href="#" role="button">
                            <i class="fas fa-search"></i>
                          </a>
                          <div class="navbar-search-block" id="navbar-search5">
                            <form class="form-inline">
                              <div class="input-group input-group-sm">
                                <input class="form-control form-control-navbar" type="search" placeholder="Search" aria-label="Search">
                                <div class="input-group-append">
                                  <button class="btn btn-navbar" type="submit">
                                    <i class="fas fa-search"></i>
                                  </button>
                                  <button class="btn btn-navbar" type="button" data-widget="navbar-search">
                                    <i class="fas fa-times"></i>
                                  </button>
                                </div>
                              </div>
                            </form>
                          </div>
                        </li>

                        <!-- Messages Dropdown Menu -->
                        <li class="nav-item">
                          <a class="nav-link" href="../index.html">
                            <i class="fas fa-home"></i>
                          </a>
                        </li>
                        <li class="nav-item">
                          <a class="nav-link" data-widget="fullscreen" href="#" role="button">
                            <i class="fas fa-expand-arrows-alt"></i>
                          </a>
                        </li>
                        
                      </ul>
                    </nav>
                  </div><br><br>
      <div class="container-fluid" >
       
	   
	 <table id="table" class="table table-bordered">
	      <tr>
		     <th>Username</th>
			 <th>Task Number</th>
			 <th>Marks</th>
			 <th>Date/time</th>
		  </tr>
		  <?php
		  include'connection.php';
		  $user_r = $_SESSION['username'];
		  $sql_r = "SELECT * FROM quiz_result WHERE username = '$user_r'";
		  $r_query = mysqli_query($conn,$sql_r);
		

	      
        
	
		  while($row = (mysqli_fetch_array($r_query))){ ?>
		  
		  <tr><?php
		  $g_num = $row['u_score'];
		  $task_num = $row['task_qr_num'];
		  $query = "SELECT COUNT(qid) AS total FROM question WHERE task_qr_num = '$task_num'";
	      $data = mysqli_query($conn,$query);           // studentlogin = table name
	      $total = mysqli_fetch_array($data);
          $num_rows=$total['total'];
		  $p_result = $g_num*100/$num_rows; ?>
		  
		     <td><?php echo $row['username'];?></td>
			 <td><?php echo $row['task_qr_num'];?></td>
			 <td><?php echo $row['u_score'];?>
			 <div class="progress progress-xs">
                          <div class="progress-bar progress-bar-success" style="width: <?php echo $p_result ?>%;"></div>
                        </div>
			 </td>
			 <td><?php echo $row['t_date'];?></td>
		  </tr>
			  
		 <?php  } ?>
		 
		  
		  
		  
		  
	 </table>
	 
	 
	 
	 
	 
	 
	 
	 
	 
	 
	 
	 
	 
	 
	 
	 
	 
	 
  
    <!-- /.content -->
  </div><br><br><hr><br>
  <!-- /.content-wrapper -->
 <footer class="footer" align="center">

  <strong>Copyright &copy; <a href="#">JSR Ebook Shop</a>.</strong> All rights reserved.
  </footer><br><br><hr>
<!-- jQuery -->
<script src="plugins/jquery/jquery.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="plugins/jquery-ui/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- ChartJS -->
<script src="plugins/chart.js/Chart.min.js"></script>
<!-- Sparkline -->
<script src="plugins/sparklines/sparkline.js"></script>
<!-- JQVMap -->
<script src="plugins/jqvmap/jquery.vmap.min.js"></script>
<script src="plugins/jqvmap/maps/jquery.vmap.usa.js"></script>
<!-- jQuery Knob Chart -->
<script src="plugins/jquery-knob/jquery.knob.min.js"></script>
<!-- daterangepicker -->
<script src="plugins/moment/moment.min.js"></script>
<script src="plugins/daterangepicker/daterangepicker.js"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
<!-- Summernote -->
<script src="plugins/summernote/summernote-bs4.min.js"></script>
<!-- overlayScrollbars -->
<script src="plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.js"></script>
<script src="dist/js/pages/dashboard.js"></script>
</body>
</html>
