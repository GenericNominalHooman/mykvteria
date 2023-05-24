<?php
require_once('config.php');
?>
<?php

if(isset($_POST)){

	$prof 			= $_POST['prof'];
	$staffid 		= $_POST['staffid'];
	$username		= $_POST['username'];
	$password 		= $_POST['password'];

		$sql = "INSERT INTO staff (prof, staffid, username, password ) VALUES(?,?,?,?)";
		$stmtinsert = $db->prepare($sql);
		$result = $stmtinsert->execute([$prof, $staffid, $username, $password]);
		if($result){
			echo 'Successfully saved.';
		}else{
			echo 'There were erros while saving the data.';
		}
}else{
	echo 'No data';
}