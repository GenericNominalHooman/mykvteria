<?php 
include_once("config.php");

$id =$_GET['id'];

$sql = "delete from stcart where id = $id";

if(mysqli_query($con, $sql)){
	header('location: stcart.php');
}else{
	echo mysqli_error($con);
}

?>
