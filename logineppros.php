<?php

session_start();

if(isset($_POST['login']))
{
	extract($_POST);
	include 'config.php';
	$sql=mysqli_query($con, "SELECT * FROM staff where username='$username' and password ='$password'");
	$row =mysqli_fetch_array($sql);

	if(is_array($row)){

	$_SESSION['prof'] = $row['prof'];
	$_SESSION['staffid'] = $row['staffid'];
	$_SESSION['username'] = $row['username'];
	$_SESSION['password'] = $row['password'];

	header("Location: epdashboard.php");
	}
	else
	{
		
		header("Location: loginep.php");

	}

}