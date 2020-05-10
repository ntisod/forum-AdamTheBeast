
<div class="form">
    <h1>Logga In</h1>

    <form action="" method="post" name="login">
        <div class="form-group">
            <input type="text" name="email" placeholder=" E-post" required="" value="<?php echo $email;?>"> <!--TL Titta på förändringarna på den här raden. Gör motsvarande för rad 11. Jag har också lagt till rad 8 och 9. Lägg till motsvarande kod efter rad 11.-->
            <span class="error">* <?php echo $emailErr;?></span>
			<span class="text-danger"></span>
        </div>
        <input type="password" name="pw" placeholder=" Lösenord" required="">

        <br />
        <input type="submit" name="signup" value="Logga In" class="btn btn-primary">
    </form>
    <p>Är du inte än registrerad? 
    <a href="regeister.php">Registrera här</a></p>
</div>

