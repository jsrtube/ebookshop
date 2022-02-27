<?php
session_start();
if(!isset($_SESSION['admin_login'])){
	header('location:login.php');
}
$gdata1 = $_SESSION['gdata1'];
?>
<!DOCTYPE html>
<html>
<head>
<title>Student Monitor</title>
<style type="text/css">
BODY {
    

}

#chart-container {
    width: 100%;
    height: auto;
}
</style>

<script type="text/javascript" src="js/jquery.min.js"></script>
<script type="text/javascript" src="js/Chart.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
<link rel="stylesheet" href="css/bootstrap.min.css">
<link rel="stylesheet" href="css/button.css">
<meta name="viewport" content="width=device-width, initial-scale=1">



</head>
<body style="background: #ffffff;">

 
	<div class="col">
	   <div id="chart-container">
		<canvas id="graph2" style="color: white;"></canvas>
       </div>
    </div>
	



		   <script>
        $(document).ready(function () {
            showGraph2();
        });


        function showGraph2()
        {
            {
                $.post("data.php",
                function (data)
                {
                    console.log(data);
                     var u_score = [];
                    var task_qr_num = [];
					var t_date = [];
					var username = [];

                    for (var i in data) {
                        u_score.push(data[i].u_score);
                        task_qr_num.push(data[i].task_qr_num);
						t_date.push(data[i].t_date);
						username.push(data[i].username);
                    }

                    var chartdata = {
                        labels: <?php echo $gdata1;?>,
						
                        datasets: [
                            {
                                label: 'Students Report',
                                
                                borderColor: '#20cc00',
                                hoverBackgroundColor: '#bbbbbb',
                                hoverBorderColor: '#666666',
                                data: u_score
                            }
                        ]
                    };

                    var graphTarget = $("#graph2");

                    var barGraph = new Chart(graphTarget, {
                        type: 'line',
                        data: chartdata
                    });
                });
            }
			
		
        }
			 $(document).ready(function() {
	  setInterval(function()  {
	  showGraph2() }, 15000);
	  });
        </script>
		
		

</body>
</html>