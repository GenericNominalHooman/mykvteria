<?php 

include_once("config.php");

	$id = $_GET['id'];
	$qry = "select * from menu where id = $id";
	$run = $con->query($qry);

	if($run -> num_rows >0){
		while($row = $run -> fetch_assoc()){

			$name=$row['name'];
			$category=$row['category'];
			$price=$row['price'];

		}
	}



?>

<!DOCTYPE html>
<html>
<head>
	<title>Edit Menu</title>

	<link rel="stylesheet" type="text/css" href="menuedit.css">
</head>
<body>

<div>
		<form method="post" class="box">
		<center>
		<a href="#"><img src = "img/Mykvteria.png" width="200px"></a>
    <h2>Edit Menu</h2>
    	</center>

    	<center>
		
				
          
              <label for="name">Menu Name:</label>
              <br>
              <br>
              <input type="text"  name="name" value="<?php echo $name; ?>" required><br><br>

              
              <label for="category">Category:</label>
              <br>
              <br>
              <select name="category" value="<?php echo $category; ?>" required>
                  <option value="Breakfast">Breakfast</option>
                  <option value="Lunch">Lunch</option>
                  <option value="Snack">Snack</option>
                  <option value="Drinks">Drinks</option>
            </select>

              <br><br>
              <label for="price">Price:</label>
              <br>
              <br>
              <input type="text"s name="price" value="<?php echo $price; ?>" required><br><br>
              <br>

              <input type="submit" value="SAVE" name="update">
         		<br>
        
					
					
				</center>
				<br>
			</form>


				</div>
			</div>
		</div>
</div>

</body>
</html>

<?php 

if(isset($_POST['update'])){

	$name 		= 	$_POST['name'];
	$category 	= 	$_POST['category'];
	$price 		= 	$_POST['price'];

	$qry = "update menu set name = '$name', category = '$category', price = '$price' where id=$id";

	if(mysqli_query($con, $qry)){

		header('location: menulist.php');
	}else{

		echo mysqli_error($con);
	}
}

?>
