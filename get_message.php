<?php require_once('core_class.php'); ?>
<?php require_once('registration_class.php'); ?>
<?php require_once('session.php'); ?>

 <?php 
		  $messages = new Fb_chat_core();
      $message_id = $_SESSION['message_id'];
      $user_id = $_SESSION['user_id'];
		  $message_set = $messages->getMessages($message_id, $user_id);
  
      ?>
<?php
 if(!empty($message_set)) {
	foreach($message_set as $message) : ?>
   
          <tr class="msg-row-container">
                <td>
                  <div class="msg-row">
                    <div class="avatar"><img src="assets/chat_avatar.png"></div>
                    <div class="message">
						<span class="user-label"><span style="color: #6D84B4;margin:4px 0;">
            <strong><?php echo ucfirst($message['username']);  ?></strong>
            </span><span class="msg-time"><?php echo $messages->format_dat_time($message['sent_on']); ?></span></span><br/><p class="font_size" id="msg_width"><?php echo $message['message']; ?></p>
                    </div>
                  </div>
                </td>
			</tr>
      <?php endforeach; ?>
          
            
     
             <?php  } else { ?>
             <span style="margin-left: 25px;">No messages!</span>
        <?php } ?>
       
  