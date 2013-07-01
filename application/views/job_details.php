<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<title>Dashboard |Business Linkage</title>
<link rel="shortcut icon" href="<?php echo base_url();?>images/head.png" type="image/x-icon"/>
<link rel="stylesheet" href="<?php echo base_url();?>css/style.css"  type="text/css" />


<script type="text/javascript" src="<?php echo base_url();?>js/jquery-1.7.min.js"></script>
 
<script type="text/javascript" src="<?php echo base_url();?>js/jquery.flot.min.js" ></script>

<script type="text/javascript" src="<?php echo base_url();?>js/jquery.flot.resize.min.js" ></script>

<script type="text/javascript" src="<?php echo base_url();?>js/jquery-ui-1.8.16.custom.min.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>js/jquery.colorbox-min.js" ></script>
<script type="text/javascript" src="<?php echo base_url();?>js/general.js" ></script>
<script type="text/javascript" src="<?php echo base_url();?>js/colorpicker.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>js/dashboard.js" ></script>
<script type="text/javascript" src="<?php echo base_url();?>js/jquery.jgrowl.js" ></script>
<script type="text/javascript" src="<?php echo base_url();?>js/media.js" ></script>

<script type="text/javascript" src="<?php echo base_url();?>js/elements.js" ></script>

<script type="text/javascript">
var base_url=" <?php echo base_url();?>";
</script>

 <script src="<?php echo base_url();?>js/search.js" type="text/javascript" ></script>
  <script src="<?php echo base_url();?>js/insert.js" type="text/javascript" ></script>
<link rel="stylesheet" href="<?php echo base_url();?>css/chosen.css" />



</head>

<body class="loggedin">

	<!-- START OF HEADER -->
	<?php include('header2.php');?>
    <!-- END OF HEADER -->
    
    <!-- START OF MAIN CONTENT -->
    <div class="mainwrapper">
     	<div class="mainwrapperinner">
         	
        <div class="mainleft">
          	<div class="mainleftinner">
            
              	<?php include('left_menu.php');?>
            	<div id="togglemenuleft"><a></a></div>
            </div><!--mainleftinner-->
        </div><!--mainleft-->
        
        <div class="maincontent">
        	<div class="maincontentinner">
            	
                
                <div class="content">
                
                
                
                     <?php if(isset($no_reports)){?>
                   
                  
                      <center><h1 style="color:#c1c1c1">there is no jobs.</h1></center>
                    <?php }?>
                    <?php if(isset($job)){ $user_id=$job->row(0)->user_id; ?>
                      <?php $user_pic=$this->model_users->select_user($user_id)->row(0)->pic;?>
                        <?php $name=$this->model_users->select_user($user_id)->row(0)->name;?>
                  <h1 style="border-bottom:1px dashed #e1e1e1; padding-bottom:10px">
                  job details
                  </h1>
                <br />
                <div class="widgetcontent userlistwidget">
                            <ul>
              
            
                        
                        
                        
                            	<li>
                               <div class="avatar"><img src="<?php echo base_url(); ?>images/profile/<?php echo $user_pic ?>" width="50" height="45" /></div>
                                    <div class="info" style="margin-left:70px">
                                       <?php
										 echo $job->row(0)->name ?>
                                        
                                       <br/>
                                        <span style="font-weight:bold">level: <?php 
										echo $job->row(0)->level ?></span> <br />
                                        
                        <?php echo $job->row(0)->description; ?><br />                        
                                        
                                        
                                        
                                        <br /> <span style="text-align:right;float:right"><?php echo $job->row(0)->date; ?></span>
                                          <input type="hidden" id="job_id" value="<?php echo  $job->row(0)->apply_id ?>" />
                                        
                                        
                    
                   
                                        <br clear="all" />
                                      </li> 
                                    </div><!--info-->
                                      <h1 style="border-bottom:1px dashed #e1e1e1; padding-bottom:10px;padding-top:10px;">
                  <?php  echo $name ;?> CV
                  </h1>
                                
                               
                                <li style="list-style:none;">
                                 <?php 
				if(isset($user_data)){
				foreach($user_data as $row){
					$name = $row->name;
					$about = $row->about;
					$username = $row->username;
					$about= $row->about;
					$pic = $row->pic;
					$age = $row->age;
					$country = $row->country;
					$address = $row->address;
					 $gender = $row->gender;
					 ?>
                
                	<div  style="width:100%">
                    	
                        <br />
                    	<p style="margin:10px"><img src="<?php echo base_url();?>images/profile/<?php if(isset($pic)){ echo $pic;}elseif($pic == NULL && $gender == 'female'){ echo "female.gif";}elseif($pic == NULL && $gender == 'male'){echo "male.gif";}
							 ?>" height="10%" width="20%" style="float:left ; border:1px solid #c1c1c1 ; margin:10px ; padding:3px "/><p style="margin-right:5px">
                       <br />
                       <?php if($name && $age && $country && $address){?>
                       <p ><strong style="font-weight:bold ; font-size:15px"><?php echo $name; ?></strong><span style="color:#e1e1e1 ; font-size:10px">  (Name)</span>
                       </p>
                        <br />
                        <p ><strong style="font-weight:bold ; font-size:15px"><?php echo $age; ?></strong><span style="color:#e1e1e1 ; font-size:10px">  (Age)</span>
                       </p>
                       </p>
                       <br />
                       <p ><strong style="font-weight:bold ; font-size:15px"><?php echo $country." - ".$address; ?></strong><span style="color:#e1e1e1 ; font-size:10px">  (Address)</span>
                       </p>
                       
                        <?php }else{ ?>
                                <center><h3 style="color:#c1c1c1">Not Update Yet</h3></center>
                                <?php } ?></p>
                    </div>
                    
                    <br clear="all" /><br />
                    
                    <div class="one_half" style="width:100%; border-top:1px dashed #e1e1e1 ; padding:15px 0 10px 0" id="about">
                    <?php if($this->session->userdata('user_id') == $this->uri->segment(3)){ ?>
                    <div class="edit" id="edit_about_btn"><img src="<?php echo base_url();?>images/editor.png" width="15" height="15" title="Edit"/></div>
                    <?php } ?>
                    	<h1 class="title">About <strong style="color:#096"><?php echo $username; ?></strong></h1>
                        <br />
                        <div id="about_text">
                    	<p class="text" id="about_p"><?php  if(isset($about)){echo $about ; }
					 	else{?>
					   <center><h3 style="color:#c1c1c1" id="no_about">Not Update Yet</h3></center>
					   <?php }?>
                       </p>
                       </div>
                      
                    </div>
                    <br clear="all" /> 
                    
                    <?php }}?>
                    
                    <?php 
					if(isset($cv)){
						foreach($cv as $row){
							$summary = $row->summary;
							$accomplishments =$row->accomplishments ;
							}

					?>
                	<div class="one_half" style="width:100% ; border-top:1px dashed #e1e1e1 ; padding:15px 0 10px 0">
                    <?php if($this->session->userdata('user_id') == $this->uri->segment(3)){ ?>
                    <div class="edit" id="summary_edit_btn"><img src="<?php echo base_url();?>images/editor.png" width="15" height="15" title="Edit"/></div>
                    <?php } ?>
                    	<h1 class="title"> <strong style="color:#096"> <img src="<?php echo base_url();?>images/summary2.png" width="50" height="50" /> Summary </strong></h1>
                        <br />   
                        <div id="summary_text">     
                       <p class="text" id="summary"><?php  if(isset($summary)){echo $summary ; }
					   else{?>
					   <center><h3 style="color:#c1c1c1" id="no_summary">Not Update Yet</h3></center>
					   <?php }?>
                       </p>
                       </div>
                       
                       </div>
                       
                       <br />
                       
                       <div class="one_half " style="width:100%; border-top:1px dashed #e1e1e1 ; padding:15px 0 10px 0">
                       <?php if($this->session->userdata('user_id') == $this->uri->segment(3)){ ?>
                    <div class="edit" id="accomplishments_edit_btn"><img src="<?php echo base_url();?>images/editor.png" width="15" height="15" title="Edit"/></div>
                    <?php } ?>
                    	<h1 class="title"> <strong style="color:#096"> <img src="<?php echo base_url();?>images/bookmark2.png" width="50" height="50"  /> Accomplishments </strong></h1>
                        <br />
                        <div id="accomplishments_text">        
                       <p class="text" id="accomplishments"><?php  if(isset($accomplishments)){echo $accomplishments ; }
					   else{?>
					   <center><h3 style="color:#c1c1c1" id="no_accomplishments">Not Update Yet</h3></center>
					   <?php }?>
                       </p>
                       </div>
                      
                       </div>
                       <br clear="all" /> 
                    <?php }?>
                    
                    
                    <div class="one_half" style="width:100% ; border-top:1px dashed #e1e1e1 ; padding:15px 0 10px 0" id="expr">
                    <?php if($this->session->userdata('user_id') == $this->uri->segment(3)){ ?>
                    <div class="edit" id="expr_edit_btn" ><img src="<?php echo base_url();?>images/editor.png" width="15" height="15" title="Edit"/></div>
                    <div class="edit" id="expr_add_btn"><img src="<?php echo base_url();?>images/add.png" width="15" height="15" title="New Job"/></div>
                    <?php } ?>
                    	<h1 class="title"> <strong style="color:#096"> <img src="<?php echo base_url();?>images/list-icon.png" width="40" height="40" />  Experience </strong></h1>
                    <div class="expr_text"  style="font-size:14px"> 
					<?php 
					$counter=1;
					if(isset($cv_exper)){
						foreach($cv_exper as $row){
							$id = $row->id;
							$postion = $row->postion;
							$date_from = $row->date_from;
							$date_to = $row->date_to;
							$company = $row->company;
							$datails = $row->details;
						?>
                    
                        <br />  
                        <div class="expr_one" id="<?php echo $id; ?>"> 
                        <?php if($this->session->userdata('user_id') == $this->uri->segment(3)){ ?>
                        <div class="delete" id="<?php echo $id; ?>"><img src="<?php echo base_url();?>images/Delete.png" width="12" height="12" title="Delete"/></div>
                       <?php } ?>
                       <p class="text"><img src="<?php echo base_url();?>images/rightg.png" width="35" height="35" style="margin-bottom:-12px;""/><span><strong class="postion_field<?php echo $counter; ?>"><?php echo $postion ;?></strong></span> at <span><strong class="company_field<?php echo $counter; ?>"><?php echo $company ;?></strong></span> from <span>
                       <strong class="date_from_field<?php echo $counter; ?>"><?php echo $date_from ;?></strong></span> to <span><strong class="date_to_field<?php echo $counter; ?>"><?php echo $date_to ;?></strong></span>
                       </p>
                       <br />
                       <p style="margin-left:40px" class="details_field<?php echo $counter; ?>"><?php echo $datails ;?></p>
                       </div>
                       <?php $counter++; }} ?>
                        <center><h3 style="color:#c1c1c1" id="no_expr"></h3></center>
                       </div>
                       
                       
                       
                     <div id="new_exprs"></div>
                     
                        
                       <br clear="all" />
                    </div>
                    
                    
                    <div class="one_half" style="width:100% ; border-top:1px dashed #e1e1e1 ; padding:15px 0 10px 0" id="skill">
                    <?php if($this->session->userdata('user_id') == $this->uri->segment(3)){ ?>
                    <div class="edit" id="skill_edit_btn"><img src="<?php echo base_url();?>images/editor.png" width="15" height="15" title="Edit"/></div>
                    <div class="edit" id="skill_add_btn"><img src="<?php echo base_url();?>images/add.png" width="15" height="15" title="New Skill"/></div>
                    <?php } ?>
                    	<h1 class="title"> <strong style="color:#096"> <img src="<?php echo base_url();?>images/skills.png" width="40" height="40" />  Skills </strong></h1>
                   <br />
                   <div class="skill_text"  style="font-size:14px"> 
                    <?php 
					$counter=1;
					if(isset($cv_skills)){
						foreach($cv_skills as $row){
							$id = $row->id;
							$skill = $row->skill;
							$level = $row->level;
						?>
                    
                    <div class="skill_one" id="<?php echo $id ;?>"  style="font-size:14px">
                    <?php if($this->session->userdata('user_id') == $this->uri->segment(3)){ ?>
                    <div class="delete_skill" id="<?php echo $id; ?>"><img src="<?php echo base_url();?>images/Delete.png" width="12" height="12" title="Delete"/></div>
                        <?php } ?>     
                       <p class="text" id="skills"><img src="<?php echo base_url();?>images/rightg.png" width="35" height="35" style="margin-bottom:-12px;""/><span><strong class="skill_field<?php echo $counter; ?>"><?php echo $skill ;?></strong></span><div class="progress">
                            <div class="bar2" style="width:70%; margin-left:100px"><div id="colorbar<?php echo $counter; ?>" class="value <?php if($level == 'Excellent'){ echo 'bluebar';}elseif($level == 'Very Good')
							{ echo 'bluebar';}elseif($level == 'Good'){echo 'orangebar';}elseif($level == 'Medium'){echo 'orangebar';}elseif($level == 'Acceptable'){echo 'redbar';}elseif($level == 'Weak'){echo 'redbar';} ?>" style="width: <?php if($level == 'Excellent'){ echo '95%';}elseif($level == 'Very Good')
							{ echo '85%';}elseif($level == 'Good'){echo '75%';}elseif($level == 'Medium'){echo '65%';}elseif($level == 'Acceptable'){echo '50%';}elseif($level == 'Weak'){echo '35%';} ?>"><strong class="level_field<?php echo $counter; ?>"><?php echo $level ;?></strong></div></div></div>
                        </p>
                        </div>
                       
                       <?php $counter++; }}?>
                       <center><h3 style="color:#c1c1c1" id="no_skill"></h3></center>
                       </div>
                       <br />
                              
                       <br />
                       
                       <br clear="all" />
                    </div>
                    
                    
                    
                    <div class="one_half" style="width:100% ; border-top:1px dashed #e1e1e1 ; padding:15px 0 10px 0">
                    <?php if($this->session->userdata('user_id') == $this->uri->segment(3)){ ?>
                    <div class="edit" id="edu_edit_btn"><img src="<?php echo base_url();?>images/editor.png" width="15" height="15" title="Edit"/></div>
                    <div class="edit" id="edu_add_btn"><img src="<?php echo base_url();?>images/add.png" width="15" height="15" title="New Study"/></div>
                    <?php } ?>
                    	<h1 class="title"> <strong style="color:#096"> <img src="<?php echo base_url();?>images/edu.png" width="40" height="40" />  Study </strong></h1>
                   <br />
                   <div class="edu_text"  style="font-size:14px">
                    <?php 
					$counter=1;
					if(isset($cv_edu)){
						foreach($cv_edu as $row){
							$id = $row->id;
							$school = $row->school;
							$grad_year = $row->grad_year;
							$country = $row->country;
							$field_study = $row->field_study;
							$degree = $row->degree;
							$edu_details = $row->details;
						?>
                    <div class="edu_one" id="<?php echo $id ;?>"  style="font-size:14px">
                    <?php if($this->session->userdata('user_id') == $this->uri->segment(3)){ ?>
                    <div class="delete_edu" id="<?php echo $id; ?>"><img src="<?php echo base_url();?>images/Delete.png" width="12" height="12" title="Delete"/></div>
                        <?php } ?>
                        <p class="text" id="edu">
                        <div style="margin-left:30px">
                          <strong style="font-size:16px ; color:#111" class="school_field<?php echo $counter; ?>"><?php echo $school; ?></strong><br />
                          <span style="color:#a1a1a1" ><span class="study_field_field<?php echo $counter; ?>"><?php echo $field_study; ?></span> - <span class="degree_field<?php echo $counter; ?>"><?php echo $degree; ?></span> - <span class="country_field<?php echo $counter; ?>"><?php echo $country; ?></span> - <span class="grad_year_field<?php echo $counter; ?>"><?php echo $grad_year; ?></span></span><br />
                          <span class="edu_datails_field<?php echo $counter; ?>"><?php echo $edu_details; ?></span>
                        </div>
                        </p>
                        </div>
                       <?php $counter++; }}?>
                       <center><h3 style="color:#c1c1c1" id="no_edu"></h3></center>
                       </div>
                       <br />
                      
                      
                       
                       <br clear="all" />
                      
                    </div>
 
					
                    <br clear="all"/>
                   
                                </li>
                                
                                   
                	<div id="success"></div>
                   
                    <div id="fail"></div>
                   
                    
                   <div id="report_validate">
                   
                   </div>
                   
                           <ul class="buttonlist">
                                       
											  <li style="border:none;"><a href="#" id="forward" class="btn  btn_link"><span>Start Interview</span></a></li>
                                              <li style="border:none;"><a href="#reject" id="reject_button" class="btn  btn_trash"><span>Reject this user</span></a></li>
                                      
                                        </ul>
                          <?php }?>      
                               
                                
                            </ul>
                                             
                            
                        </div><!--widgetcontent-->
                    
                    
                    
                </div><!--content-->
                    <?php include('footer.php');?>
            </div><!--maincontentinner-->
            
       
            
        </div><!--maincontent-->
         <?php include('right_div.php')?>   
                
               
                
                
              
               
               </div><!--mainrightinner-->
        </div><!--mainright-->  
     	</div><!--mainwrapperinner-->
    </div><!--mainwrapper-->
	<!-- END OF MAIN CONTENT -->
   
<script type="text/javascript" src="<?php echo base_url();?>js/jquery-1.7.min.js"></script>
 <script type="text/javascript">
jQuery(document).ready(function() {
			  // Button which will activate our modal
			   	jQuery('#forward_form').hide();
				//jQuery('#forward').click(function(){
				//	jQuery('#forward_form').fadeIn('slow', function() {
// Animation complete
//});


				jQuery('#forward').toggle(
function () {
jQuery('#forward_form').fadeIn('slow', function() {
// Animation complete

});
},
function () {
jQuery('#forward_form').fadeOut('slow', function() {
// Animation complete
});
}
);

////////////////////////////////////////////////

		   	jQuery('#result_form').hide();
				//jQuery('#forward').click(function(){
				//	jQuery('#forward_form').fadeIn('slow', function() {
// Animation complete
//});


				jQuery('#report_result2').toggle(
function () {
jQuery('#result_form').fadeIn('slow', function() {
// Animation complete

});
},
function () {
jQuery('#result_form').fadeOut('slow', function() {
// Animation complete
});
}
);
////////////////////////////////////////////////
		
			});
		
</script>
<script type="text/javascript">
var base_url=" <?php echo base_url();?>";
</script>
<script type="text/javascript" src="<?php echo base_url();?>js/jquery-ui-1.8.16.custom.min.js"></script>
 
 

<script src="<?php echo base_url();?>js/insert.js" type="text/javascript" ></script>
<script src="<?php echo base_url();?>js/activity.js" type="text/javascript" ></script>


  <script src="<?php echo base_url();?>js/chosen.jquery.js" type="text/javascript"></script>
  <script type="text/javascript"> 
    var config = {
      '.chzn-select'           : {},
      '.chzn-select-deselect'  : {allow_single_deselect:true},
      '.chzn-select-no-single' : {disable_search_threshold:10},
      '.chzn-select-no-results': {no_results_text:'Oops, nothing found!'},
      '.chzn-select-width'     : {width:"95%"}
    }
    for (var selector in config) {
      $(selector).chosen(config[selector]);
    }
  </script>


</body>
</html>
