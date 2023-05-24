<?php
require_once('config.php');
?>
<?php

if(!empty($_POST)){

	$hidden_name 		= $_POST['hidden_name'];

	$hidden_price 		= $_POST['hidden_price'];

	$quantity 		= $_POST['quantity'];

	$username 		= $_POST['username'];

		$sql = "INSERT INTO epcart (name, price, quantity, username) VALUES(?,?,?,?)";
		$stmtinsert = $db->prepare($sql);
		$result = $stmtinsert->execute([$hidden_name, $hidden_price, $quantity, $username]);
		if($result){
			echo 'Successfully saved.';
		}else{
			echo 'There were erros while saving the data.';
		}
}elseif(isset($_GET)){

	$username = $_GET['username'];

	$sql = "SELECT count(*) FROM epcart WHERE username = ?"; 
	$stmt = $db->prepare($sql); 
	$stmt->execute([$username]); 
	$rowCount = $stmt->fetchColumn();
	echo $rowCount;

}else{
	echo 'No data';
}

?>