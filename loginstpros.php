<?php

session_start();

if(isset($_POST['login']))
{
	extract($_POST);
	include 'config.php';
	$sql=mysqli_query($con, "SELECT * FROM student where username='$username' and password ='$password'");
	$row =mysqli_fetch_array($sql);

	if(is_array($row)){

	$_SESSION['studid'] = $row['studid'];
	$_SESSION['year'] = $row['year'];
	$_SESSION['prog'] = $row['prog'];
	$_SESSION['username'] = $row['username'];
	$_SESSION['password'] = $row['password'];

	header("Location: stdashboard.php");
	}
	else
	{
		
		header("Location: loginst.php");

	}

}