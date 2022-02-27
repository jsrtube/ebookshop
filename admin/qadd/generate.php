<?php
include 'connection.php';
if(isset($_POST['submit'])){
$question = $_POST['question'];
$ans = $_POST['ans'];
// answer row fetch
$sql3 = "SELECT MAX(aid) FROM answers";
$data5 = mysqli_query($conn,$sql3);       
$row = mysqli_fetch_array($data5);
$ans_total_row = $row['0']; //total answer table rows

$ans_value_add = $ans_total_row + $ans;
//question row fetch
$sql4 = "SELECT MAX(qid) FROM question";
$data4 = mysqli_query($conn,$sql4);       
$row2 = mysqli_fetch_array($data4);
$q_total_row = $row2['0']; //total answer table rows


$q_value_add = $q_total_row + 1;  //correct question store in answer table
$task_qr_num = $_POST['task_qr_num'];
// add Question 
$sql = "INSERT INTO question (question, task_qr_num, ans_id) VALUES ('$question','$task_qr_num','$ans_value_add' )";
$query3 = mysqli_query($conn,$sql);   



//add answers
//if (isset($_POST['submit'])) {
	$opt = $_POST['option'];
foreach ($opt as $index => $optans) {
    $sql3 = "INSERT INTO answers (answers, q_id) VALUES ('$optans','$q_value_add' )";
	$query4 = mysqli_query($conn,$sql3);  
  
  } 
//}




//$sql2 = "INSERT INTO answers (answers, q_id) VALUES ('$options','$q_value_add' )";
//$query4 = mysqli_query($conn,$sql2);        

 

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

         
            <!-- <h1 class="text-center text-success text-uppercase animateuse" >   Quiz </h1>
            <br> -->
            <div class=" col-lg-12 text-center"><br>
               <h3> <a href="#" class="text-uppercase text-warning"> </a> Welcome to SMART Book Question Entry </h3>
            </div>

            <div class="col-lg-8 d-block m-auto bg-light ">
               <br>
               <form action="" method="POST">
                 Question<input type="text" class="form-control" style="width: 100%;" name="question" placeholder="ENTER Question" required />
			
				 1. <input type="text" class="form-control" name="option[]" style="width: 100%;" placeholder="ENTER Option 1" required />
			
				 2.<input type="text" class="form-control" name="option[]" style="width: 100%;" placeholder="ENTER Option 2" required />
			
				 3.<input type="text" class="form-control" name="option[]" style="width: 100%;" placeholder="ENTER Option 3" required / >

				 4.<input type="text" class="form-control" name="option[]" style="width: 100%;" placeholder="ENTER Option 4" required /> 
				
				 <div class="form-group">
                    <label for="exampleInputText">Select Correct Option</label>
                    <input type="number" class="form-control" name="ans" style="width: 20%" maxlength="1" placeholder="Answer" required />
				 
					</div>
				 <input type="text" class="form-control" name="task_qr_num" style="width: 100%;" placeholder="ENTER Qr code Number" required /> 
				 <br>
                  <input type="submit" name="submit" Value="Submit" class="btn btn-success m-auto d-block" /> <br>
               </form>
               
            </div>



              </form>
   </body>
</html>
