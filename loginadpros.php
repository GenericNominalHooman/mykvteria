<?php

session_start();

if(isset($_POST['login']))
{
	extract($_POST);
	include 'config.php';
	$sql=mysqli_query($con, "SELECT * FROM admin where adminid='$adminid' and pass ='$pass'");
	$row =mysqli_fetch_array($sql);

	if(is_array($row)){

	$_SESSION['adminid'] = $row['adminid'];
	$_SESSION['pass'] = $row['pass'];

	header("Location: addashboard.php");
	}
	else
	{
		header("Location: admin.php");
	}

}