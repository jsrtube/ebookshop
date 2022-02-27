<?php 
session_start();
if(!isset($_SESSION['username'])){
	header('location:../index.html');
}

if(isset($_POST['send'])){
   include'connection.php';
   $message_s = $_POST['message'];
   $m_other = $_POST['other'];
   $m_to = $_SESSION['username'];
   $m_send = "INSERT INTO chat (c_to,message,c_from,other) VALUES ('teacher','$message_s','$m_to','$m_other')";
   mysqli_query($conn,$m_send);   

}

$page = 'chat';
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>CHAT</title>

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
       
	   
	 
            <!-- DIRECT CHAT -->
            <div class="card direct-chat direct-chat-primary" >
              <div class="card-header">
                <h3 class="card-title">Direct Chat</h3>

                <div class="card-tools">
                  <span title="3 New Messages" class="badge badge-primary">3</span>
                  <button type="button" class="btn btn-tool" data-card-widget="collapse">
                    <i class="fas fa-minus"></i>
                  </button>
                  <button type="button" class="btn btn-tool" title="Contacts" data-widget="chat-pane-toggle">
                    <i class="fas fa-comments"></i>
                  </button>
                  <button type="button" class="btn btn-tool" data-card-widget="remove">
                    <i class="fas fa-times"></i>
                  </button>
                </div>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
         
                <!-- Conversations are loaded here -->
                <div class="direct-chat-messages">
                  <!-- Message. Default to the left -->
				  
				  <?php 
				  include'connection.php';
                                  $s_username = $_SESSION['username'];
				  $search_c = "SELECT * FROM chat WHERE c_to = '$s_username' or c_from = '$s_username' ORDER BY time_s";
				  $query_c = mysqli_query($conn,$search_c);
				  while($data_c = mysqli_fetch_array($query_c)){
					?>
					        <?php 
							$send_f = $data_c['other'];
							if($send_f == '1'){
							  $send = 'display: none;';	
							}
							else{
							  $send = '';	
							}
							if($send_f == '0'){
							  $recive = 'display: none;';	
							}
							else{
							  $recive = '';	
							}
							?>
               				<div class="direct-chat-msg" style="<?php echo $send; ?>">
                    <div class="direct-chat-infos clearfix">
                  
                      <span class="direct-chat-timestamp float-right"><?php echo $data_c['time_s'];?></span>
                    </div>
                    <!-- /.direct-chat-infos -->
                    
                    <!-- /.direct-chat-img -->
                    <div class="direct-chat-text">
                      <?php echo $data_c['message'];?> <b class="float-right"><?php echo $data_c['c_from'];?></b>
                    </div>
                    <!-- /.direct-chat-text -->
                  </div>	
				  
				    
                
				    <div class="direct-chat-msg right" style="<?php echo $recive; ?>">
                    <div class="direct-chat-infos clearfix">
                      <span class="direct-chat-name float-right"><?php echo $data_c['c_from'];?></span>
                      <span class="direct-chat-timestamp float-left"><?php echo $data_c['time_s'];?></span>
                    </div>
                    <!-- /.direct-chat-infos -->
                    <img class="direct-chat-img" src="dist/img/user1-128x128.jpg" alt="message user image">
                    <!-- /.direct-chat-img -->
                    <div class="direct-chat-text">
                      <?php echo $data_c['message'];?>
                    </div>
                    <!-- /.direct-chat-text -->
                  </div>
				  
				  
				<?php   }
				  
				  ?>




                
                <!-- /.direct-chat-pane -->
              </div>
              <!-- /.card-body -->
              <div class="card-footer">
                <form action="" method="POST">
                  <div class="input-group">
                    <input type="text" name="message" placeholder="Type Message ..." class="form-control">
                    <span class="input-group-append">
					<input type="hidden" name="other" value="1">
                      <button type="submit" class="btn btn-primary" name="send" >Send</button>
                    </span>
                  </div>
                </form>
              </div>
              <!-- /.card-footer-->
            </div>
           
        </div>
  
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
