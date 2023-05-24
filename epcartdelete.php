<?php 
include_once("config.php");

$id =$_GET['id'];

$sql = "delete from epcart where id = $id";

if(mysqli_query($con, $sql)){
	header('location: epcart.php');
}else{
	echo mysqli_error($con);
}

?>
