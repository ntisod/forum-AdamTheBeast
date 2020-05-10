<div class="row">
		<div class="col-md-4 col-md-offset-4 well">
			<form role="form" action="<?php $_SERVER['PHP_SELF']?>" method="post" name="signupform">
				<fieldset>
					<legend>Personliga Uppgifter</legend>

					<div class="form-group">
						<label for="firstname">Namn:</label>
						<input type="text" name="firstname" placeholder="Ange namn" required="" value="<?php echo $firstname;?>" class="form-control">
						<span class="error">* <?php echo $firstnameErr;?></span>
						<span class="text-danger"></span>
                    </div>

                    <div class="form-group">
						<label for="lastname">Efternamn:</label>
						<input type="text" name="lastname" placeholder="Ange efter namn" required="" value="<?php echo $lastname;?>" class="form-control">
						<span class="error">* <?php echo $lastnameErr;?></span>
						<span class="text-danger"></span>
                    </div>
                    

					<div class="form-group">
						<label for="email">E-post:</label>
						<input type="text" name="email" placeholder="Skriv din E-post" required="" value="<?php echo $email;?>" class="form-control">
						<span class="error">* <?php echo $emailErr;?></span>
						<span class="text-danger"></span>
                    </div>
                    

                    <div class="form-group">
                        <label for="comment">kommentar:</label>
						<textarea name="comment" class="form-control" id="message"></textarea>
                    </div>

					<div class="form-group">
						<label for="password">Lösenord:</label>
						<input type="password" name="password" placeholder="Lösenordet" required="" class="form-control">
						<span class="error">* <?php echo $passwordErr;?></span>
						<span class="text-danger"></span>
                    </div>
                 

					<div class="form-group"> 
						<label for="cpassword">Bekräfta lösenordet:</label>
						<input type="password" name="cpassword" placeholder="Bekräfta lösenordet" required="" class="form-control">
						<span class="error">* <?php echo $cpasswordErr;?></span>
						<span class="text-danger"></span>
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
					<br />
					<input type="submit" name="signup" value="Registrera dig" class="btn btn-primary">
                    </div>

                    <div class="row">
                    Har du redan registrerad? 
                    <p><a href="login.php">Logga in här:</a></p>
					
		</div>
	</div>


				</fieldset>
			</form>
			<span class="text-success"></span>
			<span class="text-danger"></span>
		</div>
	</div>

