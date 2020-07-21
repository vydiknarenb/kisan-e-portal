<?php
	session_start();

	// STORING THE SESSION VARIABLES
	if (!isset($_SESSION['username'])) {
	   echo "<script>location.href='login.php'</script>";
	}
?>