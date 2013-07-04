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
<script type="text/javascript" src="<?php echo base_url();?>js/jquery.flot.resize.min.js" ></script>

<script type="text/javascript" >
var base_url = "<?php echo base_url(); ?>";
</script>
<script>
jQuery(document).ready(function(){

var event_id = jQuery('#event_id').val();
jQuery('#wait_e').hide();
	jQuery('#attend_event').click(function(){	
	jConfirm('Do You Really Want to attend this event?', 'Confirm', function(r) {
                    if( r ){
		jQuery.post(base_url+"user/attend",{ event_id : event_id }, function(data){
			if(data.status == 'ok'){
					jQuery('#apply_e').hide();
					jQuery('#wait_e').hide().fadeIn(1000);					
				}
			},"json");
					}
	});
			
					
		});			
});
</script>
<script type="text/javascript" src="<?php echo base_url();?>js/insert_comment.js" ></script>
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
						   if(isset($event)){
				foreach ($event as $row){
					$id=$row->id;
					$name=$row->name;
					$date=$row->date;
					$details=$row->details;
					$pic=$row->pic;
						   }}
						   ?>
                           <h1><?php echo $name ?></h1>
                            <h3 style="float:right ; color:#c1c1c1"><?php echo $date ?></h3>
                           <br class="all"/>
                    	<p><img src="<?php echo base_url();?>images/events/<?php echo $pic; ?>" height="200" width="270" style="float:left; border:1px solid #c1c1c1 ; margin:10px ; padding:3px "/><p><?php echo $details; ?></p></p>
                 <?php if($this->session->userdata('user_logged_in')){?>
                  <input type="hidden" value="<?php echo $id ?>" id="event_id" /> 
                      <?php 
					  $user_id = $this->session->userdata('user_id');
					$event_id = $this->uri->segment(3);
					  if(!$this->model_users->is_attend($user_id,$event_id)){ ?><h3 style="float:right;margin-right:40px" id="apply_e"><button class="stdbtn btn_black" id="attend_event" style="width:90px">Attend</button></h3>
                     <?php }else{ ?>
                     
                     <?php 
						foreach($events_attend as $row){
							$wait = $row->wait;
							$accept = $row->accept;
						?>
                      
                     <?php if($accept == 1 && $wait == 1){ ?>
                      <h3 style="color:#093; float:right;margin-right:40px" >You are aceepted</h3>
                      <?php }elseif($accept == 0 && $wait == 1){ ?>
                      <h3  style="color:#F60 ; float:right;margin-right:40px">Wait for Acception</h3>
                      
                      <?php }}}?>
                       <h3 id="wait_e"  style="color:#F60 ; float:right;margin-right:40px">Wait for Acception</h3>
                       <?php } ?>
                      <br />
                      <br clear="all" />
                      <div id="comment_area">
                      <h1 style="color:#09C;padding:10px ; border-bottom:1px solid #c1c1c1">Comments ( <strong id="comment_count"><?php  echo count($event_comment); ?></strong> ) </h1>
                      <br />
                      <?php if($this->session->userdata('user_id')){ ?>
                      <div id="write_comment" style="padding-bottom:20px">
                      <input type="hidden" id="user_id" value="<?php echo $this->uri->segment(3); ?>" />
                      <?php 
					   $user_info = $this->model_users->get_user_info($this->session->userdata('user_id'));
							foreach($user_info as $r)
							{
								$logo = $r->pic;
								$username = $r->username;
								$gender = $r->gender;
								} 
								if($logo == '' && $gender == 'male'){ $pic = 'male.gif' ;}
									elseif($logo == '' && $gender == 'female'){ $pic = 'female.gif' ;}
									else{$pic = $logo ;}
					  
					  ?>
                      <div id="user_img" style="float:left "><img src="<?php echo base_url();?>images/profile/<?php echo $pic ;?>" width="60" height="60" style="border:1px solid #919191;"/></div>
                      <div id="comment_input"><textarea id="comment_text"  style="resize:none; height:55px ; width:70%; margin-left:20px;float:left" placeholder="Type a Comment..."></textarea>
                      <div id="insert_btn"><button class="stdbtn btn_blue small" id="insert_comment" style="width:75px ; margin-left:20px">comment</button></div>
                      </div>
                      <br clear="all" />
                      </div>
                      <?php } ?>
                      <div id="comments" style="margin-left:80px">
                      <ul id="comment_list" style="list-style:none">
                      <?php if(isset($event_comment)){
						  foreach($event_comment as $row){
							  $id = $row->id;
							  $user_id = $row->user_id;
							  $comment = $row->comment;
							  $c_date = $row->c_date;
							  $user_info = $this->model_users->get_user_info($user_id);
							foreach($user_info as $r)
							{
								$logo = $r->pic;
								$username = $r->username;
								$gender = $r->gender;
								} 
								if($logo == '' && $gender == 'male'){ $pic = 'male.gif' ;}
									elseif($logo == '' && $gender == 'female'){ $pic = 'female.gif' ;}
									else{$pic = $logo ;}
									?>
                      <li style="padding:20px;border-top:1px solid #c1c1c1">
                      <div id="user_img_db" ><img src="<?php echo base_url();?>images/profile/<?php echo $pic; ?>" width="60" height="60" style="border:1px solid #919191; float:left"/>
                      </div>
                      <div id="comment_user"><strong style="margin-left:10px"><?php echo $username; ?></strong></div>
                      <div id="comment_db" style="margin-left:80px"><span><?php echo $comment ; ?></span></div>
                      <div id="comment_date" style="float:right"><small style="color:#c1c1c1"><?php echo $c_date ; ?></small></div>
                      <br />
                      </li>
                      <?php }}?>
                      </ul>
                      </div>
                      </div>
                      <br clear="all"/>
                      
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
