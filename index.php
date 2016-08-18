<?php require_once('core_class.php'); ?>
<?php require_once('registration_class.php'); ?>
<?php require_once('session.php'); 
$obj = new Registration();
$obj->confirm_login();
$own_id = $_SESSION['user_id'];
$users_set = $obj->find_all_users($own_id);
    
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <title>Fb like chat</title>
     <link href="assets/style/core.css" rel="stylesheet" type="text/css" />
   
   </head>

  <body style="background:#234C80;">

     <div class="status_wrapper">
     <div id="status_header">
    <p style="color:#fff;font-size:17px;font-family:Gill Sans MT;"> Welcome  <?php echo ucfirst($_SESSION['username']); ?> !</p><a href="logout.php" style="float:left;margin:4px 0 30px 0px;color:#c2c1c4;text-decoration:none">Sign Out</a>
     </div><!--status-header-->
        <div id="status_wrapper_body" class="flexcroll">
      <table id="status_table">
       <?php while($user = $users_set->fetch_assoc()) : ?>
        <tr>
          <td id="avatar_td"><a href="#"><img class="avatar" src="assets/chat_avatar.png"></a></td>
          <td id="username_td"><a href="index.php?username=<?php echo $user['username']; ?>&id=<?php echo $user['id']; ?>"><?php echo ucfirst($user['username']); ?></a></td>
          <td id="status_td"><?php if  ($user['status'] == 1) { echo " <div class=\"status_circle\"></div>"; } else { echo " <div class=\"status_circle\" id=\"status_offline\"></div>"; } ?></td>
          
        </tr>
      <?php endwhile; ?>
      </table>
      </div><!--wrapper-body-->
    </div><!--status-->
       
   
    <div style="margin: 0 0 0 130px; width: 700px;">
      <h1 style="color:#fff;margin-top:60px;font-family:Gill Sans MT;">WELCOME TO FB LIKE CHAT APP !</h1>  
       </div>
    <!--      Main content areea-->
   </div><!--main-content-->
    <?php if(isset($_GET['username'])) : $_SESSION['message_id'] = $_GET['id']; ?>
   <div class="container"  id="container">
	   <a href="#"></a>
      <span style="float:left;margin:10px 0 0 10px;color:#fff;text-decoration:none;font-weight:bold;"><?php echo ucfirst($_GET['username']); ?></span>
       <div class="msg-wgt-header">
		 <a href="delete.php"></a>  <a href="#"><div class="open"></div></a>
		   <div class="minimize"><strong><span style="color:#eaea16"><a href="#" >_</a></span></strong></div>
        <div class="close"><strong><span style="color:#eaea16"><a href="#" >X</a></span></strong></div>
       </div><!--msg-wgt-header-->
      
      <div class="msg-wgt-body" id="msg_body">
     
          <table>
           <tr class="msg-row-container">
                <td>
                  <div class="msg-row">
                    <div class="avatar"><img src="assets/chat_avatar.png"></div>
                    <div class="message">
						          <span class="user-label">
                        <span style="color: #6D84B4;margin:4px 0;">
                        <strong></strong>
                        </span>
                        <span class="msg-time"></span>
                        </span><!--user-label-->
                        <br/>
                        <p class="font_size"></p>
                        
                    </div><!--msg-row-->
                      </div><!--msg-row--container-->
                  </td>
              
			        </tr><!--msg-row-->
             <span style="margin-left: 25px;"></span>
        </table>
        
        
              
        
   
       <form method="post">
        <textarea id="chat_input" rows="10" cols="20" name="msg"></textarea>
		 </form>
      
	   </div><!--msg-widget-body--->
      </div><!--container-->
      
     <?php endif; ?>
    
    <script type="text/javascript" src="js/jquery-1.11.0.min.js"></script>
    <script src="https://code.jquery.com/jquery-2.1.1.min.js" type="text/javascript"></script>
    <script type="text/javascript" src="js/main.js">
    </script>
	</body>
</html>