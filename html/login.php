<html>
<head>
<div class="row">
		<div class="col-md-4 col-md-offset-4 well">
			<form role="form" action="<?php $_SERVER['PHP_SELF']?>" method="post" name="signupform">

            <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>Adam login</title>

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap-theme.min.css">
<script async="" src="https://www.google-analytics.com/analytics.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
<script type="text/javascript" src="script/ajax.js"></script>

<style>

	body {
		background-image: url("./background.jpg") !important;
		background-size: 100% 100% !important;
	}

</style>

</head>
<body>

<div class="form">
<h1>Logga In</h1>

<form action="" method="post" name="login">
<input type="text" name="username" placeholder=" E-post" required="">
<input type="password" name="password" placeholder=" Lösenord" required="">



</form>
<p>Är du inte än registrerad? 
<a href="regeister.php">Registrera Här</a></p>


<div class="form-group">
	<br />
	<input type="submit" name="signup" value="Logga In" class="btn btn-primary">
    </div>

</body>
</html>