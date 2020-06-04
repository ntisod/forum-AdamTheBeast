<?php

session_start();
// Kontollerar att användaren har inte tillåtelse att komma till home.php utan inloggningen 
if(!isset($_SESSION['email'])){
	header("location:login.php?reason=Du har inte tillåtelse att komma in");
}

include("header.php");
?>

<!DOCTYPE html>
<html>
<head>
	<title>Adam hemsida</title>
	<style type="text/css">
		.main{
			height: 100vh;
			width: 100%;
			background:grey;
			color: black;
			display: flex;
			align-items: center;
			justify-content: center;
			font-size: 3.5em;
		}
	</style>
</head>
<body>
	<div class="main">
		Av: ADAM NASSER
	</div>
	

</body>
</html>
