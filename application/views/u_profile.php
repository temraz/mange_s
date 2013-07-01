<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml"><head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<title>Dashboard |Business Linkage</title>
<link rel="shortcut icon" href="<?php echo base_url();?>images/head.png" type="image/x-icon"/>
<link rel="stylesheet" href="<?php echo base_url();?>css/style.css"  type="text/css" />

<script type="text/javascript" src="<?php echo base_url();?>js/jquery-1.7.min.js"></script>
 
<script type="text/javascript" src="<?php echo base_url();?>js/jquery.flot.min.js" ></script>

<script type="text/javascript" src="<?php echo base_url();?>js/jquery.flot.resize.min.js" ></script>

<script type="text/javascript" src="<?php echo base_url();?>js/jquery-ui-1.8.16.custom.min.js"></script>
<script type="text/javascript" >
var base_url = "<?php echo base_url(); ?>";
</script>
<script type="text/javascript" src="<?php echo base_url();?>js/general.js" ></script>

<script type="text/javascript" src="<?php echo base_url();?>js/dashboard.js" ></script>
<script type="text/javascript" src="<?php echo base_url();?>js/edit_profile.js" ></script>
<script src='<?php echo base_url();?>js/jquery.autosize.js'></script>
<script type="text/javascript" src="<?php echo base_url();?>js/jquery.alerts.js" ></script>
<?php require("all_countries.php");?>
<style>
<?php if($this->session->userdata('user_id') == $this->uri->segment(3)){ ?>
.edit{float:right ; cursor:pointer ; margin-right:15px ; display:none }
.delete{float:right ; cursor:pointer ; margin-right:10px ; display:none }
.delete_skill{float:right ; cursor:pointer ; margin-right:10px ; display:none }
.delete_edu{float:right ; cursor:pointer ; display:none }
.expr_one{border-radius:5px ;padding:10px 10px 20px 10px}
.expr_one:hover{ border:1px dashed #CCC ; background:#FDFFFA}
.expr_one:hover .delete{display:block}
.one_half:hover .edit{display:block}
.one_half{border-radius:3px}
.one_half:hover{}
.title{margin-left:15px}
.text{padding:10px}

.skill_one{border-radius:5px ;padding:10px 10px 20px 10px}
.skill_one:hover{ border:1px dashed #CCC ; background:#FDFFFA}
.skill_one:hover .delete_skill{display:block}

.edu_one{border-radius:5px ;padding: 10px 20px 10px}
.edu_one:hover{ border:1px dashed #CCC ; background:#FDFFFA}
.edu_one:hover .delete_edu{display:block}
<?php } ?>

</style>

 <script>
jQuery(document).ready(function() {
  jQuery(".following_items").hide();
  //toggle the componenet with class msg_body
  jQuery(".show_content").click(function()
  {
    jQuery(".following_items").slideToggle(700);
	jQuery('html, body').stop().animate({scrollTop: jQuery(".following_items").offset().top}, 2000);
  });
});

    </script>
</head>

<body class="loggedin">

	<!-- START OF HEADER -->
	<?php include('header.php');?>
    <!-- END OF HEADER -->
        
    <!-- START OF MAIN CONTENT -->
    <div class="mainwrapper">
     	<div class="mainwrapperinner">
         	
        <div class="mainleft">
          	<div class="mainleftinner">
            
              	<?php include('left_menu_user.php');?>
            	<div id="togglemenuleft"><a></a></div>
            </div><!--mainleftinner-->
        </div><!--mainleft-->
        
        <div class="maincontent">
        	<div class="maincontentinner">
            	
                <ul class="maintabmenu">
                	<li class="current"><a href="<?php echo base_url();?>user/profile/" >profile</a></li>
                </ul><!--maintabmenu-->
                
                <div class="content" >
               
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
                    	<h1> <strong style="color:#096 ;"> <?php echo $username; ?> </strong> Personnal Information</h1>
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
                       <div id="edit_area">
                       <p>
                       <span class="field" style="padding:10px"><textarea class="about_edit" style="width:93%;resize:none;padding:10px;height:auto" required><?php echo $about; ?></textarea></span> 
                       <button class="stdbtn btn_black" id="done_edit" style="margin:12px;width:80px">Done</button>
                       <button class="stdbtn btn" id="cancel_edit" style=";width:80px">Cancel</button>
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
                       <div id="edit_area_summary">
                       <p>
                       <span class="field" style="padding:10px"><textarea class="summary_edit" style="width:93%;resize:none;padding:10px;height:auto" required><?php if(isset($summary)){echo $summary; }?></textarea></span> 
                       <button class="stdbtn btn_black" id="done_edit_summary" style="margin:12px;width:80px">Done</button>
                       <button class="stdbtn btn" id="cancel_edit_summary" style=";width:80px">Cancel</button>
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
                       <div id="edit_area_accomplishments">
                       <p>
                       <span class="field" style="padding:10px"><textarea class="accomplishments_edit" style="width:93%;resize:none;padding:10px;height:auto" required><?php if(isset($accomplishments)){echo $accomplishments ; } ?></textarea></span> 
                       <button class="stdbtn btn_black" id="done_edit_accomplishments" style="margin:12px;width:80px">Done</button>
                       <button class="stdbtn btn" id="cancel_edit_accomplishments" style=";width:80px">Cancel</button>
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
                       
                       <div id="new_job" style="padding:20px">
                       <br />
                       <p>
                           <h3 >New Job</h3>
                           <br />
                           <label>Postion</label>
                           <span class="field"><input type="text" class="new_postion"  required>&nbsp;&nbsp;
                           <label>Company</label>
                           <input type="text" class="new_company"   required></span>  
                           </p>
                           <br />
                           <p>
                           <label>Date From</label>
                           <span class="field"><input type="date" class="new_date_from"  required> &nbsp;&nbsp;
                           <label>Date To</label>
                           <input type="date" class="new_date_to"  required></span>
                           </p>
                           </br>
                           <p>
                           <span class="field"><textarea cols="100" rows="5" class="new_job_details" id="job_details" style="resize:none" required></textarea></span>
                           </p>
                           <button class="stdbtn btn_black" id="done_add_expr" style="margin:20px;width:80px">Done</button>
                       <button class="stdbtn btn" id="cancel_add_expr" style=";width:80px">Cancel</button>
                       
                       </div>
                       
                     <div id="new_exprs"></div>
                     <div id="ok_or_not"><button class="stdbtn btn_black" id="done_edit_expr" style="margin:20px;width:80px">Done</button>
                       <button class="stdbtn btn" id="cancel_edit_expr" style=";width:80px">Cancel</button></div>
                        
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
                       <div id="new_skill" style="padding:20px">
                       
                       <p>
                           <h3 >New Skill</h3>
                           <br />
                           <p>
        <label>Skill : </label>
        <span class="field">
        <input type="text" class="new_skill"  required>&nbsp;&nbsp;&nbsp;
        <label>Level : </label>
        <select class="new_level"  required>
        <option value="" >Select Level</option>
        <option value="Excellent">Excellent</option>
        <option value="Very Good">Very Good</option>
         <option value="Good">Good</option>
          <option value="Medium">Medium</option>
          <option value="Acceptable">Acceptable</option>
          <option value="Weak">Weak</option>
        </select>
    </span></p>
                           <button class="stdbtn btn_black" id="done_add_skill" style="margin:20px;width:80px">Done</button>
                       <button class="stdbtn btn" id="cancel_add_skill" style=";width:80px">Cancel</button>
                       
                       </div>
                       
                     <div id="skills_db"></div>
                     <div id="ok_or_not_skill"><button class="stdbtn btn_black" id="done_edit_skill" style="margin:20px;width:80px">Done</button>
                       <button class="stdbtn btn" id="cancel_edit_skill" style=";width:80px">Cancel</button></div>
                       
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
                       <div id="new_edu" style="padding:20px">
                       
                       <p>
                           <h3 >New Study</h3>
                           <br />
                           <p>
                           <label>School</label>
                           <span class="field"><input type="text" class="new_school" required>&nbsp;&nbsp;&nbsp;
                           <label>Grad Year</label>
                        	<input type="number" min="1980" max="2013" class="new_grad_year"  required>&nbsp;&nbsp;&nbsp;
                           <label>Country</label>
                           <select class="new_country" size="1">
   <?php for($i=0;$i< count($country_list);$i++) {
  echo " <option value=\"$country_list[$i]\"";
    echo ">$country_list[$i]</option>";
   } ?>
   </select></span></p><p><br />
   							<label>Field of Study</label>
                             <span class="field"><input type="text" class="new_field_study" required>&nbsp;&nbsp;&nbsp;
                             <label>Degree</label>
                             <input type="text" class="new_degree" required></span> 
                              </p><p><br />
                           <span class="field"><textarea cols="100" rows="5" class="new_edu_details" required style="resize:none"></textarea></span>
                           </p>
                           <button class="stdbtn btn_black" id="done_add_edu" style="margin:20px;width:80px">Done</button>
                       <button class="stdbtn btn" id="cancel_add_edu" style=";width:80px">Cancel</button>
                       </div>
                       
                       <div id="edu_db"></div>
                     <div id="ok_or_not_edu"><button class="stdbtn btn_black" id="done_edit_edu" style="margin:20px;width:80px">Done</button>
                       <button class="stdbtn btn" id="cancel_edit_edu" style=";width:80px">Cancel</button></div>
                       
                       <br />
                       
                       <br clear="all" />
                      
                    </div>
 
					<div class="one_half" style="width:100% ; border-top:1px dashed #e1e1e1 ; padding:15px 0 10px 0" >
                    	<h1 class="title"><strong style="color:#096">Following</strong><p style="float:right;cursor:pointer;font-size:13px; font-family:Arial, Helvetica, sans-serif;margin-right:15px " class="show_content">Show All</p></h1>
                                       <br />
                        <div class="widgetcontent announcement following_items" >
                        <?php if(isset($following) && count($following) != 0){
						foreach ($following as $row){
							$company_id=$row->company_id;
							$company_info = $this->model_company->get_company_info($company_id);
							foreach ($company_info as $r){
							$id = $r ->id;	
							$name = $r->name;
							$field = $r->field;
							$logo = $r->logo;
							$about = $r->about;
							}
							?>
                            <p class="text">
                  <img src="<?php echo base_url();?>images/campanies_logo/<?php echo $logo;?>" width="70" height="50" style="float:left ; border:1px solid #c1c1c1 ; padding:2px ; margin:0 10px 0 10px " /> <a href="<?php echo base_url();?>company/profile/<?php echo $id; ?>" ><?php echo $name;?></a> <span class="radius2" style="float:right"><?php echo $field;?></span> <br /><?php echo substr($about,0,90);?></p>
                  <br />
                            <?php }}else{?>
                    <center><h1 style="color:#c1c1c1">There Are Not Following Companies Yet</h1></center><br />
                    <?php } ?>
                            </div>
                            </div>        
                    <br clear="all"/>
                   
                </div><!--content-->
                
            </div><!--maincontentinner-->
            
           <?php include('footer.php');?>
            
        </div><!--maincontent-->
        
        <?php include('user_right.php');?>
       
     	</div><!--mainwrapperinner-->
    </div><!--mainwrapper-->
	<!-- END OF MAIN CONTENT -->
   
</body>
</html>
