<?php require_once('core_class.php'); ?>
<?php require_once('registration_class.php'); ?>
<?php require_once('session.php'); ?>


<?php 

  $deletion = new Fb_chat_core();
  $deletion->clear_message_window($_SESSION['user_id']);
  $deletion->redirect_to('index.php');


?>