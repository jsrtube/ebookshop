<?php
include 'connection.php';
/* session_start();
if(!isset($_SESSION['admin'])){
	header('location:../admin/login.php');
} */
if(isset($_POST['submit'])){
$fullname = $_POST['fullname'];
$username = $_POST['username'];
$mobile = $_POST['mobile'];
$email = $_POST['email'];
$sql = "INSERT INTO user_reg (fullname,username,mobile,email) VALUES ('$fullname','$username','$mobile','$email')";
$query= mysqli_query($conn,$sql);
}

?>

<!DOCTYPE html>
<html>
   <head>
      <title></title>
      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
      <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
      <link href="https://fonts.googleapis.com/css?family=Montserrat|Open+Sans" rel="stylesheet">
      <link rel="stylesheet" type="text/css" href="style.css">
      <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
      <link rel="stylesheet" type="text/css" href="
         https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css">
      <style type="text/css">
         .animateuse{
         animation: leelaanimate 0.5s infinite;
         }
         @keyframes leelaanimate{
         0% { color: red },
         10% { color: yellow },
         20%{ color: blue }
         40% {color: green },
         50% { color: pink }
         60% { color: orange },
         80% {  color: black },
         100% {  color: brown }
         }
      </style>
   </head>
   <body>

     

      <div>
       <!--   <h1 class="text-center text-white font-weight-bold text-uppercase bg-dark" >  Complete Quiz Website using PHP and MYSQL using Session</h1><br>
      <div class="container "><br> -->
        
      <div class="container "><br>
         <div class="container">
         
            <!-- <h1 class="text-center text-success text-uppercase animateuse" >   Quiz </h1>
            <br> -->
            <div class=" col-lg-12 text-center">
               <h3> <a href="#" class="text-uppercase text-warning"> </a> Welcome to SMART Book USER ENTERY </h3>
            </div>
            <br>
            <div class="col-lg-8 d-block m-auto bg-light ">
               <div class="card">
                  <p class="card-header text-center" >ADD USER</p>
               </div>
               <br>
               <form action="" method="POST">
                 <input type="text" class="form-control" style="width: 100%;" name="fullname" placeholder="ENTER FULL NAME" />
				 <br>
				 <input type="text" class="form-control" name="username" style="width: 100%;" placeholder="ENTER USERNAME USER QR"/>
				 <br>
				 <input type="text" class="form-control" name="mobile" style="width: 100%;" placeholder="ENTER MOBILE NUMBER"/>
				 <br>
				 <input type="text" class="form-control" name="email" style="width: 100%;" placeholder="ENTER EMAIL"/>
				 <br><br>
                  <input type="submit" name="submit" Value="Submit" class="btn btn-success m-auto d-block" /> <br>
               </form>
               
            </div>
            <br>
           
         </div>
         <br>
         <footer>
            <h5 class="text-center"> &copy<?php echo date('Y')?> Jsr Tube </h5> 
         </footer>
      </div>


     
        </ul>
      </div>



   </body>
</html>
