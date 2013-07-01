<script>
jQuery(document).ready(function(){
	jQuery('#see_more').hide();
	jQuery('#more_list').hide();
	
jQuery( '.follow').each( function(){
	
	var btn_follow = this ;
	
	jQuery( btn_follow ).click( function(){
		
		var company_id = btn_follow.id ;
			jQuery.post(base_url+"user/ajax_follow" ,{ company_id: company_id }, function(data){
	if(data.status == 'ok'){
							jQuery('#_'+company_id).hide(700, function(){
								jQuery("#_" +company_id).remove();
								});
							var numItems = jQuery('.follow').length;
							if(numItems == 1){
								jQuery('#see_more').hide().fadeIn(1000);
								}
	}
		},"json");
							
		});
	
	}); 
	
	jQuery('#see_more').click( function(){
			
			jQuery.post(base_url+"user/get_company_ajax",{}, function(data){
			if(data.status == 'ok'){
				if(data.content != ''){
				jQuery('#see_more').hide(500);
			jQuery('#more_list').html(data.content).hide().fadeIn(1000);
			jQuery('.suggest_companies').hide();
		jQuery( '.follow').each( function(){
	
	var btn_follow = this ;
	
	jQuery( btn_follow ).click( function(){
		
		var company_id = btn_follow.id ;
			jQuery.post(base_url+"user/ajax_follow" ,{ company_id: company_id }, function(data){
	if(data.status == 'ok'){
							jQuery('#_'+company_id).hide(700, function(){
								jQuery("#_" +company_id).remove();
								});
							var numItems = jQuery('.follow').length;
							if(numItems == 1){
								jQuery('#see_more').hide().fadeIn(1000);
								}
	}
		},"json");
							
		});
	
	}); 	
				}else{
					var no_data = '<br><center><h3 style="color:#999">Wait New Campaines</h3></center><br>';
					jQuery('#see_more').hide(500);
			jQuery('#more_list').html(no_data).hide().fadeIn(1000);
			jQuery('.suggest_companies').hide();
					}
				}
			},"json");
			
			});
	
	}); 
</script>
 <div class="mainright">
        	<div class="mainrightinner">
            	  
                <div class="widgetbox" >
                        <div class="title"><h2 class="tabbed"><span>Recent Activity</span></h2></div>
                        <div class="widgetcontent padding0">
                            <ul class="activitylist">
                            <?php 
							if(isset($user_activity) && count($user_activity)!=0){
								foreach($user_activity as $row){
									$title = $row->title;
									$date = $row->date;
									$link = $row->link; ?>
                            	<li class="user"><a href="<?php echo base_url().$link; ?>"><?php echo $title; ?><br /><span><?php echo $date; ?></span></a></li>
                            <?php }}else{ ?>
                            <br />
                            <center><h3>No Activities Yet</h3></center>
                            <br />
                            <?php } ?>
                            </ul>
                        </div><!--widgetcontent-->
                    </div><!--widgetbox-->
                 <div class="widgetbox">
                	<div class="title"><h2 class="tabbed"><span>Suggest Companies</span></h2></div>
                    <div class="widgetcontent padding0">
                    <ul  style="list-style:none;padding:15px" id="more_list"></ul>
                    	<ul style="list-style:none;padding:15px" class="suggest_companies">
                        <?php $companies =  $this->model_users->get_suggest();
						if(isset($companies) && count($companies) != 0){
							foreach($companies as $row){
								$logo = $row->logo;
								$name = $row->name;
								$field = $row->field;
								$id = $row->id;
								 ?>
                                 
                        <li style="padding:20px" class="suggest" id="_<?php echo $id; ?>"><p><img src="<?php echo base_url();?>images/campanies_logo/<?php if($logo != ''){echo $logo;}else{echo 'defult.jpg';} ?>" width="70" height="60" style="float:left ; margin-right:10px ; border:double 1px #999"></p>
                        <p><strong><?php echo $name; ?></strong></p>
                        <p><small><?php echo $field; ?></small></p>
                        <p class="follow" id="<?php echo $id; ?>" style="color:#039;cursor:pointer">follow</p></li>
                        <?php }}else{ ?>
							<br>
                            <center><h3 style="color:#999">Wait new compaines</h3></center>
                            <br>
							<?php } ?>
                        </ul>
   
                        <div id="see_more"><center><h3 style="color:#036;cursor:pointer">See More Companies</h3></center><br></div>
                    </div><!--widgetcontent-->
                </div><!--widgetbox-->
                
           
           <div class="widgetbox">
                	<div class="title"><h2 class="calendar"><span>Calendar</span></h2></div>
                    <div class="widgetcontent padding0">
                    	<div id="datepicker"></div>
                    </div><!--widgetcontent-->
                </div><!--widgetbox-->
                
               
                
                
              
               
               </div><!--mainrightinner-->
        </div><!--mainright-->  