<?php 

$db_host = "localhost";
$db_user = "root";
$db_pass = "Kafin-12";
$db_name = "mykvteria";


$con= mysqli_connect($db_host, $db_user, $db_pass, $db_name);

$db = new PDO('mysql:host='.$db_host.';dbname=' . $db_name . ';charset=utf8', $db_user, $db_pass);

$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);