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

    <?php require '../templates/header.php'; ?>

    <?php
        // definiera och nollställ variabler
        $emailErr = $pwErr = "";
        $email = $pw = "";
        $err = false;

        //Kontrollera om man kommer till sidan för första gången
        //Om det här inträffar är det inte för första gången
        
        if ($_SERVER["REQUEST_METHOD"] == "POST") {

            
            //Kolla om epost är bra
            if (empty($_POST["email"])) {
                $emailErr = "Ange e-postadress!";
                $err=true;
            } else {
                $email = test_input($_POST["email"]);
                //Kolla om e-postadressen är unik i databasen
                if(!test_if_email_exists($email)){
                    $emailErr = "E-postadressen finns inte registrerad!";
                    $err=true;    
                }

                //Kolla om lösenordet är bra
                if (empty($_POST["pw"])) {
                    $pwErr = "Ange lösenord!";
                    $err=true;
                } else {
                    $pw = test_input($_POST["pw"]);
                }

                //Hämta lösenord från databasen
                //Hämta inställningar
                require("../Includes/Settings.php");
                try{
                    //Anslut till databasen. 
                    $conn = new PDO("mysql:host=$servername;dbname=$dbname;charset=utf8", $username, $password);
                    // set the PDO error mode to exception
                    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                        
                    //Skapa SQL-kommando
                    $sql = "SELECT password FROM users WHERE email='$email'  LIMIT 1";
                    $stmt = $conn->prepare($sql);
                    //Skicka frågan till databasen
                    $stmt->execute();
    
                    // Ta emot resultatet från databasen
                    $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);

                    $result = $stmt->fetch();
                                  
                    //Stäng anslutningen
                    $conn = null;

                    //Kontrollera om angivet lösenord stämmer med det i databasen
                    $verified = password_verify($pw, $result['password']);

                    if($verified){
                        echo "Grattis, du är inloggad!";
                    } else{
                        echo "Fel lösenord, eller användarnamn.";
                        $err=true;
                    }
                }
                catch(PDOException $e)
                {
                    echo $sql . "<br>" . $e->getMessage();
                }
                
                $conn = null;

            }
            echo "<h3>Sparade uppgifter:</h3>\n";
            echo $email . "<br>";
            echo $pw . "<br>";
    

/*               //Omskapa sessions-id
                session_regenerate_id();
                //Lägg till sessionsvariabel
                $_SESSION['user'] = $email;

                header("Location: test.php");
                
                //Visa välkomstmeddelande
                echo "<h1>Välkommen {$email}!</h1>\n";
                echo "<p>Du skapade kontot " . date("Y-m-d H:i:s") . "</p>";*/
            
           
        }else{
            //Man kommer till sidan för första gången. Visa tomt formulär.
            //require '../templates/loginform.php';
        }


        function test_input($data) {
            $data = trim($data);
            $data = stripslashes($data);
            $data = htmlspecialchars($data);
            return $data;
        }

        function test_if_email_exists($email):bool{
            //Hämta hemliga värden
            require("../includes/settings.php");
            
            //Testa om det går att ansluta till databasen
            try {
                //Skapa anslutningsobjekt
                $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
                $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                
                //Förbered SQL-kommando
                $sql = "SELECT email FROM users WHERE email='$email'  LIMIT 1";
                $stmt = $conn->prepare($sql);
                //Skicka frågan till databasen
                $stmt->execute();

                // Ta emot resultatet från databasen
                $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);

                $row1 = $stmt->fetch();
                //Stäng anslutningen
                $conn = null;

                if(empty($row1)){
                    return false;
                }
                else{
                    return true;
                }
            }
            catch(PDOException $e) {
                //Om något i anslutningen går fel
                echo "Error: " . $e->getMessage();
                return false;
            }
        }

    ?>    

    <?php require '../templates/footer.php'; ?>

</body>
</html>

	

<div class="form">
<h1>Logga In</h1>

<!--form action="" method="post" name="login">
<div class="form-group">
<input type="text" name="username" placeholder=" E-post" required="">
</div>
<input type="password" name="password" placeholder=" Lösenord" required="">



</form-->
<p>Är du inte än registrerad? 
<a href="regeister.php">Registrera Här</a></p>


<div class="form-group">
	<br />
	<input type="submit" name="signup" value="Logga In" class="btn btn-primary">
    </div>

</body>
</head>