<div class="form">
<h1>Logga In</h1>

<form action="<?php $_SERVER['PHP_SELF']?>" method="post" name="login">
<div class="form-group">
<input type="text" name="email" placeholder=" E-post" required="" value="<?php echo $email;?>" class="form-control">
</div>
<input type="password" name="pw" placeholder=" Lösenord" required="">



</form>
<p>Är du inte än registrerad? 
<a href="regeister.php">Registrera Här</a></p>


<div class="form-group">
	<br />
	<input type="submit" name="signup" value="Logga In" class="btn btn-primary">
    </div>
