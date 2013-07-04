jQuery(document).ready(function(){

	//setInterval(function(){get_chat_messages();},1000);
//window.setTimeout(function() { });
	
	jQuery('.messagebox button').click(function(){
		enterMessage();
	});
	
	jQuery('.messagebox input').keypress(function(e){
		if(e.which == 13)
			enterMessage();
	});
	
	function enterMessage() {
		var msg = jQuery('.messagebox input').val();	
		if(to_id == ''){
			jQuery('#chatmessageinner').append('<p style="color:#F00"><strong>Error Message:</strong> You must select one contact from your contact list !!</p>', function(){
						jQuery('#chatmessageinner').animate({scrollTop: jQuery('#chatmessageinner').height()});
			});
			return false;
			}
		if(msg != '') {
			
			jQuery.post(base_url+"employee/ajax_add_chat_with_user" ,{ from_id : from_id , to_id : to_id , msg : msg , job_id : job_id}, function(data){

            jQuery('.messagebox input').val('');
			jQuery('.messagebox input').focus();
			jQuery('#chatmessageinner').animate({scrollTop: jQuery('#chatmessageinner').height()});
			
			
			
			});
			
			////////////////////////////////////////
		
	
			
						
			//window.setTimeout(  
			//	function() {  
					//this is just a sample reply when somebody send a message
			//		jQuery('#chatmessageinner').append('<p><strong>Joey Lacaba:</strong> This is an automated reply!!</p>', function(){
			//			jQuery(this).animate({scrollTop: jQuery(this).height()});
			//		});
			//	}, 1000);			
		}	
        }
	
	
		function get_chat_messages(){
		
        
		jQuery.post(base_url +"employee/ajax_get_chat_messages",{ from_id : from_id , to_id : to_id }, function(data){
			if(data.status == 'ok'){
				jQuery('#chatmessageinner').html(data.content);
				//jQuery('#chatAudio')[0].play();
				}else{
					//there was an error 
					jQuery('#chatmessageinner').html(data.content);
					}
			},"json");
	        }
			get_chat_messages();
			
		jQuery('.messagebox input').focus(function(){
			
			update();
			
			});	
			
			function update(){
				jQuery.post(base_url+"employee/ajax_select_last_message" ,{ from_id : from_id , to_id : to_id }, function(data2){
				
				
				});
				}
	
});
