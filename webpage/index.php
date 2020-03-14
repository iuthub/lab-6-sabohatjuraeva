<?php 

	session_start();

	$isPost = $_SERVER["REQUEST_METHOD"]=="POST";
	$isValid = TRUE;

	$name = isset($_SESSION["name"])?$_SESSION["name"]:"";
	$email = isset($_SESSION["email"])?$_SESSION["email"]:"";
	$username = isset($_SESSION["username"])?$_SESSION["username"]:"";
	$password = isset($_SESSION["password"])?$_SESSION["password"]:"";
	$dob = isset($_SESSION["dob"])?$_SESSION["dob"]:"";
	$gender = isset($_SESSION["gender"])?$_SESSION["gender"]:"";
	$address = isset($_SESSION["address"])?$_SESSION["address"]:"";	
	$city = isset($_SESSION["city"])?$_SESSION["city"]:"";	
	$pc = isset($_SESSION["pc"])?$_SESSION["pc"]:"";
	$hp = isset($_SESSION["hp"])?$_SESSION["hp"]:"";
	$mp = isset($_SESSION["mp"])?$_SESSION["mp"]:"";
	$cc = isset($_SESSION["cc"])?$_SESSION["cc"]:"";
	$cced = isset($_SESSION["cced"])?$_SESSION["cced"]:"";
	$ms = isset($_SESSION["ms"])?$_SESSION["ms"]:"";
	$wsu = isset($_SESSION["wsu"])?$_SESSION["wsu"]:"";
	$gpa = isset($_SESSION["gpa"])?$_SESSION["gpa"]:"";		

	$namePattern = "/^\D{2,}$/";
	$emailPattern = "/^\b[A-Za-z0-9._%+-]+@[A-Za-z0-9.-]+\.[A-Za-z]{2,}\b$/";
	$usernamePattern = "/^\w{5,}$/";
	$passwordPattern = "/^\w{8,}$/";
	$pcPattern = "/^[0-9]{6}$/";
	$hpPattern = "/^[0-9]{2}\s?\d{7}$/";
	$mpPattern = "/^[0-9]{2}\s?\d{7}$/";
	$ccPattern = "/^([0-9]{4}\s){3}\d{4}$/";
	$msPattern = "/^UZS [1-9][0-9]{0,2}(,[0-9]{3})*\.[0-9]{2}$/";
	$gpaPattern = "/^[0-4]{1}\.((5){1}|[0-4]{1}[0-9]{1})$/";		

	if ($isPost) 
	{
	 	$name = $_REQUEST["name"];
	 	$email = $_REQUEST["email"];
	 	$username = $_REQUEST["username"];
	 	$password = $_REQUEST["password"];
	 	$dob = $_REQUEST["dob"];
	 	$gender = $_REQUEST["gender"];
	 	$address = $_REQUEST["address"];	
	 	$city = $_REQUEST["city"]; 	
	 	$pc = $_REQUEST["pc"];
	 	$hp = $_REQUEST["hp"];
	 	$mp = $_REQUEST["mp"];
	 	$cc = $_REQUEST["cc"];
	 	$cced = $_REQUEST["cced"];
	 	$ms = $_REQUEST["ms"];
	 	$wsu = $_REQUEST["wsu"];
	 	$gpa = $_REQUEST["gpa"];

	 	$_SESSION["name"] = $name;
	 	$_SESSION["email"] = $email;
	 	$_SESSION["username"] = $username;
	 	$_SESSION["password"] = $password;
	 	$_SESSION["dob"] = $dob;
	 	$_SESSION["gender"] = $gender;
	 	$_SESSION["address"] = $address;
	 	$_SESSION["city"] = $city;
	 	$_SESSION["pc"] = $pc;
	 	$_SESSION["hp"] = $hp;
	 	$_SESSION["mp"] = $mp;
	 	$_SESSION["cc"] = $cc;
	 	$_SESSION["cced"] = $cced;
	 	$_SESSION["ms"] = $ms;
	 	$_SESSION["wsu"] = $wsu;
	 	$_SESSION["gpa"] = $gpa;
	} 
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<title>Validating Forms</title>
		<link href="style.css" type="text/css" rel="stylesheet" />
	</head>	
	<body>
		<h1>Registration Form</h1>

		<p>
			This form validates user input and then displays "Thank You" page.
		</p>
		
		<hr />
		
		<h2>Please, fill below fields correctly</h2>
		<form action="index.php" method="post" enctype ="multipart/form data">
		<dl>
			<dt>Name</dt>
			<dd> <input type="text" name="name" value="<?= $name ?>" /></dd>
			<?php if ($isPost && !preg_match($namePattern, $name)) 
			{
				$isValid = FALSE;
			?>
			<span class="error">Please, enter name with at least 2 chars and without numbers</span>
			<?php } ?>
			<dt>Email</dt>
			<dd> <input type="text" name="email" value="<?= $email ?>" /></dd>			
			<?php if ($isPost && !preg_match($emailPattern, $email)) 
			{
				$isValid = FALSE;
			?>
			<span class="error">Please, enter correct email address</span>
			<?php } ?>
			<dt>Username</dt>
			<dd><input type="text" name="username" value="<?= $username ?>" /></dd>
			<?php if ($isPost && !preg_match($usernamePattern, $username)) 
			{
				$isValid = FALSE;
			?>
			<span class="error">Please, enter username with at least 5 chars</span>
			<?php } ?>			
			<dt>Password</dt>
			<dd><input type="password" name="password" value="<?= $password ?>" /></dd>
			<?php if ($isPost && !preg_match($passwordPattern, $password)) 
			{
				$isValid = FALSE;
			?>
			<span class="error">Please, enter password with at least 8 chars</span>
			<?php } ?>
			<dt>Confirm Password</dt>
			<dd><input type="password" name="password" value="<?= $password ?>" /></dd>
			<?php if ($isPost && !preg_match($passwordPattern, $password)) 
			{
				$isValid = FALSE;
			?>
			<span class="error">Please, enter correct pasword</span>
			<?php } ?>
			<dt>Date of Birth</dt>
			<dd><input type="date" name="dob" value="<?= $dob ?>" /></dd>
			<?php if ($isPost && empty($_POST["dob"])) 
			{
				$isValid = FALSE;
			?>
			<span class="error">Please, enter correct date of birth</span>
			<?php } ?>
			<dt>Gender</dt>
			<dd>
				<input type="radio" name="gender" value="Male" required /> Male
				<input type="radio" name="gender" value="Female" /> Female
			</dd>
			<?php if ($isPost && empty($_POST["gender"])) 
			{
				$isValid = FALSE;
			?>
			<span class="error">Please, choose 1 option</span>
			<?php } ?>
			<dt>Marital status</dt>
			<dd>
				<input type="radio" name="ms" value="Single" required /> Single
				<input type="radio" name="ms" value="Married" /> Married			
				<input type="radio" name="ms" value="Divorced" /> Divorced
				<input type="radio" name="ms" value="Widowed" /> Widowed	
			</dd>
			<?php if ($isPost && empty($_POST["ms"])) 
			{
				$isValid = FALSE;
			?>
			<span class="error">Please, choose 1 option</span>
			<?php } ?>
			<dt>Address</dt>
			<dd><input type="text" name="address" value="<?= $address ?>"/></dd>
			<?php if ($isPost && empty($_POST["address"])) 
			{
				$isValid = FALSE;
			?>
			<span class="error">Please, enter correct address</span>
			<?php } ?>
			<dt>City</dt>
			<dd><input type="text" name="city" value="<?= $city ?>" /></dd>
			<?php if ($isPost && empty($_POST["city"])) 
			{
				$isValid = FALSE;
			?>
			<span class="error">Please, enter correct city name</span>
			<?php } ?>
			<dt>Postal Code</dt>
			<dd><input type="number" name="pc" value="<?= $pc ?>" /></dd>
			<?php if ($isPost && !preg_match($pcPattern, $pc)) 
			{
				$isValid = FALSE;
			?>
			<span class="error">Please, enter postal code with 6 digits</span>
			<?php } ?>
			<dt>Home Phone</dt>
			<dd><input type="tel" name="hp" value="<?= $hp ?>" /></dd>
			<?php if ($isPost && !preg_match($hpPattern, $hp)) 
			{
				$isValid = FALSE;
			?>
			<span class="error">Please, enter home phone with 9 numbers</span>
			<?php } ?>
			<dt>Mobile Phone</dt>
			<dd><input type="tel" name="mp" value="<?= $mp ?>" /></dd>
			<?php if ($isPost && !preg_match($mpPattern, $mp)) 
			{
				$isValid = FALSE;
			?>
			<span class="error">Please, enter mobile phone with 9 numbers</span>
			<?php } ?>
			<dt>Credit Card Number</dt>
			<dd><input type="text" name="cc" value="<?= $cc ?>" /></dd>
			<?php if ($isPost && !preg_match($ccPattern, $cc)) 
			{
				$isValid = FALSE;
			?>
			<span class="error">Please, enter credit card number with 16 numbers</span>
			<?php } ?>
			<dt>Credit Card Expiry Date</dt>
			<dd><input type="date" name="cced" value="<?= $cced ?>" /></dd>
			<?php if ($isPost && empty($_POST["cced"]))
			{
				$isValid = FALSE;
			?>
			<span class="error">Please, enter correct credit card expity date</span>
			<?php } ?>
			<dt>Monthly Salary</dt>
			<dd><input type="text" name="ms" value="<?= $ms ?>" /></dd>
			<?php if ($isPost && !preg_match($msPattern, $ms)) 
			{
				$isValid = FALSE;
			?>
			<span class="error">Please, enter correct monthly salary</span>
			<?php } ?>
			<dt>Web Site Url</dt>
			<dd><input type="url" name="wsu" value="<?= $wsu ?>" /></dd>
			<?php if ($isPost && empty($_POST["wsu"]))
			{
				$isValid = FALSE;
			?>
			<span class="error">Please, enter correct web site url</span>
			<?php } ?>
			<dt>Overall GPA</dt>
			<dd><input type="text" name="gpa" value="<?= $gpa ?>" /></dd>
			<?php if ($isPost && !preg_match($gpaPattern, $gpa)) 
			{
				$isValid = FALSE;
			?>
			<span class="error">Please, enter correct GPA</span>
			<?php } ?>
		</dl>		
		<div>
			<input type="submit" value="Register" />
		</div>
		</form>
		<?php if ($isPost && $isValid) {
			header("Location: thank_you.php", TRUE, 301);
		} ?>
	</body>
</html>