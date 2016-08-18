<?php require_once('session.php'); ?>
<?php
$message = "";
if(isset($_POST['submit'])) {
	require_once('registration_class.php');
	$username = $_POST['username'];
	$password = $_POST['password'];
	$login_now = new Registration();
	$login_now->login_form_validation();
	if(empty($login_now->errors)){
	$found_user = $login_now->attempt_login($username);
	if($found_user == true &&  $found_user['pass'] == $password) {
	   $id = $found_user['id'];  
	   $login_now->change_user_status_to_online($id);
       $_SESSION['user_id'] =  $found_user['id'];
	   $_SESSION['username'] = $found_user['username'];
	   $login_now->redirect_to('index.php');
	}
	else {
       $_SESSION['message'] = "<div class=\"message_danger\">Username/Password is incorrect</div>";	

}
}
}
?>



<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8" />
	<title>Fb like chat:sign in</title>
	<link rel="stylesheet" href="normalize.css" />
	<link rel="stylesheet" href="mystyle.css" />
	<script src="http://code.jquery.com/jquery-1.9.1.min.js"></script>
	<link href="assets/style/form_styles.css" rel="stylesheet" type="text/css" />
</head>
<body>

<div class="container" id="login_container">
<?php echo message(); ?>
    <h2>SIGN IN</h2>
	<form method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>">
		<strong>Username:</strong>
		<input type="text" name="username" id="myname" title="Please enter your name" placeholder ="Username" autofocus  value="<?php if (isset($username)) { echo $username; } ?>" />
				<?php  if (isset($GLOBALS['username_error'])) { echo $GLOBALS['username_error']; } ?>
				<?php if (isset($GLOBALS['username_length_error']) && !isset($GLOBALS['username_only_char_err'])) {  echo $GLOBALS['username_length_error']; } ?>
				<?php if (isset($GLOBALS['username_only_char_err'])) { echo $GLOBALS['username_only_char_err']; } ?>
		<br>
		<br>
		<strong>Password:</strong>
		<input type="password" name="password" id="mypassword" value="<?php if (isset($mypassword)) { echo $mypassword; } ?>" />
				
				<?php if (isset($GLOBALS['pass_error'])) { echo $GLOBALS['pass_error']; } ?>
		
        <input type="submit" name="submit" value="Sign In">
        <p class="signup_signin">Not a member? <a href="register.php">Sign up now!</a></p>
	</form>
</div>
</body>
</html>