<?php 
include_once("config.php");

$id =$_GET['id'];

$sql = "delete from menu where id = $id";

if(mysqli_query($con, $sql)){
	header('location: menulist.php');
}else{
	echo mysqli_error($con);
}

?>
