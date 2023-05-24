<!DOCTYPE html>
<html>
<head>
	<title>My Cart</title>
	<link rel = "stylesheet" type = "text/css" href = "stdashboarddd.css">
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css"> 

	<script src="https://kit.fontawesome.com/b99e675b6e.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"></script>

	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
	integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
	crossorigin="anonymous"></script>
	<script src="plugin.js"></script>
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
  <a href="eporderhistory.php">Order History</a>
  <a href="epfeedbacks.php">Feedbacks</a>

  	<div class="topnav-right">

  		<a href="epcart.php"><span><span class="badge badge-danger item_count" id="item_count">0</span>
  			<i class="fas fa-shopping-cart"></i></a>
  		<a href="eplogout.php"><i class="fas fa-power-off"></span></i></a>
	</div>

</div>

<input type="hidden" id="staff_username" name="staff_username" value="<?php echo $_SESSION["username"] ?>">

<div style="padding-left:16px">
</center>
	<center>

		<p>
			<a>
			<?php 

				echo $_SESSION["username"];

			?>
			</a>
		<b>'s Cart</b>

		</p>

		
	<input type="hidden" id="staff_username" name="staff_username" value="<?php echo $_SESSION["username"] ?>">


		<!--Form Started-->

		<form action="epcart.php" method="post">

			<table>
				
				<tr>
					<th>Menu</th>
					<th>Price (RM)</th>
					<th>Quantity</th>
					<th>Total (RM)</th>
					<th>Actions</th>
				</tr>

				<?php   
                  $i = 0;
                  $sql = "SELECT * FROM epcart where username = '" . $_SESSION['username'] . "';";
                  $stmt = $db->query($sql);
                  if ($stmt->rowCount() > 0){

                  while($row = $stmt->fetch(PDO::FETCH_ASSOC)){

                    $id = $row['id'];
                    $i++;
                  ?> 

				<tr>
					<td id="name" type="text"><?php echo $row['name']  ?></td>

					<input type="hidden" id="<?php echo 'name' . $i ?>" name="hidden_name[]" value="<?php echo $row['name']; ?>">


					<td id="price" type="text"><?php echo $row['price']  ?></td>

					<input type="hidden" id="<?php echo 'price' . $i ?>" name="hidden_price[]" value="<?php echo $row['price']; ?>">

					<td id="quantity" type="text"><?php echo $row['quantity']  ?></td>

					<input type="hidden" id="<?php echo 'quantity' . $i ?>" name="hidden_quantity[]" value="<?php echo $row['quantity']; ?>">


					<td class ="total" id="total" type="text">
						<?php 

						$total = ($row['price']*$row['quantity']);

						echo number_format($total,2);

						?>
						
					</td>
					<input type="hidden" id="<?php echo 'total' . $i ?>" name="hidden_total[]" value="<?php echo number_format($total,2); ?>">


					<td>

						<a type="remove" class="remove" href="epcartdelete.php?id=<?php echo $id; ?>" onclick="return confirm('Are you sure?')">REMOVE</a>

					</td>
					<style type="text/css">
						.remove {
							border:0;
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

						}

						a[type='remove']:hover{

							background:#fff;
 							color: #F78418;
  							border: 2px solid #F78418;
						}
					</style>

				</tr>


				<?php

                  }
                }

                ?>

			</table>

			<br>

			<!--TOTAL AND PLACE ORDER-->

			<p>

				The total is RM

				<b id="TotalCart"></b>

			</p>
			<p>

				<!-- PLACE ORDER BUTTON -->

				<input type="submit" value="Place Order Now!" id="placeorder">

			</p>
			<br>
			<br>
			
		</form>

	</center>
  

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@8"></script>
<script src="./js/epcart_count.js"></script>
<script type="text/javascript">

//total in cart
$(document).ready(function()
{

	var totalCart = 0;

	$( ".total" ).each(function( index ) {
  	totalCart += parseFloat($( this ).text());
	});

	console.log(totalCart);

	function isFloat(x) { 
    return !!(x % 1); 
}

if(isFloat(totalCart)){
    var totalCartR = totalCart.toFixed(2);
}else{
    var totalCartR = totalCart += '.00';
}

$("#TotalCart").text(totalCartR);

});

// Display Cart Count
var username  = $('#staff_username').val();
getCartCount(username);

// Insert order Data
    $(function(){
    $('#placeorder').click(function(e){

      var valid = this.form.checkValidity();

      if(valid){

      var username 			= $('#staff_username').val();

      var hidden_name = $("input[name='hidden_name[]']")
              .map(function(){return $(this).val();}).get();

	  var hidden_price = $("input[name='hidden_price[]']")
              .map(function(){return $(this).val();}).get();

	  var hidden_quantity = $("input[name='hidden_quantity[]']")
              .map(function(){return $(this).val();}).get();

	  var hidden_total = $("input[name='hidden_total[]']")
              .map(function(){return $(this).val();}).get();

        e.preventDefault(); 

        $.ajax({
          type: 'POST',
          url: 'epcheckout.php',
          data: {username: username, hidden_name: hidden_name, hidden_price: hidden_price, hidden_quantity: hidden_quantity, hidden_total: hidden_total},
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




?>
