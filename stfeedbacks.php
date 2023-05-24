<!DOCTYPE html>
<html>
<head>
	<title>My Dashboard</title>
	<link rel = "stylesheet" type = "text/css" href = "stdashboardd.css">

  <link rel = "stylesheet" type = "text/css" href = "custorders.css">
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css"> 

	<script src="https://kit.fontawesome.com/b99e675b6e.js"></script>
  <script src="https://kit.fontawesome.com/c8bcf77590.js" crossorigin="anonymous"></script>
	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
	integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
	crossorigin="anonymous"></script>
	<script src="plugin.js"></script>
	 </style>
  <style type="text/css">
            .view, .update{
                background: #192163;
                text-align: center;
                border: 2px solid #192163;
                padding: 3px 6px;
                outline: none;
                color: white;
                border-radius: 5px;
                transition: 0.25s;
                cursor: pointer;
                font-weight: bold;
                text-decoration: none;
                font-size: 14px;

            }

            a[type='view']:hover,
            a[type='update']:hover{

              background:#fff;
              color: #F78418;
                border: 2px solid #F78418;
            }
          </style>


	</head>

<?php

session_start();
include 'config.php';
$studid = $_SESSION['studid'];
$sql=mysqli_query($con,"SELECT * FROM student where studid='$studid' ");
$row  = mysqli_fetch_array($sql);

?>

<body>




<center>
	<br>
	<br>
	<a href="stdashboard.php"><img src = "img/Mykvteria.png" width="200px"></a>

	<p class="heads">

		<b>Hello</b>

			<a>
			<?php 

				echo $_SESSION["username"];

			?>
			</a>
		<b>♥</b>

		
	</p>
</center>
<center>
<div class="topnav">
  <a href="stdashboard.php">Cafeteria</a>
  <a href="storderhistory.php">Order History</a>
  <a class="active" href="stfeedbacks.php">Feedbacks</a>

  	<div class="topnav-right">

  		<a href="stcart.php"><span><span class="badge badge-danger item_count" id="item_count">0</span>
  			<i class="fas fa-shopping-cart"></i></a>
  		<a href="stlogout.php"><i class="fas fa-power-off"></span></i></a>
	</div>

</div>

<input type="hidden" id="student_username" name="student_username" value="<?php echo $_SESSION["username"] ?>">

<div style="padding-left:16px">
</center>
<br>
<br>
<center>
<table class="table table-bordered">
    
       <tr>

        <th>ID</th>
        <th>Date</th>
        <th>Orders</th>
        <th>Status</th>
        <th>Actions</th>

      </tr>

      <?php

      $sql = "select * from storders where username = '" . $_SESSION['username'] . "' AND status = 'Order Completed' AND feedback IS NULL";

      $result = $con->query($sql);

      if($result->num_rows>0){
        while($row = $result->fetch_assoc()){

          $id = $row['id'];

      ?>

      <tr>

        <td><?php echo $row['id']; ?></td>
        <td><?php echo $row['dateorder']; ?></td>
        <td><a type="view" class="view" href="viewstorder.php?id=<?php echo $id; ?>">VIEW</a></td>

        <td><?php echo $row['status']; ?></td>
      
        <td><a type="view" class="view" href="staddfeedback.php?id=<?php echo $id; ?>">Feedback</a></td>
    
      </tr>

        <?php

                  }
                }

                ?>
            
              </table>
            </center>
          </div>
        </span>
      </a>
    </div>
  </div>
</center>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@8"></script>
<script src="./js/cart_count.js"></script>
<script type="text/javascript">
// Display Cart Count
var username  = $('#student_username').val();
getCartCount(username);
</script>
</body>
</html>