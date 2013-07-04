<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<title>Dashboard |Business Linkage</title>
<link rel="stylesheet" href="<?php echo base_url();?>css/style.css"  type="text/css" />

<script type="text/javascript" src="<?php echo base_url();?>js/jquery-1.7.min.js"></script>
 
<script type="text/javascript" src="<?php echo base_url();?>js/jquery.flot.min.js" ></script>

<script type="text/javascript" src="<?php echo base_url();?>js/jquery.flot.resize.min.js" ></script>

<script type="text/javascript" src="<?php echo base_url();?>js/jquery-ui-1.8.16.custom.min.js"></script>

<script type="text/javascript" src="<?php echo base_url();?>js/general.js" ></script>

<script type="text/javascript" src="<?php echo base_url();?>js/dashboard.js" ></script>
<script type="text/javascript" src="<?php echo base_url();?>js/jquery.alerts.js" ></script>

<script type="text/javascript" >
var base_url = "<?php echo base_url(); ?>";
</script>
<script>
jQuery(document).ready(function(){

var job_id = jQuery('#job_id').val();
jQuery('#wait_m').hide();
	jQuery('#apply_job').click(function(){	
	jConfirm('Do You Really Want to apply to this job?', 'Confirm', function(r) {
                    if( r ){
		jQuery.post(base_url+"user/apply_job",{ job_id : job_id }, function(data){
			if(data.status == 'ok'){
					jQuery('#apply_m').hide();
					jQuery('#wait_m').hide().fadeIn(1000);					
				}
			},"json");
					}
	});
			
					
		});			
});
</script>

</head>

<body class="loggedin">

	<!-- START OF HEADER -->
	<?php  if($this->session->userdata('company_logged_in') || $this->session->userdata('user_logged_in')){ include('header.php'); }
				
				elseif($this->session->userdata('employee_logged_in')){include('header2.php'); }?>
    <!-- END OF HEADER -->
        
    <!-- START OF MAIN CONTENT -->
    <div class="mainwrapper">
     	<div class="mainwrapperinner">
         	
        <div class="mainleft">
          	<div class="mainleftinner">
            <?php  if($this->session->userdata('company_logged_in')){ include('left_menu_company.php'); } elseif($this->session->userdata('user_logged_in')){include('left_menu_user.php');}elseif($this->session->userdata('employee_logged_in')){include('left_menu.php'); }?>
            	<div id="togglemenuleft"><a></a></div>
            </div><!--mainleftinner-->
        </div><!--mainleft-->
        
        <div class="maincontent">
        	<div class="maincontentinner">
            	
                
                <div class="content">
                           <?php 
						   if(isset($job)){
						   foreach($job as $row){ 
						   $id = $row->id;
						   $company_id= $row->company_id;
						   $name = $row->name;
						   $description = $row->description;
						   $department = $row->department;
						   $level = $row->level;
						   $date = $row->date;
						  $country=$this->model_company->get_company_city($company_id);
						   }}
						   ?>
                           <h1><?php echo $name ;?></h1>
                           <br class="all"/>
                     <h3><?php echo $country ?></h3><br />
                     <small style="color:#AAA">Department : <?php echo $department;?></small>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<small style="color:#AAA">Professional level : <?php echo $level;?></small>
                     <p><?php echo $description;?></p><br />
                     <?php if($this->session->userdata('user_logged_in')){?>
                    <input type="hidden" value="<?php echo $id ?>" id="job_id" /> 
                      <?php 
					  $user_id = $this->session->userdata('user_id');
					$job_id = $this->uri->segment(3);
					  if(!$this->model_users->is_applied($user_id,$job_id)){ ?><h3 style="float:right;margin-right:40px" id="apply_m"><button class="stdbtn btn_black" id="apply_job" style="width:90px">Apply</button></h3>
                     <?php }else{ ?>
                     
                     <?php 
						foreach($applied_job as $row){
							$wait = $row->wait;
							$accept = $row->accept;
							$reject = $row->reject;
						?>
                      
                     <?php if($accept == 1 && $wait == 1){ ?>
                      <h3 style="color:#093; float:right;margin-right:40px" >You are aceepted be ready for the interview</h3>
                      <?php }elseif($accept == 0 && $wait == 1 && $reject==0){ ?>
                      <h3  style="color:#F60 ; float:right;margin-right:40px">Wait for Acception</h3>
                      
                      <?php }elseif($accept == 0 && $wait == 1){ ?>
					  <h3  style="color:#F60 ; float:right;margin-right:40px">We are Sorry You have been rejected in this job </h3>
					 <?php }}}?>
                       <h3 id="wait_m"  style="color:#F60 ; float:right;margin-right:40px">Wait for Acception</h3>
                      <?php }?>
                      <br />
                      <br class="all"/>
                     
                      
                </div><!--content-->
                
            </div><!--maincontentinner-->
            
           <?php include('footer.php');?>
            
        </div><!--maincontent-->
        
        <?php if($this->session->userdata('company_logged_in')){ ?>
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
                        <?php include('recent_activity.php');?>
                            </ul>
                        </div><!--widgetcontent-->
                    </div><!--widgetbox-->
                    <br />
                <div class="widgetbox" style="border:1px solid #c1c1c1;border-top:hidden">
                        <div class="title"><h2 class="tabbed"><span>The Bill</span></h2></div>
                            <center><h1 style="font-size:100px ; color:#c1c1c1 ; margin-top:10px ;word-wrap:break-word"><?php echo $bill; ?> $</h1></center>
                            <br clear="all" />
                        <div class="pay" style="padding:10px;border-top:1px solid #c1c1c1;cursor:pointer;">
                        <center><h1>PAY NOW</h1></center>
                        </div>
                        </div>
                        <br />
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
        <?php }elseif($this->session->userdata('employee_logged_in')){
         include('right_div.php');
       }elseif($this->session->userdata('user_logged_in')){
		    include('user_right.php');
		   }?>
     	</div><!--mainwrapperinner-->
    </div><!--mainwrapper-->
	<!-- END OF MAIN CONTENT -->
    

</body>
</html>
