<!DOCTYPE html>
<html>
<head>
	<title>admin dashboard</title>
	<link rel = "stylesheet" type = "text/css" href = "addashboard.css">
</head>
<body>

<?php

session_start();
include 'config.php';
$adminid = $_SESSION['adminid'];
$sql=mysqli_query($con,"SELECT * FROM admin where adminid='$adminid' ");
$row  = mysqli_fetch_array($sql);

?>

<script src="https://kit.fontawesome.com/b99e675b6e.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"></script>

<div class="wrapper">
    <div class="sidebar">
      <center>
        <a href="addashboard.php"><img src = "img/Mykvteria.png" width="150px"></a>
        </center>
        <br>
        <ul>
            <li><a href="addashboard.php"><i class="fas fa-home"></i>Home</a></li>
            <li><a href="custorders.php"><i class="fas fa-shopping-cart"></i>Orders</a></li>
            <li><a href="menu.php"><i class="fas fa-book"></i>Add Menu</a></li>
            <li><a href="menulist.php"><i class="fas fa-list"></i>Menu List</a></li>
            <li><a href="feedback.php"><i class="fas fa-people-arrows"></i>Feedbacks</a></li>
            <li><a href="adlogout.php"><i class="fas fa-power-off"></i>Log Out</a></li>
        </ul>
    </div>
    <div class="main_content">
        <div class="header">Welcome Back
          <a>
      <?php 

        echo $_SESSION["adminid"];

      ?>
      </a>

      !
        </div>  
        <div class="info">
          <div>
            
            <center> 
              <br>
              <br>
              <br>
              <h1> Don't Forget to Check Your Clients Orders! </h1>
              <br>
              <br>
              <h2> Have a Wonderful Day!</h2>
              <br>
              <br>
              <h1>♥♥♥</h1>

            </center>

          </div>
      </div>
    </div>
</div>
</body>
</html>