<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>Adam registrering</title>

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap-theme.min.css">
<script async="" src="https://www.google-analytics.com/analytics.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
<script type="text/javascript" src="script/ajax.js"></script>
</head>
<body class="">

<style>

	body {
		background-image: url("./background.jpg") !important;
		background-size: 100% 100% !important;
	}

</style>

<?php


 require '../templates/header.php';

	// define variables and set to empty values
	$firstnameErr = $lastnameErr = $emailErr = $genderErr = $passwordErr = $cpasswordErr = "";
	$firstname = $lastname = $email = $gender = $comment = $password = $cpassword = "";
	$err=false;

	if ($_SERVER["REQUEST_METHOD"] == "POST") {

		if (empty($_POST["firstname"])) {
			$firstnameErr = "Förnamn är obligatoriskt";
			$err=true;
		} else {
			$firstname = test_input($_POST["firstname"]);
			// check if name only contains letters and whitespace
			 if (!preg_match("/^[a-zA-Z ]*$/",$firstname)) {
				$firstnameErr = "Använd bara bokstäver och mellanslag";
				$err=true;
			 }
		}
		if (empty($_POST["lastname"])) {
			$lastnameErr = "Efternamn är obligatoriskt";
			$err=true;
		} else {
			$lastname = test_input($_POST["lastname"]);
		}

		if (empty($_POST["email"])) {
			$emailErr = "E-postadress är obligatoriskt";
			$err=true;
		} else {
			$email = test_input($_POST["email"]);

			if(test_if_email_exists($email)){
				$emailErr = "E-postadress finns redan registrerad";
				$err=true;
			}
		
		}
		if (empty($_POST["comment"])) {
			$comment = "";
		} else {
			$comment = test_input($_POST["comment"]);
		}
		if (empty($_POST["gender"])) {
			$genderErr = "Val av kön är obligatoriskt";
			$err=true;
		} else {
			$gender = test_input($_POST["gender"]);
		}

		//Kontroll av lösenord
		if (empty($_POST["password"])) {
			$passwordErr = "Lösenordet är obligatoriskt";
			$err=true;
		} else {
			$password = test_input($_POST["password"]);
		}
		if (empty($_POST["cpassword"])) {
			$cpasswordErr = "Lösenord bekräftelset är obligatoriskt";
			$err=true;
		} else {
			$cpassword = test_input($_POST["cpassword"]);
			//Kryptering av lösenord
			$hashed = password_hash($cpassword, PASSWORD_DEFAULT);
		}
		
		
		echo $hashed;
		/*
		$db_pw = "$2y$10$6zTMfg4P5ia3.JP4ka0JN.RpD/9RJ7vcKOHYaHw6Issbu/BE6Ry7q";
		$verified = password_verify($password, $db_pw);
		
		if($verified){
			echo "Grattis, du är inloggad!";
		} else{
			echo "Fel lösenord, eller användarnamn.";
		}				
*/

		echo $firstname . "<br>";
		echo $lastname . "<br>";
		echo $email . "<br>";
		
		echo $comment . "<br>";
		echo $gender . "<br>";

		if($err){
			//Visa formulär
			require("../templates/userdata.php");
		}else{
			//Spara uppgifter
			
			require '../Includes/Settings.php';

			try {
				$conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
				// set the PDO error mode to exception
				$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
				$sql = "INSERT INTO users (name, lastname, email, password)
				VALUES ('$firstname', '$lastname', '$email', '$hashed')";
				// use exec() because no results are returned
				$conn->exec($sql);
				echo "New record created successfully";
				}
			catch(PDOException $e)
				{
				echo $sql . "<br>" . $e->getMessage();
				}

			$conn = null;
			//Skapa sessions-variabel
			//Gå vidare till lämplig sida alt visa inloggningsmeddelande
			echo "Grattis!";
			

		}

	} else{
		require("../templates/userdata.php");
	}

	function test_input($data) {
		$data = trim($data);
		$data = stripslashes($data);
		$data = htmlspecialchars($data);
		return $data;
	}

	function test_if_email_exists($email):bool{
		//Hämta hemliga värden
		require("../Includes/Settings.php");
		
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
		}
	}



?>    


<?php require '../templates/footer.php'; ?>

</body>
</html>
