<!DOCTYPE html>
<html>
<head>
	<title>admin dashboard</title>
	<link rel = "stylesheet" type = "text/css" href = "addashboard.css">

  <link rel = "stylesheet" type = "text/css" href = "custorders.css">
  <style type="text/css">
    .box{
  width: 85%;
  padding: 45px;
  position: absolute;
  top: 50%;
  left: 50%;
  transform: translate(-50%,-50%);
  background: #fff;
  color: black;

}

.topnav {
  background-color: #192163;
  overflow: hidden;
  text-shadow: none;
  border:2px solid #192163;
}

.topnav a {
  float: left;
  color: #f2f2f2;
  text-align: center;
  padding: 14px 18px;
  text-decoration: none;
  font-size: 17px;
  font-weight: bold;
}

.topnav-right {
  float: right;
  background-color: none;
}

.topnav-right a:hover{
}

.topnav a:hover {
  color: #F26012;
  border:#192163;
}

.topnav a.active {
  background-color: white;
  color: #192163;
}
  </style>
  <style type="text/css">
            .view, .update{
                background: #192163;
                text-align: center;
                border: 2px solid #192163;
                padding: 14px 35px;
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
        <div class="header">Customers Feedbacks

      
        </div>  
        <div class="info">
          <div>
            <div class="topnav">
              <a class="active" href="feedback.php">Students</a>
              <a href="feedbackep.php">Employees</a>


</div>
            
            <center> 
              
              <table>
                
                <tr>
                  <th>No.</th>
                  <th>Username</th>
                  <th>Order ID</th>
                  <th>Feedback</th>
                </tr>

                <?php

                $i =1;
      $sql = "select * from storders where feedback IS NOT NULL";

      $result = $con->query($sql);

      if($result->num_rows>0){
        while($row = $result->fetch_assoc()){

      ?>

                <tr>
                  <td><?php echo $i++; ?></td>
                  <td><?php echo $row['username']; ?></td>
                  <td><?php echo $row['id']; ?></td>
                  <td><?php echo $row['feedback']; ?></td>
                </tr>

                <?php

                  }
                }

                ?>

              </table>

            </center>

          </div>
      </div>
    </div>
</div>
</body>
</html>