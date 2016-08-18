<?php 
require_once('core_class.php');


class Registration extends Fb_chat_core {
	
	public $errors = array();
	public function __construct() {
		$this->connect();
	}
	
	public function register($username, $email, $password) {
		$safe_username = $this->sanitize($username);
		$safe_email = $this->sanitize($email);
		$sql = "INSERT INTO users(username, email, pass)  VALUES('{$safe_username}','{$safe_email}','{$password}')";
		$register = $this->connection->query($sql);
		$this->confirm_query($register);
		if($register && $this->connection->affected_rows > 0) {
			return $register;
		}
		else {
			return null;
		}
	}
	
	
	  public function change_user_status_to_online($id) {
        $sql = "UPDATE users SET status = 1 WHERE id = {$id}";
        $status_to_online = $this->connection->query($sql);
        $this->confirm_query($sql);
        if($status_to_online && $this->connection->affected_rows > 0) {
        	return $status_to_online;
        }
        else {
        	return null;
        }
	  }

	  public function change_user_status_to_offline($id) {
        $sql = "UPDATE users SET status = 0 WHERE id = {$id}";
        $status_to_online = $this->connection->query($sql);
        $this->confirm_query($sql);
        if($status_to_online && $this->connection->affected_rows > 0) {
        	return $status_to_online;
        }
        else {
        	return null;
        }
	  }
	  
	
	  function find_user_by_username($username) {
	  $safe_username = $this->sanitize($username);
	  $sql = "SELECT * FROM users WHERE  username = '{$safe_username}'";
	  $username_result = $this->connection->query($sql);
	  $this->confirm_query($username_result);
	  if($result_set =  $username_result->fetch_assoc()) {
		  return $result_set;
	  }
		  else {
			  return null;
		  }
	 
  }

      function find_all_users($own_id) {
	  $sql = "SELECT * FROM users WHERE id != {$own_id} ";
	  $result = $this->connection->query($sql);
	  $this->confirm_query($result);
	  if($result && $result->num_rows) {
		  return $result;
	  }
		  else {
			  return null;
		  }
	 
  }
	
	public function attempt_login($username) {
	    $auth_user = $this->find_user_by_username($username);
		if($auth_user) {
			return $auth_user;
		}
		else {
			return false;
		}
	}
	
   public function check_if_username_already_registered($username) {
    $sql = "SELECT * FROM users WHERE username = '{$username}'";
	$check_existing_username = $this->connection->query($sql);
	if(	$check_existing_username && $check_existing_username->num_rows) {
	  return $check_existing_username;
	}
    else {
        return null;
    }
}
	public function confirm_login(){
		if(!isset($_SESSION['username'])) {
			$this->redirect_to('login.php');
		}
	}


	//================*Form validation function*========================
    public function form_validation() {
    //Username validation
    $username = $_POST['username'];
	$email = $_POST['email']; 
	$password = $_POST['password']; 
	$passwordconf = $_POST['passwordconf']; 
	if ($username === '') :
	 $this->errors = '<div class="error">* username is  required</div>';
     $GLOBALS['username_error'] = $this->errors; 
	endif; // input field empty
	if (!preg_match("/^[a-zA-Z ]*$/",$username)) :
	 $this->errors = '<div class="error">* Only characters are allowed</div>';	
     $GLOBALS['username_only_char_err'] = $this->errors;
	endif; // Only characters
	 if (!empty($username) && strlen($username) < 4) :
	$this->errors = '<div class="error">Username should be minimum 4 characters long</div>';
	$GLOBALS['username_length_error'] = $this->errors;
	endif; // Username length error
	
	//Email validation
	if ($email === '') : 
	 $this->errors = '<div class="error">* email is  required</div>';
     $GLOBALS['email_error'] = $this->errors;
	endif; // input field empty
	if (!filter_var($email, FILTER_VALIDATE_EMAIL)) :
	 $this->errors = '<div class="error">* Email is not valid</div>';
     $GLOBALS['email_validation_err'] = $this->errors;
	endif; // input field empty

	//Password validation
		if ($password == ""):
	 $this->errors = '<div class="error">* Password is required.</div>';
	 $GLOBALS['pass_error'] = $this->errors;
	endif;
	if (strlen($password) <= 6):
	 $GLOBALS['passlength_error'] = '<div class="error">Sorry, the password must be at least six characters</div>';
	endif; //password not long enough
	if ($password !== $passwordconf) :
	   $this->errors = '<div class="error">Sorry, passwords must match</div>';
	   $GLOBALS['passconf_error'] = $this->errors;
	endif; //passwords don't match
   }
   //=========*Login form validation*=================
    public function login_form_validation(){
   	$username = $_POST['username'];
	$password = $_POST['password'];  
	if ($username === '') :
	 $this->errors = '<div class="error">* username is  required</div>';
     $GLOBALS['username_error'] = $this->errors; 
	endif; // input field empty
	if (!preg_match("/^[a-zA-Z ]*$/",$username)) :
	 $this->errors = '<div class="error">* Only characters are allowed</div>';	
     $GLOBALS['username_only_char_err'] = $this->errors;
	endif; // Only characters
	 if (!empty($username) && strlen($username) < 4) :
	$this->errors = '<div class="error">Username should be minimum 4 characters long</div>';
	$GLOBALS['username_length_error'] = $this->errors;
	endif; // Username length error
	//Password validation
		if ($password == ""):
	 $this->errors = '<div class="error">* Password is required.</div>';
	 $GLOBALS['pass_error'] = $this->errors;
	endif;
	
   }
}//Class end











?>