<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>

<?php
    if ($_SERVER["REGUEST_METHOD"] == "POST"){

    }else{
    
    echo <<<html

            <form action="<?php $_SERVER
            ["PHP_SELF"];?>">
              <label for="user">ange ditt användere namn</label>
              <input type="text" name="user">
              <input type="submit" value="Logga in">
              </form>

   
HTML;
}

</body>
</html>



?>

