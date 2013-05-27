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

<script type="text/javascript" src="<?php echo base_url();?>js/general.js" ></script>

<script type="text/javascript" src="<?php echo base_url();?>js/dashboard.js" ></script>



 <script>
jQuery(document).ready(function() {
  jQuery(".following_items").hide();
  //toggle the componenet with class msg_body
  jQuery(".show_content").click(function()
  {
    jQuery(".following_items").slideToggle(500);
	$('.following_items').focus();
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
                
                <div class="content">
               
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
                
                	<div class="one_half" style="width:100%">
                    	<h1> <strong style="color:#096"> <?php echo $username; ?> </strong> Personnal Information</h1>
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
                       
                        <?php }else { ?>
                        <br>
                            <center style="margin:10px"><span> There is not <a href="<?php echo base_url(); ?>user/edit">Update</a> Yet.</span></center>
								<?php } ?></p>
                    </div>
                    
                    <br clear="all" /><br />
                    
                    <div class="one_half" style="width:100%; padding-bottom:10px">
                    	<h1>About <strong style="color:#096"><?php echo $username; ?></strong></h1>
                        <br />
                    	<p><?php if(isset($about)){echo $about; }else { ?>
                            <span> There is not <a href="<?php echo base_url(); ?>user/edit">Update</a> Yet.</span>
								<?php } ?> </p>
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
                    	<h1> <strong style="color:#096"> <img src="<?php echo base_url();?>images/summary2.png" width="50" height="50" /> Summary </strong></h1>
                        <br />        
                       <p><?php echo $summary ;  ?>
                       </p>
                       </div>
                       <br />
                       <div class="one_half t" style="width:100%; border-top:1px dashed #e1e1e1 ; padding:15px 0 10px 0">
                    	<h1> <strong style="color:#096"> <img src="<?php echo base_url();?>images/bookmark2.png" width="50" height="50" /> Accomplishments </strong></h1>
                        <br />        
                       <p><?php echo $accomplishments ;  ?>
                       </p>
                       </div>
                       <br clear="all" /> 
                    <?php }?>
                    
                    <div class="one_half" style="width:100% ; border-top:1px dashed #e1e1e1 ; padding:15px 0 10px 0">
                    	<h1> <strong style="color:#096"> <img src="<?php echo base_url();?>images/list-icon.png" width="40" height="40" />  Experience </strong></h1>
                    <?php 
					$counter=1;
					if(isset($cv_exper)){
						foreach($cv_exper as $row){
							$postion = $row->postion;
							$date_from = $row->date_from;
							$date_to = $row->date_to;
							$company = $row->company;
							$datails = $row->details;
						?>
                    
                        <br />      
                        <div style="font-size:14px">  
                       <p><?php echo $counter.") "; ?><span><strong><?php echo $postion ;?></strong></span> at <span><strong><?php echo $company ;?></strong></span> from <span>
                       <strong><?php echo $date_from ;?></strong></span> to <span><strong><?php echo $date_to ;?></strong></span>
                       </p>
                       <br />
                       <p style="margin-left:40px"><?php echo $datails ;?></p>
                       </div>
                       
                       <?php $counter++; }}?>
                    </div>
                    
                    <div class="one_half" style="width:100% ; border-top:1px dashed #e1e1e1 ; padding:15px 0 10px 0">
                    	<h1> <strong style="color:#096"> <img src="<?php echo base_url();?>images/skills.png" width="40" height="40" />  Skills </strong></h1>
                    <?php 
					$counter=1;
					if(isset($cv_skills)){
						foreach($cv_skills as $row){
							$skill = $row->skill;
							$level = $row->level;
						?>
                    
                        <br />      
                        <div style="font-size:14px">  
                       <p><?php echo $counter.") "; ?><span><strong><?php echo $skill ;?></strong></span><div class="progress">
                            <div class="bar2" style="width:70%; margin-left:100px"><div class="value <?php if($level == 'Excellent'){ echo 'bluebar';}elseif($level == 'Very Good')
							{ echo 'bluebar';}elseif($level == 'Good'){echo 'orangebar';}elseif($level == 'Medium'){echo 'orangebar';}elseif($level == 'Acceptable'){echo 'redbar';}elseif($level == 'Weak'){echo 'redbar';} ?>" style="width: <?php if($level == 'Excellent'){ echo '95%';}elseif($level == 'Very Good')
							{ echo '85%';}elseif($level == 'Good'){echo '75%';}elseif($level == 'Medium'){echo '65%';}elseif($level == 'Acceptable'){echo '50%';}elseif($level == 'Weak'){echo '35%';} ?>"><?php echo $level ;?></div></div>
                        </div>
                       </p>
                       <br />
                       </div>
                       
                       <?php $counter++; }}?>
                    </div>
                    
                    
                    
                    <div class="one_half" style="width:100% ; border-top:1px dashed #e1e1e1 ; padding:15px 0 10px 0">
                    	<h1> <strong style="color:#096"> <img src="<?php echo base_url();?>images/edu.png" width="40" height="40" />  Study </strong></h1>
                    <?php 
					$counter=1;
					if(isset($cv_edu)){
						foreach($cv_edu as $row){
							$school = $row->school;
							$grad_year = $row->grad_year;
							$country = $row->country;
							$field_study = $row->field_study;
							$degree = $row->degree;
							$details = $row->details;
						?>
                        <br />
                        <div style="margin-left:30px">
                          <strong style="font-size:16px ; color:#111"><?php echo $school; ?></strong><br />
                          <span style="color:#a1a1a1"><?php echo $field_study; ?> - <?php echo $degree; ?> - <?php echo $country; ?> - <?php echo $grad_year; ?></span><br />
                          <span><?php echo $datails; ?></span>
                        </div>
                       <?php $counter++; }}?>
                    </div>
 
					<div class="one_half" style="width:100% ; border-top:1px dashed #e1e1e1 ; padding:15px 0 10px 0" >
                    	<h1><strong style="color:#096">Following</strong><p style="float:right;cursor:pointer;font-size:13px; font-family:Arial, Helvetica, sans-serif; " class="show_content">Show All</p></h1>
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
                            <p>
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
        
        <div class="mainright">
        	<div class="mainrightinner">
            	  <div class="widgetbox">
                	<div class="title"><h2 class="calendar"><span>Calendar</span></h2></div>
                    <div class="widgetcontent padding0">
                    	<div id="datepicker"></div>
                    </div><!--widgetcontent-->
                </div><!--widgetbox-->
                <div class="widgetbox" >
                        <div class="title"><h2 class="tabbed"><span>Recent Activity</span></h2></div>
                        <div class="widgetcontent padding0">
                            <ul class="activitylist">
                            	<li class="message"><a href=""><strong>Temraz</strong> sent a message <span>Just now</span></a></li>
                                <li class="user"><a href=""><strong>Al hawata</strong> added <strong>23 users</strong> <span>Yesterday</span></a></li>
                                <li class="user"><a href=""><strong>Sheir</strong> added <strong>2 users</strong> <span>2 days ago</span></a></li>
                                <li class="message"><a href=""><strong>Gado</strong> sent a message <span>5 days ago</span></a></li>
                                <li class="media"><a href=""><strong>Badran</strong> uploaded <strong>2 photos</strong> <span>5 days ago</span></a></li>
                                 <li class="media"><a href=""><strong>Mohamed Temraz</strong> uploaded <strong>2 photos</strong> <span>5 days ago</span></a></li>
                            </ul>
                        </div><!--widgetcontent-->
                    </div><!--widgetbox-->
                 <div class="widgetbox">
                	<div class="title"><h2 class="tabbed"><span>Tabbed Widget</span></h2></div>
                    <div class="widgetcontent padding0">
                    	<div id="tabs">
                        	<ul>
                                <li><a href="#tabs-1">Products</a></li>
                                <li><a href="#tabs-2">Posts</a></li>
                                <li><a href="#tabs-3">Media</a></li>
                            </ul>
                            <div id="tabs-1">
                                <ul class="listthumb">
                                	<li><img src="<?php echo base_url();?>images/thumb1.png" alt="" /> <a href="">Proin elit arcu, rutrum commodo</a></li>
                                    <li><img src="<?php echo base_url();?>images/thumb2.png"  alt="" /> <a href="">Aenean tempor ullamcorper leo</a></li>
                                    <li><img src="<?php echo base_url();?>images/thumb3.png"  alt="" /> <a href="">Vehicula tempus, commodo a, risus</a></li>
                                    <li><img src="<?php echo base_url();?>images/thumb4.png"  alt="" /> <a href="">Donec sollicitudin mi sit amet mauris</a></li>
                                    <li><img src="<?php echo base_url();?>images/thumb5.png"  alt="" /> <a href="">Curabitur nec arcu</a></li>
                                </ul>
                            </div>
                            <div id="tabs-2">
                                <ul>
                                	<li><a href="">Proin elit arcu, rutrum commodo</a></li>
                                    <li><a href="">Aenean tempor ullamcorper leo</a></li>
                                    <li><a href="">Vehicula tempus, commodo a, risus</a></li>
                                    <li><a href="">Donec sollicitudin mi sit amet mauris</a></li>
                                    <li><a href="">Curabitur nec arcu</a></li>
                                </ul>
                            </div>
                            <div id="tabs-3">
                                <ul class="thumb">
                                	<li><a href="#"><img src="<?php echo base_url();?>images/thumb1-1.png"  alt="" /></a></li>
                                    <li><a href="#"><img src="<?php echo base_url();?>images/thumb2-1.png"  alt="" /></a></li>
                                    <li><a href="#"><img src="<?php echo base_url();?>images/thumb3-1.png"  alt="" /></a></li>
                                    <li><a href="#"><img src="<?php echo base_url();?>images/thumb4-1.png"  alt="" /></a></li>
                                    <li><a href="#"><img src="<?php echo base_url();?>images/thumb5-1.png"  alt="" /></a></li>
                                    <li><a href="#"><img src="<?php echo base_url();?>images/thumb6.png"  alt="" /></a></li>
                                    <li><a href="#"><img src="<?php echo base_url();?>images/thumb7.png"  alt="" /></a></li>
                                    <li><a href="#"><img src="<?php echo base_url();?>images/thumb8.png"  alt="" /></a></li>
                                </ul>     
                        	</div>
                        </div><!--#tabs-->
                    </div><!--widgetcontent-->
                </div><!--widgetbox-->
                
           
                
               
                
                
              
               
               </div><!--mainrightinner-->
        </div><!--mainright-->  
     	</div><!--mainwrapperinner-->
    </div><!--mainwrapper-->
	<!-- END OF MAIN CONTENT -->
   
</body>
</html>
