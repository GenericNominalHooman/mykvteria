<!DOCTYPE html>
<html>
<head>
	<title>Give Feedback</title>
	<link rel = "stylesheet" type = "text/css" href = "custorders.css">

	<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
  <script src="https://cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js"></script>
  <script src="https://cdn.datatables.net/1.10.12/js/dataTables.bootstrap.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>

  <style type="text/css">
  	body{
  margin: 0;
  padding: 0;
  font-family: 'Candara';
  background: #D8D8D8;
}
  	.box{
  width: 380px;
  padding: 40px;
  position: absolute;
  top: 50%;
  left: 50%;
  transform: translate(-50%,-50%);
  background: #fff;
  text-align: center;
  border-radius: 25px;
  color: #919191;
}
textarea {
  width: 400px;
  height: 150px;
  padding: 12px 20px;
  box-sizing: border-box;
  border: 2px solid #192163;
  border-radius: 4px;
  background-color: #f8f8f8;
  font-size: 16px;
  font-family: 'Candara';
  resize: none;
}

	textarea:hover{

		width: 400px;
  height: 150px;
  padding: 12px 20px;
  box-sizing: border-box;
  border: 2px solid #192163;
  border-radius: 4px;
  background-color: #f8f8f8;
  font-size: 16px;
  font-family: 'Candara';
  resize: none;

	}
  </style>

</head>
<body>


<center>
  <br>
  <br>
  <a href="stdashboard.php"><img src = "img/Mykvteria.png" width="200px"></a>
	<h2>Order:</h2>
	<table>
		
	<tr>
		<th>No.</th>
		<th>Order ID</th>
		<th>Menu Name</th>
		<th>Price</th>
		<th>Quantity</th>
		<th>Total</th>
	</tr>

	<?php 

include_once("config.php");

$id = $_GET['id'];
$i 	= 1;

$query = "SELECT * FROM storderlist where order_id = $id;";
$result = $con->query($query);

if($result->num_rows>0){

	while($row = $result-> fetch_assoc()){


		$menuname 	= $row['menu_name'];
		$price  	= $row['price'];
		$quantity 	= $row['quantity'];
		$total  	= $row['total'];



?>

	<tr>
		<td><?php echo $i++; ?></td>
		<td><?php echo $id; ?></td>
		<td><?php echo $menuname; ?></td>
		<td><?php echo $price; ?></td>
		<td><?php echo $quantity; ?></td>
		<td class = "total"><?php echo $total; ?></td>
	</tr>

	 <?php

                  }
                }

                ?>

	</table>
	<br>
	<p>

				The total is RM

				<b id="TotalCart"></b>
<hr>
			</p>
			<style type="text/css">
				button{
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

				button:hover{
				background:#fff;
                color: #F78418;
                border: 2px solid #F78418;
				}
			</style>
<form method = "post">

  <?php

      $sql = "select * from storders where id = '$id' AND status = 'Order Completed'";

      $result = $con->query($sql);

      if($result->num_rows>0){
        while($row = $result->fetch_assoc()){

          $id = $row['id'];
          $feedback = $row['feedback'];

  ?>

	<label for="feedback">Your Feedback:</label>
              <br>
              <br>

              <textarea id="feedback" name="feedback"></textarea>
              <input type ="hidden" name="id" id ="id" value="<?php echo $id; ?>">
              <br><br>

              <input type="submit" value="Give Feedbacks" name ="insert" id="insert">
              <br><br><br><br>
              <?php

                  }
                }

                ?>
</center>
</form>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@8"></script>
<script src="./js/cart_count.js"></script>
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
</script>

<script type="text/javascript">
  $(function(){
    $('#insert').click(function(e){

      var valid = this.form.checkValidity();

      if(valid){

      var id        = $('#id').val();
      var feedback  = $('#feedback').val();
      

        e.preventDefault(); 

        $.ajax({
          type: 'POST',
          url: 'addfeedback.php',
          data: {id: id, feedback: feedback},
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
