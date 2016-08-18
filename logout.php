<?php require_once('session.php');
      require_once('core_class.php');
      require_once('registration_class.php');
      $obj = new Registration();
      $id = $_SESSION['user_id'];
      $offline = $obj->change_user_status_to_offline($id);
      if($offline) {
      
     $_SESSION['user_id'] = null;
     $_SESSION['username'] = null;
   
     $logout = new FB_chat_core();
     $logout->redirect_to('login.php');
 }
?>