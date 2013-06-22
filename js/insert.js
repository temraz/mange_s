jQuery(document).ready(function(){

	jQuery('#forword_button').click(function(){
		insertForward();
	});
	
	jQuery('#report').click(function(){
		enterReport();
	});
	
	jQuery('#archive').click(function(){
		enterArchive();
	});
		jQuery('#archive_result').click(function(){
		archive_result();
	});
	
	jQuery('#result_button').click(function(){
		report_result();
	});

	jQuery('#forword_button_result').click(function(){
		forword_result();
	});
	jQuery('#discount').click(function(){
		discount_salary();
	});
	
	jQuery('#salary_option').change(function(){
		
		get_salary();
	});
	
	jQuery('#salary_button').click(function(){
		insert_salary();
	});
	
/////////////////////////////////////////////////////////////////////	
function insert_salary(){
	var salary = jQuery('#salary').val();	
	var emp_id = jQuery('#salary_option').val();
	if(salary == '' && emp_id == ''){
	jQuery('#report_validate').append(' <div class="notification msgerror"> <a class="close"></a> <p ><strong>Error Message:</strong> You must Enter the salary value and the employee !!</p></div>');
			
			}else{
				jQuery.post(base_url+"employee/ajax_insert_salary" ,{ salary: salary , emp_id : emp_id }, function(data){
             
          if(data==='ok'){
			 
			  jQuery.post(base_url+"employee/ajax_get_salary" ,{ emp_id : emp_id}, function(data2){
             
          if(data2.status === 'ok'){
            jQuery('#hide').append(' <div class="notification msgsuccess"> <a class="close"></a> <p>The salary after update is : '+data2.salary+' </p> </div>');
			  
			 
			  }else{
			       jQuery('back_salary').text('no salary');
				  }
			
			
			},"json");
			
			  }else{
				   jQuery('#fail').append(' <div class="notification msgerror"> <a class="close"></a><p > Error while saving the salary try again please. !!</p></div>');
				  }
			
			
			});
				}
	}

///////////////////////////////////////////////////////////////////////
function get_salary(){
	var emp_id = jQuery('#salary_option').val();	
	if(emp_id != '') {
			
			jQuery.post(base_url+"employee/ajax_get_salary" ,{ emp_id : emp_id}, function(data){
             
          if(data.status === 'ok'){
            jQuery('#hide').html(' <div class="notification msgsuccess"> <a class="close"></a> <p>The salary is : '+data.salary+' </p> </div>');
			  
			 
			  }else{
			       jQuery('back_salary').text('no salary');
				  }
			
			
			},"json");
					
		}
	
	}
////////////////////////////////////////////////////////////////////
	function enterReport() {
		var emp_id = jQuery('#emp_id').val();	
		var reason = jQuery('#wysiwyg2').val();
			
		if(reason == '' || emp_id == ''){
	jQuery('#report_validate').append(' <div class="notification msgerror"> <a class="close"></a> <p ><strong>Error Message:</strong> You must Enter all the fields !!</p></div>');
			
			
			}
		if(emp_id != '' && reason != '') {
			
			jQuery.post(base_url+"employee/ajax_insert_report" ,{ emp_id : emp_id , reason : reason }, function(data){
             
          if(data==='ok'){
			  jQuery('#success').append(' <div class="notification msgsuccess"> <a class="close"></a><p > the employee has been reported successfully . !!</p></div>');
			  }else{
				   jQuery('#fail').append(' <div class="notification msgerror"> <a class="close"></a><p > Error in send the report try again please. !!</p></div>');
				  }
			
			
			});
					
		}
			
        }
//////////////////////////////////////////////////////////////////////////////
function forword_result(){
	var for_id = jQuery('#for_emp').val();	
	var result_id=jQuery('#result_id').val();	
	if(for_id == '' ){
			
	jQuery('#report_validate').append(' <div class="notification msgerror"> <a class="close"></a> <p >You must choice an employee to be able to forward this report !!</p></div>');
			}
		if(for_id != '') {
			
			jQuery.post(base_url+"employee/ajax_forward_report_result" ,{ for_id : for_id , result_id : result_id }, function(data){
             
          if(data==='ok'){
			  jQuery('#success').append(' <div class="notification msgsuccess"> <a class="close"></a> <p >the report has been forward to the sub manager successfully . !!</p></div>');
			  }else{
				   jQuery('#fail').append(' <div class="notification msgerror"> <a class="close"></a> <p >Error while forwarding the report to the sub manager try again please. !!</p></div>');
				  }
			
			
			});
					
		
			
        }
	//////////////////////////////////////////
	
	
	}
//////////////////////////////////////////////////////////////////////////////
function discount_salary(){
	var report_id = jQuery('#report_id').val();
	var days = jQuery('#days').val();	
	
	if(report_id == '' || days == ''){
			
	jQuery('#report_validate').append(' <div class="notification msgerror"> <a class="close"></a> <p >You must enter the number fo discounted days !!</p></div>');
			
			
			}
		if(report_id != '' || days != '' ) {
			
			jQuery.post(base_url+"employee/ajax_discount_employee" ,{report_id : report_id , days : days}, function(data){
             
          if(data==='ok'){
			  jQuery('#success').append(' <div class="notification msgsuccess"> <a class="close"></a> <p >The employee discounted from his salary successfully. !!</p></div>');
			  }else{
				   jQuery('#fail').append(' <div class="notification msgerror"> <a class="close"></a> <p >Error : something wronge right now please try again later . !!</p></div>');
				  }
			
			
			});
					
		}
	
	}
////////////////////////////////////////////////////////////////////////////////
			function report_result() {
			
		var report_id = jQuery('#report_id').val();	
		var reason = jQuery('#reason').val();	
		
	
			
		if(report_id == '' || reason == ''){
			
	jQuery('#report_validate').append(' <div class="notification msgerror"> <a class="close"></a> <p >You must enter the result !!</p></div>');
			
			
			}
		if(report_id != ''|| reason != '') {
			
			jQuery.post(base_url+"employee/ajax_result_report" ,{report_id : report_id , reason : reason}, function(data){
             
          if(data==='ok'){
			  jQuery('#success').append(' <div class="notification msgsuccess"> <a class="close"></a> <p >the result has been sent to the financial sector. !!</p></div>');
			  }else{
				   jQuery('#fail').append(' <div class="notification msgerror"> <a class="close"></a> <p >Error while sendibg the result to the financial sector. !!</p></div>');
				  }
			
			
			});
					
		}
			
        }
/////////////////////////////////////////////////////////////////
		
		function archive_result() {
	
		var result_id=jQuery('#result_id').val();		
			
		if(result_id == '' ){
	jQuery('#report_validate').append(' <div class="notification msgerror"> <a class="close"></a> <p ><strong>Error Message:</strong> Report ID not found try again please !!</p></div>');
			
			
			}
		if(result_id != '') {
			
			jQuery.post(base_url+"employee/ajax_insert_archive_result" ,{ result_id : result_id }, function(data){
             
          if(data==='ok'){
			  jQuery('#success').append(' <div class="notification msgsuccess"> <a class="close"></a><p > The report has been archived successfully . !!</p></div>');
			  }else{
				   jQuery('#fail').append(' <div class="notification msgerror"> <a class="close"></a><p > Error while archiving the report try again please. !!</p></div>');
				  }
			
			
			});
					
		}
			
        }
		
//////////////////////////////////////////////////////////////////
		function enterArchive() {
	
		var report_id = jQuery('#archive_val').val();
			
		if(report_id == '' ){
	jQuery('#report_validate').append(' <div class="notification msgerror"> <a class="close"></a> <p ><strong>Error Message:</strong> Report ID not found try again please !!</p></div>');
			
			
			}
		if(report_id != '') {
			
			jQuery.post(base_url+"employee/ajax_insert_archive" ,{ report_id : report_id }, function(data){
             
          if(data==='ok'){
			  jQuery('#success').append(' <div class="notification msgsuccess"> <a class="close"></a><p > The report has been archived successfully . !!</p></div>');
			  }else{
				   jQuery('#fail').append(' <div class="notification msgerror"> <a class="close"></a><p > Error while archiving the report try again please. !!</p></div>');
				  }
			
			
			});
					
		}
			
        }
		
		///////////////////////////////////
			function insertForward() {

		var for_id = jQuery('#for_emp').val();	
		var report_id = jQuery('#report_id').val();	
		var reason = jQuery('#reason').val();	
		
	
			
		if(for_id == '' || report_id == '' || reason == ''){
			
	jQuery('#report_validate').append(' <div class="notification msgerror"> <a class="close"></a> <p >You must choice a lawyer to be able to forward this report !!</p></div>');
			
			
			}
		if(for_id != '' && report_id != ''|| reason != '') {
			
			jQuery.post(base_url+"employee/ajax_forward_report" ,{ for_id : for_id , report_id : report_id , reason : reason }, function(data){
             
          if(data==='ok'){
			  jQuery('#success').append(' <div class="notification msgsuccess"> <a class="close"></a> <p >the report has been forward to the lawyer successfully . !!</p></div>');
			  }else{
				   jQuery('#fail').append(' <div class="notification msgerror"> <a class="close"></a> <p >Error while forwarding the report to the lawyer try again please. !!</p></div>');
				  }
			
			
			});
					
		}
			
        }
	//////////////////////////////////////////
	
	
		
	
});
