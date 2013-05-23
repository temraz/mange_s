// JavaScript Document
jQuery(document).ready(function($){



setInterval(function(){get_chat_messages();},1000);

	
	var agent_id=1;
	
		
			
		////////////////////////////////////////
		
		function get_chat_messages(){
		
        
		$.post(base_url +"employee/count_activity",{agent_id : agent_id }, function(data){
			
				$(".sum").html(data);
				$('#chatAudio')[0].play();
				
			},"json");
			
			
	
	
		}
		
		/////////////////////////////////////////////
		
		///////////////////////////////////////////////
		
		
		
		///////////////////////////////////////////
		get_chat_messages();
		
	
		
		
		
	
		});
	
		