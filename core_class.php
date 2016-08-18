<?php 

 class Fb_chat_core {
	 public  $connection;
	 private $db_host = "localhost";
	 private $db_user = "fb_chat_uqabi";
	 private $db_pass = "shahsahab123";
	 private $db_name=  "fb_chat";

 

  //Creates connection to the database and stores it in $connection
  //Whenever and object of the class is instantiated constructer function will be automatically executed.
  public function __construct() {
	      $this->connect();
  }
  
  public function connect() {
	 $this->connection = new mysqli($this->db_host, $this->db_user, $this->db_pass, $this->db_name);
	 if(!$this->connection) {
		 die("Database connection failed:<br>" . mysqli_connect_error());
	 }
	 }
	
  //Sanitizes user inputs
 public function sanitize($input) {
	 $output = trim($input);
	 $output = stripslashes($input);
	 $output = htmlspecialchars($input);
	 $output = $this->connection->real_escape_string($input);
	 return $output;
 }

  
   public function getMessages($message_id, $user_id) {
	  $messages = array();
	  $sql = "SELECT * FROM chat  LEFT JOIN users ON user_id = id WHERE user_id = $user_id and message_id = $message_id or user_id = $message_id and message_id = $user_id ORDER BY chat_id ASC ";
	  $result = $this->connection->query($sql);
	  while($row = $result->fetch_assoc()) {
		  $messages[] = $row;
	  }
	  return $messages;	  
  }

  
  
  public function sendMessage($user_id, $message,$message_id) {
	  
	  $safe_message = $this->sanitize($message);
	  
	 $sql = "INSERT INTO chat(user_id, message, message_id, sent_on) VALUES($user_id, '{$safe_message}',
	 $message_id, NOW()) ";
	  
	  $result = $this->connection->query($sql);
	  $this->confirm_query($result);
	  if($result && $this->connection->affected_rows > 0) {
		  //Get the last inserted row id
		 return $result;
	  }
	  else {
		  return null;
	  }
        }
	 
	 //Redirects
  public function redirect_to($new_location) {
	 header("Location:" . $new_location);
	 exit;
 }
	 
     //Formats date and time
	 public function format_dat_time($date_time) {
		 return date('g:i a d/m/y',strtotime($date_time));
	 }
	 
	 public function clear_message_window($user_id) {
		 $sql = "DELETE FROM chat WHERE user_id = $user_id";
		 $deletion = $this->connection->query($sql);
		 $this->confirm_query($deletion);
		 if($deletion && $this->connection->affected_rows == 1) {
			 return $deletion;
		 }
		 else {
			 return null;
		 }
	 }
	 
    public function confirm_query($result) {
		if(!$result) {
			die("DB operation failed");
		}
	}
	 
	 
 }//end of the class
 


?>