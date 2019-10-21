<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login</title>
</head>
<body>


    <h1>Logga in</h1>



   <form action="welcome.php" method = "post">
      Namn: <input type = "text" name="name">
   <p>E-mail: <input type = "mail" name="mail"><br /></p>
   <p>Lösenord: <input type = "password" name="lösenord"><br /></p>
   <input type = "submit">

   </form>

   <?php require '../templates/footer.php';?>

                 <div class="row">
                    <p>Är du en ny användare?</p> 
                    <a href="regeister.php">Registrera in här:</a>
		         </div>

</body>
</html>

