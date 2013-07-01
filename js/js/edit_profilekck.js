jQuery(document).ready(function(){
	add_delete_handlers();
jQuery('#edit_area').hide();
jQuery('#edit_area_summary').hide();
jQuery('#edit_area_accomplishments').hide();
jQuery('#ok_or_not').hide();
jQuery("#new_job").hide();
jQuery('#ok_or_not_skill').hide();
jQuery("#new_skill").hide();
jQuery('#ok_or_not_edu').hide();
jQuery("#new_edu").hide();

jQuery('#edit_about_btn').click(function(){
	jQuery('#edit_area').hide().fadeIn(1000);
	jQuery('.about_edit').autosize();
jQuery('#about_text').hide();

});
jQuery('#cancel_edit').click(function(){
jQuery('#about_text').hide().fadeIn(1000);
jQuery('#edit_area').hide();
});

jQuery('#done_edit').click(function(){
var about_user = jQuery('.about_edit').val();
jQuery.post(base_url+"user/update_about" ,{ about_user: about_user }, function(data){
	alert('done');
							jQuery('#about_text').hide().fadeIn(1000);
							jQuery('#edit_area').hide();
							 jQuery('#about_p').html(about_user);
		},"json");

});

//////////////////////summary////////////
jQuery('#summary_edit_btn').click(function(){
	jQuery('#edit_area_summary').hide().fadeIn(1000);
	jQuery('.summary_edit').autosize();
jQuery('#summary_text').hide();

});

jQuery('#cancel_edit_summary').click(function(){
jQuery('#summary_text').hide().fadeIn(1000);
jQuery('#edit_area_summary').hide();
});

jQuery('#done_edit_summary').click(function(){
var summary = jQuery('.summary_edit').val();
jQuery.post(base_url+"user/update_summary" ,{ summary: summary }, function(data){
							jQuery('#summary_text').hide().fadeIn(1000);
							jQuery('#edit_area_summary').hide();
							 jQuery('#summary').html(summary);
		},"json");

});

//////////////////////accomplishments////////////
jQuery('#accomplishments_edit_btn').click(function(){
	jQuery('#edit_area_accomplishments').hide().fadeIn(1000);
	jQuery('.accomplishments_edit').autosize();
jQuery('#accomplishments_text').hide();

});

jQuery('#cancel_edit_accomplishments').click(function(){
jQuery('#accomplishments_text').hide().fadeIn(1000);
jQuery('#edit_area_accomplishments').hide();
});

jQuery('#done_edit_accomplishments').click(function(){
var accomplishments = jQuery('.accomplishments_edit').val();
jQuery.post(base_url+"user/update_accomplishments" ,{ accomplishments: accomplishments }, function(data){
							jQuery('#accomplishments_text').hide().fadeIn(1000);
							jQuery('#edit_area_accomplishments').hide();
							 jQuery('#accomplishments').html(accomplishments);
		},"json");

});

//////////////////////expr////////////////////////////////////////////////////////////////////////////////////
jQuery('#expr_edit_btn').click(function(){
	jQuery.post(base_url+"user/get_expr_ajax",{}, function(data){
			if(data.status == 'ok'){
					jQuery('#new_exprs').html(data.content);
					jQuery('#new_exprs').hide().fadeIn(1000);
					jQuery('#ok_or_not').hide().fadeIn(1000);
					
	jQuery('#job_details').autosize();
jQuery('.expr_text').hide();
				}
			},"json");


});

jQuery('#cancel_edit_expr').click(function(){
jQuery('.expr_text').hide().fadeIn(1000);
jQuery('#new_exprs').hide();
jQuery('#ok_or_not').hide();
});

jQuery('#done_edit_expr').click(function(){
	jQuery.post(base_url+"user/get_expr_ajax",{}, function(data){
			if(data.status == 'ok'){
					var counter = data.expr_count;
					for(var i=1 ; i<=counter ; i++){
		
var id = jQuery('.pointer'+i+'').val();
var postion = jQuery('.postion'+i+'').val();
var company = jQuery('.company'+i+'').val();
var date_from = jQuery('.date_from'+i+'').val();
var date_to = jQuery('.date_to'+i+'').val();
var details = jQuery('.job_details'+i+'').val();
							jQuery('.postion_field'+i+'').html(postion);
							 jQuery('.company_field'+i+'').html(company);
							 jQuery('.date_from_field'+i+'').html(date_from);
							 jQuery('.date_to_field'+i+'').html(date_to);
							 jQuery('.details_field'+i+'').html(details);
jQuery.post(base_url+"user/update_expr" ,{ id : id , postion : postion , company : company , date_from : date_from , date_to : date_to , details : details }, function(data){
							
							jQuery('.expr_text').hide().fadeIn(1000);
							jQuery('#new_exprs').hide();
							jQuery('#ok_or_not').hide();
							 
		},"json");
	}
				}
			},"json");
	
});

///////////////////////
jQuery("#expr_add_btn").click(function () {
    jQuery.post(base_url+"user/get_expr_ajax",{}, function(data){
			if(data.status == 'ok'){
					var counter = data.expr_count;
					if(counter >= 5){
            jAlert("Only 5 Jobs allow");
            return false;
	}    
	jQuery("#new_job").appendTo('.expr_text').fadeIn(1500);
	 jQuery('html, body').stop().animate({scrollTop: jQuery("#new_job").offset().top}, 2000);
	jQuery('#job_details').autosize(); 
				}
			},"json");
     });
	 
	jQuery('#cancel_add_expr').click(function(){
 jQuery("#new_job").hide(1500);
							jQuery('.new_postion').val('');
							jQuery('.new_company').val('');
							jQuery('.new_date_from').val('');
							jQuery('.new_date_to').val('');
							jQuery('.new_job_details').val('');
							jQuery('html, body').stop().animate({scrollTop: jQuery(".expr_text").offset().top}, 2000);
}); 

jQuery('#done_add_expr').click(function(){
	jQuery.post(base_url+"user/get_expr_ajax",{}, function(data){
			if(data.status == 'ok'){
				var counter = ++data.expr_count;
				var postion = jQuery('.new_postion').val();
				var company = jQuery('.new_company').val();
				var date_from = jQuery('.new_date_from').val();
				var date_to = jQuery('.new_date_to').val();
				var details = jQuery('.new_job_details').val();
			if(postion != '' && company != '' && date_from != '' && date_to != '' && details != ''){	
jQuery.post(base_url+"user/new_expr" ,{ postion : postion , company : company , date_from : date_from , date_to : date_to , details : details }, function(data){
						var t = '';	
							t +='<br />'; 
							t +='<div class="expr_one" id="'+data.id+'">'; 
							t +='<div class="delete" id="'+data.id+'"><img src="'+base_url+'images/Delete.png" width="12" height="12" title="Delete"/></div>';
                       t +='<p class="text"><img src="'+base_url+'images/rightg.png" width="35" height="35" style="margin-bottom:-12px;""/><span><strong class="postion_field'+counter+'">'+data.postion+'</strong></span> at <span><strong class="company_field'+counter+'">'+data.company+'</strong></span> from <span>';
                       t +='<strong class="date_from_field'+counter+'">'+data.date_from+'</strong></span> to <span><strong class="date_to_field'+counter+'">'+data.date_to+'</strong></span>';
                       t +='</p>';
                       t +='<br />';
					   t +='<p style="margin-left:40px" class="details_field'+counter+'">'+data.details+'</p>';
					   t +='</div>';
							jQuery('.expr_text').append( t ).hide().fadeIn(1000);
							jQuery('#new_job').hide();
							jQuery('.new_postion').val('');
							jQuery('.new_company').val('');
							jQuery('.new_date_from').val('');
							jQuery('.new_date_to').val('');
							jQuery('.new_job_details').val('');
							jQuery('html, body').stop().animate({scrollTop: jQuery(".expr_text").offset().top}, 2000);
							add_delete_handlers();
		},"json");
			}else{
				jAlert("There is empty field");
				return false;
				}
				}
			},"json");
});
/////////////////////////////

function expr_delete( expr_id )
	{
		jQuery.post(base_url+"user/delete_expr" ,{ id : expr_id }, function(data){
							jQuery( '#' + expr_id ).hide(1500);
							 
		},"json");
	
	}
/////////////////////////////////////////////////////


//////////////////////skill////////////////////////////////////////////////////////////////////////////////////
jQuery('#skill_edit_btn').click(function(){
	jQuery.post(base_url+"user/get_skill_ajax",{}, function(data){
			if(data.status == 'ok'){
					jQuery('#skills_db').html(data.content);
					jQuery('#skills_db').hide().fadeIn(1000);
					jQuery('#ok_or_not_skill').hide().fadeIn(1000);
					
jQuery('.skill_text').hide();
				}
			},"json");


});

jQuery('#cancel_edit_skill').click(function(){
jQuery('.skill_text').hide().fadeIn(1000);
jQuery('#skills_db').hide();
jQuery('#ok_or_not_skill').hide();
});

jQuery('#done_edit_skill').click(function(){
	jQuery.post(base_url+"user/get_skill_ajax",{}, function(data){
			if(data.status == 'ok'){
					var counter = data.skill_count;
					for(var i=1 ; i<=counter ; i++){
		
var id = jQuery('.pointer_skill'+i+'').val();
var skill = jQuery('.skill'+i+'').val();
var level = jQuery('.level'+i+'').val();
							jQuery('.skill_field'+i+'').html(skill);
							 jQuery('.level_field'+i+'').html(level);
							 if(level == 'Excellent'){ jQuery('#colorbar'+i+'').width('95%'); jQuery('#colorbar'+i+'').attr("class", "value bluebar");}
							 if(level == 'Very Good'){ jQuery('#colorbar'+i+'').width('85%'); jQuery('#colorbar'+i+'').attr("class", "value bluebar");}
							 if(level == 'Good'){ jQuery('#colorbar'+i+'').width('75%'); jQuery('#colorbar'+i+'').attr("class", "value orangebar");}
							 if(level == 'Medium'){ jQuery('#colorbar'+i+'').width('65%'); jQuery('#colorbar'+i+'').attr("class", "value orangebar");}
							 if(level == 'Acceptable'){ jQuery('#colorbar'+i+'').width('50%'); jQuery('#colorbar'+i+'').attr("class", "value redbar");}
							 if(level == 'Weak'){ jQuery('#colorbar'+i+'').width('35%'); jQuery('#colorbar'+i+'').attr("class", "value redbar");}
jQuery.post(base_url+"user/update_skill" ,{ id : id , skill : skill , level : level }, function(data){
							
							jQuery('.skill_text').hide().fadeIn(1000);
							jQuery('#skills_db').hide();
							jQuery('#ok_or_not_skill').hide();
							 
		},"json");
	}
				}
			},"json");
	
});

///////////////////////
jQuery("#skill_add_btn").click(function () {
    jQuery.post(base_url+"user/get_skill_ajax",{}, function(data){
			if(data.status == 'ok'){
					var counter = data.skill_count;
					
					if(counter>=10){
            jAlert("Only 10 Jobs allow");
            return false;
	}    
	jQuery("#new_skill").appendTo('.skill_text').fadeIn(1500);
	 jQuery('html, body').stop().animate({scrollTop: jQuery("#new_skill").offset().top}, 2000);
				}
			},"json");
     });
	 
	jQuery('#cancel_add_skill').click(function(){
 jQuery("#new_skill").hide(1500);
							jQuery('.new_skill').val('');
							jQuery('.new_level').val('');
							jQuery('html, body').stop().animate({scrollTop: jQuery(".skill_text").offset().top}, 2000);
}); 

jQuery('#done_add_skill').click(function(){
	jQuery.post(base_url+"user/get_skill_ajax",{}, function(data){
			if(data.status == 'ok'){
				var counter = ++data.skill_count;
				var skill = jQuery('.new_skill').val();
				var level = jQuery('.new_level').val();
			if(skill != '' && level != '' ){	
jQuery.post(base_url+"user/new_skill" ,{ skill : skill , level : level }, function(data){
			var colorbar;
			var colorwidth;
			if(data.level == 'Excellent'){colorbar='bluebar'; colorwidth='95%';}
			if(data.level == 'Very Good'){colorbar='bluebar'; colorwidth='85%';}
			if(data.level == 'Good'){colorbar='orangebar'; colorwidth='75%';}
			if(data.level == 'Medium'){colorbar='orangebar'; colorwidth='65%';}
			if(data.level == 'Acceptable'){colorbar='redbar'; colorwidth='50%';}
			if(data.level == 'Weak'){colorbar='redbar'; colorwidth='35%';}
						var t = '';	
							t +='<br />'; 
							t +='<div class="skill_one" id="'+data.id+'"  style="font-size:14px">';
                    t +='<div class="delete_skill" id="'+data.id+'"><img src="'+base_url+'images/Delete.png" width="12" height="12" title="Delete"/></div>';
                        t +='<br />';       
                       t +='<p class="text" id="skills"><img src="'+base_url+'images/rightg.png" width="35" height="35" style="margin-bottom:-12px;""/><span><strong class="skill_field'+counter+'">'+data.skill+'</strong></span><div class="progress">';
                            t +='<div class="bar2" style="width:70%; margin-left:100px"><div id="colorbar'+counter+'" class="value '+colorbar+'" ';
							 t +='style="width:'+colorwidth+'';
							t +='"><strong class="level_field'+counter+'">'+data.level+'</strong></div></div></div>';
                        t +='</p>';
                        t +='</div>';
							jQuery('.skill_text').append( t ).hide().fadeIn(1000);
							jQuery('#new_skill').hide();
							jQuery('.new_skill').val('');
							jQuery('.new_level').val('');
							jQuery('html, body').stop().animate({scrollTop: jQuery(".skill_text").offset().top}, 2000);
							add_delete_handlers();
		},"json");
			}else{
				jAlert("There is empty field");
				return false;
				}
				}
			},"json");
});
/////////////////////////////
function add_delete_handlers()
{
	jQuery( '.delete').each( function(){
	
	var btn = this ;
	jQuery( btn ).click( function(){
		jConfirm('Do You Really Want to Delete it?', 'Delete', function(r) {
                    if( r ){
		expr_delete( btn.id );
			
					}
		});			
		});
	
	}); 


jQuery( '.delete_skill').each( function(){
	
	var btn_skill = this ;
	jQuery( btn_skill ).click( function(){
		jConfirm('Do You Really Want to Delete it?', 'Delete', function(r) {
                    if( r ){
		skill_delete( btn_skill.id );
			
					}
		});			
		});
	
	}); 

	}

function expr_delete( expr_id )
	{
		jQuery.post(base_url+"user/delete_expr" ,{ id : expr_id }, function(data){
							jQuery( '#' + expr_id ).hide(1500);
							 
		},"json");
	
	}

function skill_delete( skill_id )
	{
		jQuery.post(base_url+"user/delete_skill" ,{ id : skill_id }, function(data){
							jQuery( '#' + skill_id ).hide(1500);
							 
		},"json");
	
	}	
/////////////////////////////////////////////////////

//////////////////////edu////////////////////////////////////////////////////////////////////////////////////
jQuery('#edu_edit_btn').click(function(){
	jQuery.post(base_url+"user/get_edu_ajax",{}, function(data){
			if(data.status == 'ok'){
					jQuery('#edu_db').html(data.content);
					jQuery('#edu_db').hide().fadeIn(1000);
					jQuery('#ok_or_not_edu').hide().fadeIn(1000);
					
	jQuery('#edu_details').autosize();
jQuery('.edu_text').hide();
				}
			},"json");


});

jQuery('#cancel_edit_edu').click(function(){
jQuery('.edu_text').hide().fadeIn(1000);
jQuery('#edu_db').hide();
jQuery('#ok_or_not_edu').hide();
});

jQuery('#done_edit_edu').click(function(){
	jQuery.post(base_url+"user/get_edu_ajax",{}, function(data){
			if(data.status == 'ok'){
					var counter = data.edu_count;
					for(var i=1 ; i<=counter ; i++){
		
var id = jQuery('.pointer_edu'+i+'').val();
var school = jQuery('.school'+i+'').val();
var grad_year = jQuery('.grad_year'+i+'').val();
var country = jQuery('.country'+i+'').val();
var field_study = jQuery('.field_study'+i+'').val();
var degree = jQuery('.degree'+i+'').val();
var edu_details = jQuery('.edu_details'+i+'').val();
							jQuery('.school_field'+i+'').html(school);
							 jQuery('.grad_year_field'+i+'').html(grad_year);
							 jQuery('.country_field'+i+'').html(country);
							 jQuery('.study_field_field'+i+'').html(field_study);
							 jQuery('.degree_field'+i+'').html(degree);
							 jQuery('.edu_datails_field'+i+'').html(edu_details);
jQuery.post(base_url+"user/update_edu" ,{ id : id , school : school , grad_year : grad_year , country : country , field_study : field_study , degree : degree , edu_details : edu_details }, function(data){
							
							jQuery('.edu_text').hide().fadeIn(1000);
							jQuery('#edu_db').hide();
							jQuery('#ok_or_not_edu').hide();
							 
		},"json");
	}
				}
			},"json");
	
});

///////////////////////
jQuery("#edu_add_btn").click(function () {
    jQuery.post(base_url+"user/get_edu_ajax",{}, function(data){
			if(data.status == 'ok'){
					var counter = data.edu_count;
					if(counter >= 5){
            jAlert("Only 5 Studies allow");
            return false;
	}    
	jQuery("#new_edu").appendTo('.edu_text').fadeIn(1500);
	 jQuery('html, body').stop().animate({scrollTop: jQuery("#new_edu").offset().top}, 2000);
	jQuery('#edu_details').autosize(); 
				}
			},"json");
     });
	 
	jQuery('#cancel_add_edu').click(function(){
 jQuery("#new_edu").hide(1500);
							jQuery('.new_school').val('');
							jQuery('.new_grad_year').val('');
							jQuery('.new_country').val('');
							jQuery('.new_field_study').val('');
							jQuery('.new_degree').val('');
							jQuery('.new_details').val('');
							jQuery('html, body').stop().animate({scrollTop: jQuery(".edu_text").offset().top}, 2000);
}); 

jQuery('#done_add_expr').click(function(){
	jQuery.post(base_url+"user/get_edu_ajax",{}, function(data){
			if(data.status == 'ok'){
				var counter = ++data.edu_count;
				var school = jQuery('.new_school').val();
				var grad_year = jQuery('.new_grad_year').val();
				var country = jQuery('.new_country').val();
				var field_study = jQuery('.new_field_study').val();
				var degree = jQuery('.new_degree').val();
				var details = jQuery('.new_edu_details').val();
			if(school != '' && grad_year != '' && country != '' && field_study != '' && degree != '' && details != ''){	
jQuery.post(base_url+"user/new_expr" ,{ school : school , grad_year : grad_year , country : country , field_study : field_study , degree : degree , details : details }, function(data){
						var t = '';	
							t +='<br />'; 
							t +='<div class="expr_one" id="'+data.id+'">'; 
							t +='<div class="delete" id="'+data.id+'"><img src="'+base_url+'images/Delete.png" width="12" height="12" title="Delete"/></div>';
                       t +='<p class="text"><img src="'+base_url+'images/rightg.png" width="35" height="35" style="margin-bottom:-12px;""/><span><strong class="postion_field'+counter+'">'+data.postion+'</strong></span> at <span><strong class="company_field'+counter+'">'+data.company+'</strong></span> from <span>';
                       t +='<strong class="date_from_field'+counter+'">'+data.date_from+'</strong></span> to <span><strong class="date_to_field'+counter+'">'+data.date_to+'</strong></span>';
                       t +='</p>';
                       t +='<br />';
					   t +='<p style="margin-left:40px" class="details_field'+counter+'">'+data.details+'</p>';
					   t +='</div>';
							jQuery('.expr_text').append( t ).hide().fadeIn(1000);
							jQuery('#new_job').hide();
							jQuery('.new_postion').val('');
							jQuery('.new_company').val('');
							jQuery('.new_date_from').val('');
							jQuery('.new_date_to').val('');
							jQuery('.new_job_details').val('');
							jQuery('html, body').stop().animate({scrollTop: jQuery(".expr_text").offset().top}, 2000);
							add_delete_handlers();
		},"json");
			}else{
				jAlert("There is empty field");
				return false;
				}
				}
			},"json");
});
/////////////////////////////
function add_delete_handlers()
{
	jQuery( '.delete').each( function(){
	
	var btn = this ;
	jQuery( btn ).click( function(){
		jConfirm('Do You Really Want to Delete it?', 'Delete', function(r) {
                    if( r ){
		expr_delete( btn.id );
			
					}
		});			
		});
	
	}); 

	}

function expr_delete( expr_id )
	{
		jQuery.post(base_url+"user/delete_expr" ,{ id : expr_id }, function(data){
							jQuery( '#' + expr_id ).hide(1500);
							 
		},"json");
	
	}
/////////////////////////////////////////////////////

});