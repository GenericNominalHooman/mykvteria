<?php
require_once('config.php');
?>
<?php

if(isset($_POST)){

	$studid 		= $_POST['studid'];
	$year 			= $_POST['year'];
	$prog 			= $_POST['prog'];
	$username		= $_POST['username'];
	$password 		= $_POST['password'];

		$sql = "INSERT INTO student (studid, year, prog, username, password ) VALUES(?,?,?,?,?)";
		$stmtinsert = $db->prepare($sql);
		$result = $stmtinsert->execute([$studid, $year, $prog, $username, $password]);
		if($result){
			echo 'Successfully saved.';
		}else{
			echo 'There were erros while saving the data.';
		}
}else{
	echo 'No data';
}