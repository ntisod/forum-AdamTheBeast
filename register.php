<?php

    // Kopplar in registrering sidan med databasen    
    include("database.php"); 

    // När en session startar kommer PHP att ringa öppna och läsa session spara hanterare
    session_start();

    // Den kontrollerar om $ _SESSION ['email'] är lika med sant
	if(isset($_SESSION['email'])){
    header("Location:home.php?reason=Du är redan inloggad");
    // header funktionen skickar ett HTTP-header meddelande till webbläsaren. Medan location lär webbläsaren att ställa om den angivna URL-en
    }

    // Ifall man trycker skapa konto knappen så kommer koden under att aktiveras 
    if(isset($_POST["register-submit"])){
        $name = $_POST['name'];
        $username = $_POST['username'];
		$email = $_POST['email'];
		$pass = $_POST['password'];
        $pass2 = $_POST['confirmpass'];
        
        // Ifall man inte fyller i namn, användarnamn, E-post, lösenord och bekräfta lösenordet kommer det uppstå ett error att du måste fylla in
        if(empty($name) || empty($username) || empty($email) || empty($pass) || empty($pass2)){
			header("Location:register.php?error=DU MÅSTE FYLLA IN FÄLTET");
			exit(); 
        }

        // Kontrollerar om E-posten finns redan i databasen
        $conn_e = "SELECT * FROM users WHERE email='".$email."'";
        $rel_e = mysqli_query($conn,$conn_e);
		if(mysqli_num_rows($rel_e) > 0){
			header("Location:register.php?error=Denna E-post Existerar Redan"); // Om E-posten finns kommer det att uppstå ett error att den finns redan
			exit();
        }

        // Kontrollerar om lösenordet matchar
        if($pass != $pass2){
			header("Location:register.php?error=Lösenorden Matchar Inte");
			exit();
        }

        // Om lösenorden stämmer med varandra kommer den att krypteras 
        if($pass == $pass2){
			$pass_hash = password_hash($pass, PASSWORD_DEFAULT);
			$sql = "INSERT INTO users(fullname,username,email,pass) VALUES('".$name."','".$username."','".$email."','".$pass_hash."')";
			$row =mysqli_query($conn,$sql);
			if($row){ // När man är registrerad kommer användaren att loggas in på hemsidan
				$_SESSION['name'] = $name;
				$_SESSION['email'] = $email;
				header("Location:home.php?register=lyckades");
			}
			else{
				header("Location:register.php?error=ERROR"); // Annars blir det ett error
				exit();
			}
        }
    }
?>

<!DOCTYPE html>
</html>
<head>
	<meta charset="utf-8">
    <title>Adam Registrering</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <style>
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

      <nav>
        <ul>
          <li><a href="index.php">Hem</a></li>
          <li><a href="https://www.ntigymnasiet.se/sodertalje/kontakta-oss/">Kontakter</a></li>
          <li><a href="register.php">Skapa konto</a></li>
          <li><a href="login.php">Logga in</a></li>
        </ul>
      </nav>
    </div>

  </header>

</head>
<body>
        <div class="container">
				<div class="row">	

    <div class="col-md-5 offset-md-4">	

        <form action="register.php" method="POST">
        
        <h2 class="text-center text-primary">Registrering</h2>
        <div class="form-group">
            <p class="text-center text-danger">
                <?php
                    if(isset($_GET['error'])){  // Visar den error man får på registreringsformuläret
                        echo $_GET['error'];
                    }
                ?>
            </p> 
        </div>
            
        <div class="form-group">
            <label for="name">Fullständiga namn</label>
            <input type="text" name="name" class="form-control" placeholder="Ange ditt namn och efternamn" />
        </div>
        <div class="form-group">
            <label for="username">Användarnamn</label>
            <input type="text" name="username" class="form-control" placeholder="Ange ditt användarnamn" />
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
            <label for="confirmpass">Bekräfta Lösenordet</label>
            <input type="password" name="confirmpass" class="form-control" placeholder="Bekräfta ditt lösenord" />
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
        
                <input type="submit" name="register-submit" class="btn btn-block bg-primary" value="Skapa konto">

        </div>
        <div class="form-group text-center">
            <p>Har du redan ett konto?
                <a href="login.php">Logga in här</a>
            </p>

    </form>
</body>
</html>