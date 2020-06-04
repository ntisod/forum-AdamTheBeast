<?php
	session_start();
	session_destroy();
	header("Location:login.php?reason=Du har nu loggat ut");

?>