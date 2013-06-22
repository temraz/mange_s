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
                
                <div class="content">
               
               <h1 style="border-bottom:1px dashed #e1e1e1; padding-bottom:10px">Applied Jobs</h1>
                           <?php 
						   if(isset($applied_jobs) && count($applied_jobs) != 0){
						   foreach($applied_jobs as $row){ 
						   $job_id = $row->job_id;
						   $job = $this->model_company->get_job($job_id);
						   foreach($job as $r){
						   $company_id = $r->company_id;
						   $name = $r->name;
						   $description = $r->description;
						   $department = $r->department;
						   $level = $r->level;
						   $date = $r->date;
						    $country=$this->model_company->get_company_city($company_id);
						   ?>
 <div class="field" style="padding-top:40px; padding-bottom:25px; border-bottom:.1em solid #CCC">
                     <h2><a href="<?php echo base_url();?>company/job/<?php echo $job_id; ?>"> <?php echo $name;?></a></h2><small style="float:right"><?php echo $date;?></small><br />
                     <h3><?php echo $country ; ?></h3><br />
                     <p><?php echo substr($description,0,80);?></p><br />
                    <small style="color:#AAA">Department : <?php echo $department;?></small>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<small style="color:#AAA">Professional level : <?php echo $level;?></small>                      
                     </div>
                     <?php }}}else{?>
                     <br />
                    <center><h1 style="color:#c1c1c1">There Are Not Applied Jobs Yet</h1></center>
                    <?php } ?>
               
                    <br clear="all" />
                   
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
