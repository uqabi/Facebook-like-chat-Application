<?php

class Session {
  
   private $logged_in;
   public $user_id;

   public function __construct() {
   	  session_start();
   }
   public function is_logged_in() {
   	return $this->logged_in;
   }
   public function check_login() {
   	if(isset($_SESSION['user_id'])){
   		$this->user_id = $_SESSION['user_id'];
   		$this->logged_in = true;
   	}
   	public function login($user) {
   		if($user) {
   			$this->user_id = $_SESSION['user_id'] = $user->id;
   			$this->logged_in = true;
   		}
   	}
   } 


}
session_start();

       function message() {
	    if(isset($_SESSION["message"])){
        echo $_SESSION['message'];
		//clear message after use
		$_SESSION["message"] = null;
	}
	   }



	   ?>