<?php
    if(isset($_GET['reason'])){
        echo "<script>alert('".$_GET['reason']."')</script>";
    }
?>

<!DOCTYPE html>
<html>
<head>
	<title>Konto</title>
	<link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" />
	<link rel="stylesheet" type="text/css" href="header.css" />
</head>
<body>
    <div class="container">
		<div class="row">
			<div class="col-md-12 navbar">
            <h2>NTI<span>Forum</span></h2>
                
            <nav>
            Vällkommen, <b><?php echo($_SESSION['name']);?></b> 
            <?php
            // Anger dem första bokstäverna på fullnamnet som användaren anger när man skapar konton
            $profileName = $_SESSION['name'];
            $words = explode(" ", $profileName);
            $firstwords = "";

            foreach ($words as $ws ) {
                $firstwords .=$ws[0];
            }
            
            echo "<a href='#' class='profiles'>".$firstwords."</a>";
            ?>
            <a href="logout.php">Logga ut</a>
            </nav>

        </div>
    </div>
</div>
</body>
</head>

