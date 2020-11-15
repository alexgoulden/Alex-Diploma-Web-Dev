<?php
function doDB() {
	global $mysqli;
	//conn to database
	$mysqli = mysqli_connect("localhost", "root", "", "forum");

	//if fails, stop
	if (mysqli_connect_errno()) {
		printf("Connect failed: %s\n", mysqli_connect_error());
		exit();
	}
}
?>