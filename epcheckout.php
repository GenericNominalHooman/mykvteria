<?php
require_once('config.php');
?>

<?php



	if(!empty($_POST)){

		$username		= $_POST['username'];

		$hidden_name		= $_POST['hidden_name'];
		$hidden_price		= $_POST['hidden_price'];
		$hidden_quantity		= $_POST['hidden_quantity'];
		$hidden_total		= $_POST['hidden_total'];


		$sql = "INSERT INTO eporders (username, status) VALUES (?, 'Pending')";

		$stmtinsert = $db->prepare($sql);
		$result = $stmtinsert->execute([$username]);

		$order_id = $db->lastInsertId();

		$sql = "INSERT INTO eporderlist (order_id, menu_name, price, quantity, total) VALUES (?,?,?,?,?)";

		$stmtinsert = $db->prepare($sql);

		for ($i = 0; $i < count($hidden_name); $i++) {

			$stmtinsert->execute([$order_id, $hidden_name[$i], $hidden_price[$i], $hidden_quantity[$i], $hidden_total[$i]]);
			mysqli_query($con, "delete from epcart where username = '$username'");
		}

		if($result){

			echo "Succesfully saved.";

		}else{

			echo 'There were errors while saving the data.';
		}


	}

?>