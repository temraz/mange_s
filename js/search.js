// JavaScript Document

jQuery(document).ready(function(){
	jQuery('#autosuggest').keyup(function(){
		
		var search_term =jQuery(this).attr('value');
		jQuery.post(base_url+'employee/select_lawyer' , {search_term : search_term } ,function(output){
			
			jQuery('.result').html(output);
			
		
			} );
			
			
		});
	
	});