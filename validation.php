<?php
require 'header.php';
include 'include/validationCode.php';
?>
	
	<div class="maindiv">
		<div class="form_div">
			<div class="title">
			<h2>Form Validation with PHP.</h2>
			</div>
			<form action="validation.php" method="post">
			<h2>Form</h2>
			<span class="error">* required field.</span>
			<br>Name:
			<input class="input" name="name" type="text" value="">
			<?php
				if(isset($nameError)){
			?>
			<span class="error">* <?php echo $nameError;?></span>
			<?php
			 }
			?>
			<br>
			E-mail:
			<input class="input" name="email" type="text" value="">
			<span class="error">* <?php echo $emailError;?></span>
			<br>
			Gender:
			<input class="radio" name="gender" type="radio" value="female">Female
			<input class="radio" name="gender" type="radio" value="male">Male
			<?php
				if(isset($genderError)){
			?>
			<span class="error">*<?php echo $genderError;?></span>
			<?php
			 }
			?>
			<br>
			Website:
			<input class="input" name="website" type="text" value="">
			<span class="error"><?php echo $websiteError;?></span>
			Comment:
			<textarea cols="40" name="comment" rows="5">
			</textarea>
			<input class="submit" name="submit" type="submit" value="Submit">
			</form>
			<?php
				if(isset($sucess)){
			?>
				<span> <?php echo $sucess;?> </span>
			<?php
			 }
			?>
		</div>
	</div>
<?php
require 'footer.php';
?>
