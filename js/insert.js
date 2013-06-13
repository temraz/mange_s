jQuery(document).ready(function(){

	
	jQuery('#report').click(function(){
		enterReport();
	});
	
	
	function enterReport() {
		var emp_id = jQuery('#emp_id').val();	
		var reason = jQuery('#wysiwyg2').val();
			
		if(reason == '' || emp_id == ''){
	jQuery('#report_validate').append(' <div class="notification msgerror"><a class="close"></a><p ><strong>Error Message:</strong> You must Enter all the fields !!</p></div>');
			
			
			}
		if(emp_id != '' && reason != '') {
			
			jQuery.post(base_url+"employee/ajax_insert_report" ,{ emp_id : emp_id , reason : reason }, function(data){
             
          if(data==='ok'){
			  jQuery('#success').append(' <div class="notification msgsuccess"><a class="close"></a><p >the employee has been reported successfully . !!</p></div>');
			  }else{
				   jQuery('#fail').append(' <div class="notification msgerror"><a class="close"></a><p >Error in send the report try again please. !!</p></div>');
				  }
			
			
			});
					
		}
			
        }
	
	
		
	
});
