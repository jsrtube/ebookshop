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
	    <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6">
		 <table class="table" style=""><br>
    <tr>
      <td id="">
        <h2 align="center">Question Management</h2>

        <div id="search-bar">
          <label>Search :</label>
          <input type="text" id="search" autocomplete="off">
        </div>
      </td>
    </tr>
   
    <tr>
      <td id="table-data" class="table">
      </td>
    </tr>
  </table>
		</div>
		<div class="col-sm-12 col-md-6 col-lg-6 col-xl-6">
		  <?php include'qadd/generate.php'; ?>
		</div>
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
        url : "manage_task/ajax-load.php",
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
          url: "manage_task/ajax-delete.php",
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
        url: "manage_task/load-update-form.php",
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
        var question = $("#edit-question").val();
        var answers = $("#edit-answers").val();
		var task_qr_num = $("#edit-task_qr_num").val();

        $.ajax({
          url: "manage_task/ajax-update-form.php",
          type : "POST",
          data : {id: stuId, question: question, answers: answers,task_qr_num: task_qr_num},
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
         url: "manage_task/ajax-live-search.php",
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
