<?php
require_once('config.php');
?>
<?php

if(isset($_POST)){

	$status 		= $_POST['status'];

		$sql = "INSERT INTO storders (status) VALUES(?)";
		$stmtinsert = $db->prepare($sql);
		$result = $stmtinsert->execute([$status]);
		if($result){
			echo 'Successfully saved.';
		}else{
			echo 'There were erros while saving the data.';
		}
}else{
	echo 'No data';
}