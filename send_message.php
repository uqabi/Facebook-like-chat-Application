<?php require_once('session.php'); ?>
<?php require_once('registration_class.php'); ?>
<?php 
if(isset($_POST['msg'])) {
	require_once('core_class.php');
	$chat = new Fb_chat_core();
	$User_id = $_SESSION['user_id'];
	$Message = $chat->sanitize($_POST['msg']);
	$message_id = $_SESSION['message_id'];
	$result = $chat->sendMessage($User_id, $Message,$message_id);
	if($result && $chat->connection->affected_rows > 0) {
	$chat->redirect_to('index.php');
	}

else { 
	    echo "Oops! ther is an error";
		$chat->redirect_to('index.php');
}
}

?>