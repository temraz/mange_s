// JavaScript Document
jQuery(document).ready(function($){



setInterval(function(){get_activites();},1000);

	
	var agent_id=1;
	
		
			
		////////////////////////////////////////
		
		function get_activites(){
		
        
		$.post(base_url +"employee/count_activity",{agent_id : agent_id }, function(data2){
			
				$(".activity").html(data2);
			    $.post(base_url +"employee/select_count_messages",{agent_id : agent_id }, function(data){
               $(".mess").html(data);
			   var sum=data+data2;
			  $(".sum").html(sum);	
			 
			},"json");
			
			},"json");
			 
				
			
	
	
		}
		
		
		
		///////////////////////////////////////////
		get_activites();
		
	
		
		
		
	
		});
	
		