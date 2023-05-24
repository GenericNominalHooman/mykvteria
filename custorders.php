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
        <div class="header">Customer Orders
        </div>  
        <div class="info">
          <div class="topnav">
              <a class="active" href="custorders.php">Students</a>
              <a href="eporders.php">Employees</a>


</div>
<div class="container-fluid">
  <div class="card">
    <div class="card-body">
      <center>
        <p>STUDENT ORDERS</p>
        <br>
        
      <table class="table table-bordered">
    
       <tr>

        <th>ID</th>
        <th>Date</th>
        <th>Username</th>
        <th>Orders</th>
        <th>Status</th>
        <th>Action</th>

      </tr>

      <?php

      $sql = "select * from storders where status NOT IN ('Order Completed')";

      $result = $con->query($sql);

      if($result->num_rows>0){
        while($row = $result->fetch_assoc()){

          $id = $row['id'];

      ?>

      <tr>

        <td><?php echo $row['id']; ?></td>
        <td><?php echo $row['dateorder']; ?></td>
        <td><?php echo $row['username']; ?></td>
        <td><a type="view" class="view" href="viewstorder.php?id=<?php echo $id; ?>">VIEW</a></td>
        <td><?php echo $row['status']; ?></td>
          <td>
          <form method ="post" action = "custorders.php">
          <select id="status" name="status" onchange="form.submit()">
                  <option value="Pending">Pending</option>
                  <option value="In Making">In Making</option>
                  <option value="Ready to Take">Ready</option>
                  <option value="Order Completed">Completed</option>

                  <input type ="hidden" name="id" value="<?php echo $id; ?>">
            </select>
             </form>
          </td>
    
      </tr>

        <?php

                  }
                }

                ?>
            
              </table>
           
      </div>
    </div>
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@8"></script>
<script type="text/javascript">
  $(function(){
    $('#update').click(function(e){

      var valid = this.form.checkValidity();

      if(valid){


      var status  = $('#status').val();
      
        e.preventDefault(); 

        $.ajax({
          type: 'POST',
          url: 'updatestorder.php',
          data: {status: status},
          success: function(data){
          Swal.fire({
                'title': 'Successful',
                'text': data,
                'type': 'success'
                })
              
          },
          error: function(data){
            Swal.fire({
                'title': 'Errors',
                'text': 'There were errors while saving the data.',
                'type': 'error'
                })
          }
        });

        
      }else{
        
      }

      



    });   

    
  });
  
</script>

</body>
</html>
<?php

  if(isset($_POST['status'])){

    $status   = htmlspecialchars(mysqli_real_escape_string($con, $_POST['status']));
    $id       = htmlspecialchars(mysqli_real_escape_string($con, $_POST['id']));

    $sql      = "UPDATE storders SET status = '$status' where id = '$id'";

    $res      = mysqli_query($con, $sql);

    if($res){

      echo '';

    }else{

      echo '';

    }

  }

?>

