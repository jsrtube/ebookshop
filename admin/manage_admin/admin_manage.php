<?php
include'connection.php';
if(isset($_POST['add_admin'])){
	$fullname = $_POST['fullname'];
	$username = $_POST['username'];
	$password = $_POST['password'];
	$mobile = $_POST['mobile'];
	$email = $_POST['email'];
	$add_admin  = "INSERT INTO admin (fullname,username,mobile,email,password) VALUES ('$fullname','$username','$mobile','$email','$password')";
    mysqli_query($conn,$add_admin);
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Admin Panel</title>
  <link rel="stylesheet" href="css/s.css">
</head>
<body>
<div class="container-fluid">
    <div class="row">
	
		 <table class="table" style=""><br>
    <tr>
      <td id="">
        <h2 align="center">Admin Management</h2>

        <div id="search-bar">
          <label>Search :</label>
          <input type="text" id="search" autocomplete="off">
        </div>
      </td>
    </tr>
   <tr>
 <td> <form action="" method="POST">
  <div class="form-row container-fluid">
    <div class="col">
      <input type="text" class="form-control" name="fullname" placeholder="Enter Full Name">
    </div>
    <div class="col">
      <input type="text" class="form-control" name="username" placeholder="Enter username">
    </div>
	<div class="col">
      <input type="text" class="form-control" name="password" placeholder="Enter Password">
    </div>
	<div class="col">
      <input type="text" class="form-control" name="mobile" placeholder="Enter Mobile">
    </div>
	<div class="col">
      <input type="text" class="form-control" name="email" placeholder="Enter Email">
    </div>
	<div class="col-1">
      <input type="submit" class="form-control btn-warning" name="add_admin">
    </div>
  </div>
</form> <td>  
   </tr>
    <tr>
      <td id="table-data" class="table">
      </td>
    </tr>
  </table>
	
		
		 <?php // include'uadd/useradd.php'; ?>
		
    </div>
  </div>
  

  
  <div id="error-message"></div>
  <div id="success-message"></div>
  <div id="modal">
    <div id="modal-form">
      <h2>Edit Form</h2>
      <table cellpadding="10px" width="100%">
      </table>
      <div id="close-btn">X</div>
    </div>
  </div>

<script type="text/javascript" src="js/jquery.js"></script>
<script type="text/javascript">
  $(document).ready(function(){
    // Load Table Records
    function loadTable(){
      $.ajax({
        url : "manage_admin/ajax-load.php",
        type : "POST",
        success : function(data){
          $("#table-data").html(data);
        }
      });
    }
    loadTable(); // Load Table Records on Page Load

   
    //Delete Records
    $(document).on("click",".delete-btn", function(){
     
        var studentId = $(this).data("id");
        var element = this;

        $.ajax({
          url: "manage_admin/ajax-delete.php",
          type : "POST",
          data : {id : studentId},
          success : function(data){
              if(data == 1){
                $(element).closest("tr").fadeOut();
              }else{
                $("#error-message").html("Can't Delete Record.").slideDown();
                $("#success-message").slideUp();
              }
          }
        });
      
    });

    //Show Modal Box
    $(document).on("click",".edit-btn", function(){
      $("#modal").show();
      var studentId = $(this).data("eid");

      $.ajax({
        url: "manage_admin/load-update-form.php",
        type: "POST",
        data: {id: studentId },
        success: function(data) {
          $("#modal-form table").html(data);
        }
      })
    });

    //Hide Modal Box
    $("#close-btn").on("click",function(){
      $("#modal").hide();
    });

    //Save Update Form
      $(document).on("click","#edit-submit", function(){
        var stuId = $("#edit-id").val();
        var username = $("#edit-username").val();
        var mobile = $("#edit-mobile").val();
		var email = $("#edit-email").val();
		var fullname = $("#edit-fullname").val();
		var password = $("#edit-password").val();

        $.ajax({
          url: "manage_admin/ajax-update-form.php",
          type : "POST",
          data : {id: stuId, username: username, mobile: mobile,email: email,fullname: fullname,password: password},
          success: function(data) {
            if(data == 1){
              $("#modal").hide();
              loadTable();
            }
          }
        })
      });

    // Live Search
     $("#search").on("keyup",function(){
       var search_term = $(this).val();

       $.ajax({
         url: "manage_admin/ajax-live-search.php",
         type: "POST",
         data : {search:search_term },
         success: function(data) {
           $("#table-data").html(data);
         }
       });
     });
  });
</script>
</body>





</html>
