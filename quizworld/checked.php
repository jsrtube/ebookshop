<?php
   session_start();
   
   if(!isset($_SESSION['username'])){
	   
   	header('location:../index.html');
   }
   if(!isset($_SESSION['task'])){
	  header('location:../index.html'); 
   }
   
   include'connection2.php';
   
 
   ?>
<!DOCTYPE html>
<html>
   <head>
      <title></title>
      <!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">

<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

<!-- Popper JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
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
     <div class="container text-center" >
     	<br><br>
    	<h1 class="text-center text-success text-uppercase animateuse" > JSR SMART BOOK Quiz World</h1>
    	<br><br><br><br>
      <table class="table text-center table-bordered table-hover">
      	<tr>
      		<th colspan="2" class="bg-dark"> <h1 class="text-white"> Results </h1></th>
      		
      	</tr>
      	<tr>
		      	<td>
		      		Questions Attempted
		      	</td>

	         <?php
         $counter = 0;
         $Resultans = 0;
            if(isset($_POST['submit'])){
            if(!empty($_POST['quizcheck'])) {
            // Counting number of checked checkboxes.
            $checked_count = count($_POST['quizcheck']);
            //print_r($_POST);
            ?>

        	<td>
            <?php
            echo "Out of 5, You have attempt ".$checked_count." option."; ?>
            </td>
        
          	
            <?php
			error_reporting(0);
            // Loop to store and display values of individual checked checkbox.
            $selected = $_POST['quizcheck'];
             include 'connection2.php';
            $q1= " select ans_id from question ";
            $ansresults = mysqli_query($conn,$q1);
			$s_min = "SELECT MIN(qid) FROM question";
		    $s_min_q = mysqli_query($connn,$s_min);
			$s_min_result = mysqli_fetch_array($s_min_q);
			$s_min_total = $s_min_result['0'];
            $i = $s_min_total;
            while($rows = mysqli_fetch_array($ansresults)) {
              //print_r($rows['ans_id']);
            	$flag = $rows['ans_id'] == $selected[$i];
            	
            			if($flag){
            				 //echo "correct ans is ".$rows['ans_id']."<br>";				
            				$counter++;
            				$Resultans++;
							//echo "correct ".$Resultans."hi<br><br>";
            				//echo "Well Done! your ". $counter ." answer is correct <br><br>";
            			}else{
            				$counter++;
            				// echo "Sorry! your ". $counter ." answer is innncorrect <br><br>";
            			}					
            		$i++;		
            	}
            	?>
            	
    		
    		<tr>
    			<td>
    				Your Total score
    			</td>
    			<td colspan="2">
	    	<?php 
	            echo " Your score is ". $Resultans.".";
	            }
	            else{
	            echo "<b>Please Select Atleast One Option.</b>";
	            }
	            } 
	          ?>
	          </td>
            </tr>

            <?php 
            if(isset($_POST['submit'])){
            $name = $_SESSION['username'];
			$task = $_SESSION['task'];
			$q_date = date('d-m-Y');
            $finalresult = " insert into quiz_result (username,u_q_attend, u_score,task_qr_num, q_date) values ('$name','$checked_count','$Resultans','$task','$q_date')";
            $queryresult= mysqli_query($conn,$finalresult); 
            // if($queryresult){
            // 	echo "successssss";
            // }
			}
			  if(isset($_POST['submit_task'])){
	   
	   //first
	    $file_name1 = $_FILES['uploadfile1']['name'];
		 $file_type1 = $_FILES['uploadfile1']['type'];
		 $file_size1 = $_FILES['uploadfile1']['size'];
		 $file_tem_Loc1 = $_FILES['uploadfile1']['tmp_name'];
		 $file_store1 = "upload/".$file_name1;
		 
		if (move_uploaded_file($file_tem_Loc1, $file_store1)) {
		       
		}
	   //end
	     //second
	      $file_name2 = $_FILES['uploadfile2']['name'];
		 $file_type2 = $_FILES['uploadfile2']['type'];
		 $file_size2 = $_FILES['uploadfile2']['size'];
		 $file_tem_Loc2 = $_FILES['uploadfile2']['tmp_name'];
		 $file_store2 = "upload/".$file_name2;
		 
		if (move_uploaded_file($file_tem_Loc2, $file_store2)) {
		       
		}
	   //end
	   
	     //third
	      $file_name3 = $_FILES['uploadfile3']['name'];
		 $file_type3 = $_FILES['uploadfile3']['type'];
		 $file_size3 = $_FILES['uploadfile3']['size'];
		 $file_tem_Loc3 = $_FILES['uploadfile3']['tmp_name'];
		 $file_store3 = "upload/".$file_name3;
		 
		if (move_uploaded_file($file_tem_Loc3, $file_store3)) {
		      
		}
	   //end
	     //forth
	      $file_name4 = $_FILES['uploadfile4']['name'];
		 $file_type4 = $_FILES['uploadfile4']['type'];
		 $file_size4 = $_FILES['uploadfile4']['size'];
		 $file_tem_Loc4 = $_FILES['uploadfile4']['tmp_name'];
		 $file_store4 = "upload/".$file_name4;
		 
		if (move_uploaded_file($file_tem_Loc4, $file_store4)) {
		       
		}
		$task_send = "INSERT INTO activity (task_qr_num,username,u_image,q_a_image,audio,parents_a_image)
		VALUES('$task','$name','$file_store1','$file_store2','$file_store3','$file_store4')";
		$task_sended_q = mysqli_query($conn,$task_send);
	   //end
	    if(isset($_POST['submit_task'])){
			header('location:../index.html');
		}
   }   
            ?>


      </table>
	  <form action="" method="post" enctype="multipart/form-data">

                 <b>Task 1 </b> Select Underline Image <input type="file" class="form-control" name="uploadfile1" value="Select Under Image">
				<b>Task 2 </b> Select Questions & Answers Image  <input type="file" class="form-control" name="uploadfile2" value="Select Q&A Image">
				 <b>Task 3 </b> Select Evidence Image<input type="file" class="form-control" name="uploadfile4" value="Select Parents">
					<b>Task 4 </b> Select Audio<input type="file" class="form-control" name="uploadfile3" value="Select Voice" accept="audio/*">
                  <br><input type="submit" name="submit_task" Value="Submit" class="btn btn-success m-auto d-block" /> <br>
        </form>

      	<a href="logout.php" class="btn btn-success"> LOGOUT </a>
      </div>
   </body>
</html>












<!-- 

<?php

if(!isset($_SESSION['username'])){
header('location:login.php');
}

 $conn = mysqli_connect('localhost','root');
    if($conn){
      echo"connection";
    }
   
    mysqli_select_db($conn,'quizdatabases');


    if(isset($_POST['submit'])){

      if(!empty($_POST['quizcheck'])){

        $count = count($_POST['quizcheck']);
          echo "you count is". $count;

          $selected = $_POST['quizcheck'];
          print_r($selected);

          $q = " select * from question ";
          $query = mysqli_query($conn,$q);

          $result = 0;
          $i = 1;
          while ( $rows = mysqli_fetch_array($query)) {
            
              print_r($rows['ans_id']);

              $stored  = $rows['ans_id'] == $selected[$i];

              if($stored){

                $result++;

              }

              $i++;

          }

          echo $result;

      }

    }


?> -->