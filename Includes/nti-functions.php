<?php

function get_db_value($table, $column, $key, $key_value):string{
    //Hämta inställningar
    require("../includes/settings.php");
    try{
        //Anslut till databasen. 
        $conn = new PDO("mysql:host=$servername;dbname=$dbname;charset=utf8", $username, $db_password);
        // set the PDO error mode to exception
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            
        //Skapa SQL-kommando
        $sql = "SELECT {$column} FROM {$table} WHERE {$key}='{$key_value}'  LIMIT 1";
        $stmt = $conn->prepare($sql);
        //Skicka frågan till databasen
        $stmt->execute();

        // Ta emot resultatet från databasen
        $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);

        $result = $stmt->fetch();
                        
        //Stäng anslutningen
        $conn = null;

        return $result[$column];
    }
    catch(PDOException $e)
    {
        echo $sql . "<br>" . $e->getMessage();
    }
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
        $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $db_password);
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
