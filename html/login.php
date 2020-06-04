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

                //TL Placera en if-sats här där du bara hämtar lösenord från databasen ifall inget error har uppstått. Dvs if(!$err){}
                //Hämta lösenord från databasen
                //Hämta inställningar
                require("../includes/settings.php");
                try{
                    
                    $db_password = get_db_value("users", "password", "email", "$email");
                    
                     echo('lösenord ' . $db_password);
                     
                    //Kontrollera om angivet lösenord stämmer med det i databasen
                    $verified = password_verify($pw, $db_password);

                    if($verified){
                        echo "Grattis, du är inloggad!";
                    } else{
                        echo "Fel lösenord, eller användarnamn.";
                        $err=true;
                    }

                    if(!$err){
                    $err = false;
                    }
                }
                catch(PDOException $e)
                {
                    echo $sql . "<br>" . $e->getMessage();
                }
                
                $conn = null;

  

            }

//TL Ta bort kommentarerna från följande rader.
/* 
            if($err){
                require ('../templates/loginform.php');
            } else{


               //Omskapa sessions-id
                session_regenerate_id();
                //Lägg till sessionsvariabel
                $_SESSION['user'] = $email;

                header("Location: test.php");
                
                //Visa välkomstmeddelande
                echo "<h1>Välkommen {$email}!</h1>\n";
                echo "<p>Du skapade kontot " . date("Y-m-d H:i:s") . "</p>";
            
            }*/
           
        }else{
            //Man kommer till sidan för första gången. Visa tomt formulär.
            require ('../templates/loginform.php');
        }

    ?>    
    <?php require '../templates/footer.php'; ?>

</body>
</html>

	