<?php

$sname= "localhost";
$unmae= "job_board113";
$password = "wxyz12345";

$db_name = "testa_01";

$conn = mysqli_connect($sname, $unmae, $password, $db_name);

if (!$conn) {
	echo "Connection failed!";
}