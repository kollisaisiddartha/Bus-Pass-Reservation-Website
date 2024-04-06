<?php

$host = "localhost";
$user = "root";
$password = "";
$database = "buspassms";

$con = mysqli_connect($host, $user, $password, $database);

if(!$con) {
	die("Database error!");
}
?>