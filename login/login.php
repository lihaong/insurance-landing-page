<!DOCTYPE html>
<?php
session_start();
// diganti sesuai
include '/Applications/XAMPP/xamppfiles/htdocs/projek/functions.php';

error_reporting(0);


if (isset($_POST['login'])) {
	if (login($_POST) > 0) {
	} else {
		echo mysqli_error($conn);
	}
}
?>

<html>

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Login Account</title>
	<link rel="icon" type="image/png" sizes="32x32" href="../images/logo.png" />
	<link rel="stylesheet" href="./style.css">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous" />
	<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.1/css/all.min.css" />

	<link rel="normal" href="http://localhost/projek/Normalize/Normalize.css" />
	<script src="../script.js"></script>

</head>

<body>

	<div class="content-body">
		<div class="form-wrapper">
			<form class="bg-white" method="POST">
				<h1 class="text-title">Login to your account</h1>
				<div class="field-group">
					<label class="label" for="txt-email">Email address</label>
					<input class="input" type="email" id="txt-email" name="email" placeholder="johndoe@gmail.com" required />
				</div>
				<div class="field-group">
					<label class="label" for="txt-password">Password</label>
					<input class="input" type="password" id="txt-password" name="pass" placeholder="Enter your password" required />
				</div>
				<div class="field-group">
					<i class="far fa-eye-slash" id="hide" onclick="myFunction()"></i>
					<i class="far fa-eye" id="show" onclick="myFunction()"></i>
				</div>
				<div class="field-group">
					<input class="btn-submit" type="submit" name="login" value="Log In" />
				</div>
			</form>
			<div class="bg-register">
				<a href="../register/register.php" class="link-register">Sign Up</a>
			</div>
		</div>
	</div>

</body>

</html>