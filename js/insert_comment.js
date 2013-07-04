jQuery(document).ready(function(){
	
	jQuery('#insert_comment').click(function(){
		
var comment = jQuery('#comment_text').val();
var event_id = jQuery('#event_id').val(); 

if(comment != ''){
jQuery.post(base_url+"user/insert_comment" ,{ comment: comment , event_id:event_id }, function(data){
	if(data.status == 'ok'){
		
			jQuery('#comment_list').prepend( data.content ).fadeIn(1000);
			jQuery('#comment_text').val('');
			jQuery('#comment_count').html(data.comment_count);
			jQuery('html, body').stop().animate({scrollTop: jQuery("#comment_list").offset().top}, 2000);
		}
	
						
		},"json");
}else{
	jAlert("Empty Comment...");
	return false;
	}
});
		
});