<?php 

function dbconnect() {
	$connect = mysqli_connect(MYSQL_SERVER, MYSQL_USER, MYSQL_PASSWORD, MYSQL_DB) or die("Error: " . mysql_error($connect));

	if (!mysqli_set_charset($connect, 'utf8')) {
		printf("Error: " . mysqli_error($connect));
	}

	return $connect;
}

 ?>