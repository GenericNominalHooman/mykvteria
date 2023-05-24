<!DOCTYPE html>
<html>
<head>
	<title>My Dashboard</title>
	<link rel = "stylesheet" type = "text/css" href = "stdashboardd.css">
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css"> 

	<script src="https://kit.fontawesome.com/b99e675b6e.js"></script>
  <script src="https://kit.fontawesome.com/c8bcf77590.js" crossorigin="anonymous"></script>
	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
	integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
	crossorigin="anonymous"></script>
	<script src="plugin.js"></script>


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
  <a class="active" href="stdashboard.php">Cafeteria</a>
  <a href="storderhistory.php">Order History</a>
  <a href="stfeedbacks.php">Feedbacks</a>

  	<div class="topnav-right">

  		<a href="stcart.php"><span><span class="badge badge-danger item_count" id="item_count">0</span>
  			<i class="fas fa-shopping-cart"></i></a>
  		<a href="stlogout.php"><i class="fas fa-power-off"></span></i></a>
	</div>

</div>

<input type="hidden" id="student_username" name="student_username" value="<?php echo $_SESSION["username"] ?>">

<div style="padding-left:16px">
</center>
	<center>
  <form method ="post">
		<!--breakfast table-->
  <h2>BreakFast</h2>
  
  
  <table>
                <tr>
        
                    <th>Menu</th>
                    <th>Price (RM)</th>
                    <th>Quantity</th>
                    <th>Actions</th>
        
                </tr>

                <?php   
                  $i = 0;
                  $sql = "SELECT * FROM menu where category ='breakfast';";
                  $stmt = $db->query($sql);
                  if ($stmt->rowCount() > 0){

                  while($row = $stmt->fetch(PDO::FETCH_ASSOC)){

                    $id = $row['id'];
                    $i++;
                  ?> 

                  <tr>

                    
                    <td id='name' name='name'><?php echo $row['name']  ?></td>
                    <input type="hidden" id="<?php echo 'breakfast_name_' . $i ?>" name="hidden_name[]" value="<?php echo $row['name']; ?>">

                    <td id='price' name='price'><?php echo $row['price']  ?></td>
                    <input type="hidden" id="<?php echo 'breakfast_price_' . $i ?>" name="hidden_price[]" value="<?php echo $row['price']; ?>">

                     <td color ='#fff'>

                     	<!-- quantity here -->
                        
                     	<input type="number" id="<?php echo 'breakfast_quantity_' . $i ?>" name="quantity[]" value="1" min="1">

                      
                    </td>

                    <td color ='#fff'>
                      
                    		<input class="btn btn-primary addtocart" type="submit"  id="<?php echo 'breakfast_id_' . $i ?>" name="add[]" value="Add To Cart">
                    	
                    </td>


                  </tr>

                  <?php

                  }
                }

                ?>
            
              </table>

         <!--Lunch Table-->

         <h2>Lunch</h2>
  
         <table>
                <tr>
        
                    <th>Menu</th>
                    <th>Price (RM)</th>
                    <th>Quantity</th>
                    <th>Actions</th>
        
                </tr>

                <?php   
                  $i = 0;
                  $sql = "SELECT * FROM menu where category ='lunch';";
                  $stmt = $db->query($sql);
                  if ($stmt->rowCount() > 0){

                  while($row = $stmt->fetch(PDO::FETCH_ASSOC)){

                    $id = $row['id'];
                    $i++;
                  ?> 

                  <tr>

                    
                    <td id='name' name='name'><?php echo $row['name']  ?></td>
                    <input type="hidden" id="<?php echo 'lunch_name_' . $i ?>" name="hidden_name[]" value="<?php echo $row['name']; ?>">

                    <td id='price' name='price'><?php echo $row['price']  ?></td>
                    <input type="hidden" id="<?php echo 'lunch_price_' . $i ?>" name="hidden_price[]" value="<?php echo $row['price']; ?>">

                     <td color ='#fff'>

                     	<!-- quantity here -->
                        
                     	<input type="number" id="<?php echo 'lunch_quantity_' . $i ?>" name="quantity[]" value="1" min="1">

                      
                    </td>

                    <td color ='#fff'>
                      
                    		<input class="btn btn-primary addtocart" type="submit"  id="<?php echo 'lunch_id_' . $i ?>" name="add[]" value="Add To Cart">
                    	
                    </td>


                  </tr>

                  <?php

                  }
                }

                ?>
            
              </table>

         <!--Snack Table-->


         <h2>Snacks</h2>
  
         <table>
                <tr>
        
                    <th>Menu</th>
                    <th>Price (RM)</th>
                    <th>Quantity</th>
                    <th>Actions</th>
        
                </tr>

                <?php   
                  $i = 0;
                  $sql = "SELECT * FROM menu where category ='snack';";
                  $stmt = $db->query($sql);
                  if ($stmt->rowCount() > 0){

                  while($row = $stmt->fetch(PDO::FETCH_ASSOC)){

                    $id = $row['id'];
                    $i++;
                  ?> 

                  <tr>

                    
                    <td id='name' name='name'><?php echo $row['name']  ?></td>
                    <input type="hidden" id="<?php echo 'snack_name_' . $i ?>" name="hidden_name[]" value="<?php echo $row['name']; ?>">

                    <td id='price' name='price'><?php echo $row['price']  ?></td>
                    <input type="hidden" id="<?php echo 'snack_price_' . $i ?>" name="hidden_price[]" value="<?php echo $row['price']; ?>">

                     <td color ='#fff'>

                     	<!-- quantity here -->
                        
                     	<input type="number" id="<?php echo 'snack_quantity_' . $i ?>" name="quantity[]" value="1" min="1">

                      
                    </td>

                    <td color ='#fff'>
                      
                    		<input class="btn btn-primary addtocart" type="submit"  id="<?php echo 'snack_id_' . $i ?>" name="add[]" value="Add To Cart">
                    	
                    </td>


                  </tr>

                  <?php

                  }
                }

                ?>
            
              </table>

        <!--Drinks Table-->

         <h2>Drinks</h2>
  
         <table>
                <tr>
        
                    <th>Menu</th>
                    <th>Price (RM)</th>
                    <th>Quantity</th>
                    <th>Actions</th>
        
                </tr>

                <?php   
                  $i = 0;
                  $sql = "SELECT * FROM menu where category ='drinks';";
                  $stmt = $db->query($sql);
                  if ($stmt->rowCount() > 0){

                  while($row = $stmt->fetch(PDO::FETCH_ASSOC)){

                    $id = $row['id'];
                    $i++;
                  ?> 

                  <tr>

                    
                    <td id='name' name='name'><?php echo $row['name']  ?></td>
                    
                    <input type="hidden" id="<?php echo 'drink_name_' . $i ?>" name="hidden_name[]" value="<?php echo $row['name']; ?>">

                    <td id='price' name='price'><?php echo $row['price']  ?></td>

                    <input type="hidden" id="<?php echo 'drink_price_' . $i ?>" name="hidden_price[]" value="<?php echo $row['price']; ?>">

                     <td color ='#fff'>

                     	<!-- quantity here -->
                        
                     	<input type="number" id="<?php echo 'drink_quantity_' . $i ?>" name="quantity[]" value="1" min="1">

                      
                    </td>

                    <td color ='#fff'>
                      
                    		<input class="btn btn-primary addtocart" type="submit"  id="<?php echo 'drink_id_' . $i ?>" name="add[]" value="Add To Cart">
                    	
                    </td>


                  </tr>

                  <?php

                  }
                }

                ?>
            
              </table>
         

              <br>
              <br>

</div>

</center>
</form>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@8"></script>
<script src="./js/cart_count.js"></script>
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
          url: 'staddcart.php',
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