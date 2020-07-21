<?php
	//error_reporting(0);
	$con = mysqli_connect("localhost","root","","kissane_portal");

	if (!$con) {
		echo "Database Connected";
		exit();
	}
?>