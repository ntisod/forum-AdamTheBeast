<?php
include("database.php");
session_start();

// Kontrollera om man har en email i session, och i så fall skickas användaren till home.php
if(isset($_SESSION['email'])){
    header("Location:home.php?reason=Du är redan inloggad");
}

// Ifall man ändrar web adressen till en sida där man egentligen inte får, kommer en ruta att dyka upp för att säga det 
if(isset($_GET['reason'])){
    echo "<script>alert('".$_GET['reason']."')</script>";
}

// Om logga in knappen tryckes kommer koden under att köras
if(isset($_POST['login-submit'])){
    $email = $_POST['email'];
    $pass = $_POST['password'];
    
    // Kontrollerar databasen
    $conn_e = "SELECT * FROM users WHERE email='".$email."'";
	$rel_e = $conn->query($conn_e);

    // Ifall man inte fyller i E-post och lösenord kommer det uppstå ett error att man måste fylla in
    if(empty($email) || empty($pass) ){
        header("Location:login.php?error=DU MÅSTE FYLLA IN FÄLTET");
        exit();
    }
    // Kontrollerar om kontot är registrerat när man loggar in
    else if(!mysqli_num_rows($rel_e) > 0){
    header("Location:login.php?error=Registrera först");
    exit();
    }
    else{ // Kontrollerar om informationen stämmer 
        while ($row = mysqli_fetch_array($rel_e)) {
			$pass1 = password_verify($pass, $row['pass']);
			if($pass1){
				$_SESSION['name'] = $row['fullname'];
				$_SESSION['email'] = $email;
				header("Location:home.php?login=successfull&email=$email");
            }
            else{
				header("Location:login.php?error=Fel lösenord eller e-post"); // Annars blir det ett error "Fel lösenord eller e-pos" 
			exit();
			}	
        }
	}
	
}

?>
<!DOCTYPE html>
</html>
<head>
	<meta charset="utf-8">
    <title>Adam Logga in</title>
    <style type="text/css">
		.container{
    margin-top: 8%;
    }

    body {
		background-image: url("bg.jpg") !important;
        background-size: 100% !important;	        
    }
	</style>
    <link rel="stylesheet" type="text/css" href="css/register.css" />
    <!-- bootstrap csn stylen -->
    <link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" />
    <link rel="stylesheet" href="style.css">

    <header>
    <div class="container1">
    <div class="logo_container">
        </div>
      <nav>
        <ul>
          <li><a href="index.php">Hem</a></li>
          <li><a href="https://www.ntigymnasiet.se/sodertalje/kontakta-oss/">Kontakter</a></li>
          <li><a href="register.php">Skapa konto</a></li>
          <li><a href="login.php">Logga in</a></li>
        </ul>
      </nav>
    </div>

    </div>
    <div class="footer">
  <h1><a class="w3-bar-item white">Copyright © 2019-2020</a></h1>

  </header>

</head>
<body>
        <div class="container">
		<div class="row">	

        <div class="col-md-5 offset-md-4">	

                <form action="login.php" method="POST">
                
                <h2 class="text-center text-primary">Logga in</h2>
                <div class="form-group">
                    <p class="text-center text-danger">
                        <?php
                            if(isset($_GET['error'])){  // Visar den error man får på logga in formuläret
                                echo $_GET['error'];
                            }
                        ?>
                    </p> 
                </div>
                <div class="form-group">
                    <label for="email">E-post</label>
                    <input type="email" name="email" class="form-control" placeholder="Ange ditt e-post" />
                </div>
                <div class="form-group">
                    <label for="password">Lösenord</label>
                    <input type="password" name="password" class="form-control" placeholder="Ange ditt lösenord" />
                </div>
                <div class="form-group">
                
                        <input type="submit" name="login-submit" class="btn btn-block bg-primary" value="Logga in">

                </div>
                <div class="form-group text-center">
                    <p>Har du inte ett konto?
                        <a href="register.php">Registrera här</a> 
                    </p>
        
        </form>
</body>
</html>