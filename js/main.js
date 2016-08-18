$(document).ready(function () {

    //Minimize
    $('.minimize').click(function () {
        $('.msg-wgt-body').hide();
	});

     //close
    $('.close').click(function () {
        $('.container').hide();
  });
   //Open
    $('.open').click(function () {
        $('.msg-wgt-body').show();
       
    });

});



function send_message(message) {
  $.ajax({
    url: 'send_message.php',
    method: 'post',
    data: {msg: message},
    success: function(data) {
      $('#chat_input').val('');
       get_messages();
      
        
    }
  });
}

/**
 * Get's the chat messages.
 */
function get_messages() {
  $.ajax({
    url: 'get_message.php',
    method: 'GET',
    success: function(data) {
      $('.msg-row').html(data);
      auto_scroll();
      }
  });
}

function boot_chat() {
  var chatArea = $('#chat_input');

  // Load the messages every 5 seconds
 // setInterval(get_messages(), 5000);
// setInterval(function(){get_messages()}, 20000);
  // Bind the keyboard event
  chatArea.bind('keydown', function(event) {
    // Check if enter is pressed without pressing the shiftKey
    if (event.keyCode === 13 && event.shiftKey === false) {
      var message = chatArea.val();
      // Check if the message is not empty
      if(message.length !== 0) {
        send_message(message);
        event.preventDefault();
      } else {
        alert('Please enter  a message to send!');
        $('#chat_input').val('');
      }
    }
  });
}


 //Auto scroll to bottom to most latest message
 
   function auto_scroll() {
     var output = $('#msg_body');
   var result = output.animate({scrollTop:output.prop("scrollHeight")},200);
 }



 //Auto load messages after 5 seconds
 $(document).ready(function(){
  setInterval(function(){
  $(".msg-row").load("get_message.php");
  }, 500);
  
  });

/* 
function auto_scroll() {
       output = $('#msg_body');
       output.scrollTop(
       output[0].scrollHeight - output.height()
       );
      }
  
 */


boot_chat();
auto_scroll();




