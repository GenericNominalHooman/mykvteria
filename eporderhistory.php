<!DOCTYPE html>
<html>
<head>
	<title>My Dashboard</title>
	<link rel = "stylesheet" type = "text/css" href = "stdashboardd.css">

  <link rel = "stylesheet" type = "text/css" href = "custorders.css">
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css"> 

	<script src="https://kit.fontawesome.com/b99e675b6e.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"></script>

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
$staffid = $_SESSION['staffid'];
$sql=mysqli_query($con,"SELECT * FROM staff where staffid='$staffid' ");
$row  = mysqli_fetch_array($sql);

?>

<body>




<center>
	<br>
	<br>
	<a href="epdashboard.php"><img src = "img/Mykvteria.png" width="200px"></a>

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
  <a href="epdashboard.php">Cafeteria</a>
  <a class="active" href="eporderhistory.php">Order History</a>
  <a href="epfeedbacks.php">Feedbacks</a>

  	<div class="topnav-right">

  		<a href="epcart.php"><span><span class="badge badge-danger item_count" id="item_count">0</span>
        <i class="fas fa-shopping-cart"></i></a>
      <a href="eplogout.php"><i class="fas fa-power-off"></span></i></a>

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
        <th>Time</th>
        <th>Orders</th>
        <th>Status</th>

      </tr>

      <?php

      $sql = "select * from eporders where username = '" . $_SESSION['username'] . "';";

      $result = $con->query($sql);

      if($result->num_rows>0){
        while($row = $result->fetch_assoc()){

          $id = $row['id'];

      ?>

      <tr>

        <td><?php echo $row['id']; ?></td>
        <td><?php echo $row['dateorder']; ?></td>
        <td><?php echo $row['timeorder']; ?></td>
        <td><a type="view" class="view" href="vieweporder.php?id=<?php echo $id; ?>">VIEW</a></td>
      
        <td><?php echo $row['status']; ?></td>
    
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
<script src="./js/epcart_count.js"></script>
<script type="text/javascript">
// Display Cart Count
var username  = $('#student_username').val();
getCartCount(username);

// Insert Cart Data
  $(function(){
    $('.addtocart').click(function(e){

      console.log(this)
      var valid = this.form.checkValidity();

      if(valid){

      var selectedMenuType = this.id.split("_")[0];

      var hidden_name  = $('#' + selectedMenuType + '_name_' + this.id.split("_")[2]).val();
      var hidden_price = $('#' + selectedMenuType + '_price_' + this.id.split("_")[2]).val();
      var quantity  = $('#' + selectedMenuType + '_quantity_' + this.id.split("_")[2]).val();
      var username  = $('#student_username').val();

        e.preventDefault(); 

        $.ajax({
          type: 'POST',
          url: 'epaddcart.php',
          data: {hidden_name: hidden_name, hidden_price: hidden_price, quantity: quantity, username: username},
          success: function(data){
            Swal.fire({
              'title': 'Successful',
              'text': data,
              'type': 'success'
            })
            getCartCount(username);
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