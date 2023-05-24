<?php
require_once('config.php');
?>
<?php

if(isset($_POST)){

	$name 		= $_POST['name'];
	$category 	= $_POST['category'];
	$price 		= $_POST['price'];

		$sql = "INSERT INTO menu (name, category, price) VALUES(?,?,?)";
		$stmtinsert = $db->prepare($sql);
		$result = $stmtinsert->execute([$name, $category, $price]);
		if($result){
			echo 'Successfully saved.';
		}else{
			echo 'There were erros while saving the data.';
		}
}else{
	echo 'No data';
}