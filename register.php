<?php require_once('session.php'); ?>
<?php
if(isset($_POST['submit'])) {
	require_once('registration_class.php');
	$register_now = new Registration();
	$username = $_POST['username'];
	$email = $_POST['email'];
	$password = $_POST['password'];
	$register_now->form_validation();
	if(empty($register_now->errors)) {
	if($register_now->check_if_username_already_registered($username)){
		$_SESSION['message'] = "<div class=\"message_danger\">Oops! " ."'".$username."'"." is already taken, choose another one.</div>";
	}
	else {
	$registeration_success = $register_now->register($username, $email, $password);
		
	if($registeration_success) {
	$_SESSION['message'] = "<div class=\"message_success\">Successfully registered. Thanks</div>";

	}
	else {
	$_SESSION['message'] = "<div class=\"message_danger\">Oops! Registration failed</div>";

	}
	}
}
	
}


?>



<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8" />
	<title>Fb like chat:sign up</title>
	<link rel="stylesheet" href="normalize.css" />
	<link rel="stylesheet" href="mystyle.css" />
	<script src="http://code.jquery.com/jquery-1.9.1.min.js"></script>
	<link href="assets/style/form_styles.css" rel="stylesheet" type="text/css" />
</head>
<body>

<div class="container">
<?php echo message(); ?>
    <h2>SIGN UP</h2>
	<form method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>">
		<strong>Username:</strong>
		<input type="text" name="username" id="myname" title="Please enter your name" placeholder ="Username" autofocus  value="<?php if (isset($username)) { echo $username; } ?>" />
				<?php  if (isset($GLOBALS['username_error'])) { echo $GLOBALS['username_error']; } ?>
				<?php if (isset($GLOBALS['username_length_error']) && !isset($GLOBALS['username_only_char_err'])) {  echo $GLOBALS['username_length_error']; } ?>
				<?php if (isset($GLOBALS['username_only_char_err'])) { echo $GLOBALS['username_only_char_err']; } ?>
		<br>
		<br>
		<strong> Email:</strong>
		<input type="text" name="email" id="myname" title="Please enter your email" autofocus placeholder="Email" value="<?php if (isset($email)) { echo $email; } ?>" />
				<?php  if (isset($GLOBALS['email_error'])) { echo $GLOBALS['email_error']; } ?>
				<?php  if (isset($GLOBALS['email_validation_err']) && empty($GLOBALS['email_error'])) { echo $GLOBALS['email_validation_err']; } ?>
		<br>
		<br>
		<strong>Password:</strong>
		<input type="password" name="password" id="mypassword" value="<?php if (isset($mypassword)) { echo $mypassword; } ?>" />
				<?php if (isset($GLOBALS['passlength_error']) && !isset($GLOBALS['pass_error'])) { echo $GLOBALS['passlength_error']; } ?>
				<?php if (isset($GLOBALS['pass_error'])) { echo $GLOBALS['pass_error']; } ?>
		
        <br>
		<br>
		<strong>Confirm Password:</strong>
				<input type="password" name="passwordconf" id="mypasswordconf" value="<?php if (isset($passwordconf)) { echo $passwordconf; } ?>" />
				<?php if (isset($GLOBALS['passconf_error'])) { echo $GLOBALS['passconf_error']; } ?>
		<input type="submit" name="submit" value="submit">
		 <p class="signup_signin" ="sign">Already member? <a href="login.php">Sign in now!</a></p>
	</form>
</div>
</body>
</html>