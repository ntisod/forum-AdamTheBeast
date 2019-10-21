<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap-theme.min.css">
<script async="" src="https://www.google-analytics.com/analytics.js"></script><script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
<title>Adam registrering</title>
<script type="text/javascript" src="script/ajax.js"></script>
</head>
<body class="">
<div class="row">
		<div class="col-md-4 col-md-offset-4 well">
			<form role="form" action="/demo/login-and-registration-script-with-php-mysql/register.php" method="post" name="signupform">
				<fieldset>
					<legend>Personliga Uppgifter</legend>

					<div class="form-group">
						<label for="name">Namn:</label>
						<input type="text" name="name" placeholder="Ange namn" required="" value="" class="form-control">
						<span class="text-danger"></span>
                    </div>

                    <div class="form-group">
						<label for="name">Efternamn:</label>
						<input type="text" name="name" placeholder="Ange efter namn" required="" value="" class="form-control">
						<span class="text-danger"></span>
                    </div>
                    

					<div class="form-group">
						<label for="name">E-post:</label>
						<input type="text" name="email" placeholder="Skriv din E-post" required="" value="" class="form-control">
						<span class="text-danger"></span>
                    </div>
                    

                    <div class="form-group">
                        <label for="message">kommentar:</label>
                        <textarea name="message" class="form-control" id="message"></textarea>
                    </div>

                    <div class="form-group">
						<label for="website">Websajt:</label>
						<input type="text" name="website" placeholder="Skriv din Websajt" required="" value="" class="form-control">
						<span class="text-danger"></span>
                    </div>

					<div class="form-group">
						<label for="name">Lösenord:</label>
						<input type="password" name="password" placeholder="Lösenordet" required="" class="form-control">
						<span class="text-danger"></span>
                    </div>
                 

					<div class="form-group"> 
						<label for="name">Bekräfta lösenordet:</label>
						<input type="password" name="cpassword" placeholder="Bekräfta lösenordet" required="" class="form-control">
						<span class="text-danger"></span>
                    </div>
                    
                     <label for="gender">Kön:</label>
               <input type="radio" name="gender" 
                 <?php if (isset($gender) && $gender=="female") echo "checked";?>
                 value="female">Kvinna
             <input type="radio" name="gender"
                <?php if (isset($gender) && $gender=="male") echo "checked";?>
                value="male">Man
             <input type="radio" name="gender" 
                <?php if (isset($gender) && $gender=="other") echo "checked";?>
                value="other">Annat<span class="error">* 


					<div class="form-group">
					<br /><input type="submit" name="signup" value="Registrera dig" class="btn btn-primary">
                    </div>

                    <div class="row">
                    Har du redan registrerad? 
                    <p><a href="login.php">Logga in här:</a></p>
		</div>
	</div>


				</fieldset>
			</form>
			<span class="text-success"></span>
			<span class="text-danger"></span>
		</div>
	</div>



 </body>
 </html>