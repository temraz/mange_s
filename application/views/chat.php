<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<title>Chat | Business Linkage</title>
<link rel="shortcut icon" href="<?php echo base_url();?>images/head.png" type="image/x-icon"/>
<link rel="stylesheet" href="<?php echo base_url();?>css/style.css" type="text/css" />
<!--[if IE 9]>
    <link rel="stylesheet" media="screen" href="ie9.css" tppabs="http://themepixels.com/themes/demo/webpage/starlight/css/ie9.css"/>
<![endif]-->

<!--[if IE 8]>
    <link rel="stylesheet" media="screen" href="ie8.css" tppabs="http://themepixels.com/themes/demo/webpage/starlight/css/ie8.css"/>
<![endif]-->

<!--[if IE 7]>
    <link rel="stylesheet" media="screen" href="ie7.css" tppabs="http://themepixels.com/themes/demo/webpage/starlight/css/ie7.css"/>
<![endif]-->
<script type="text/javascript" src="<?php echo base_url();?>js/jquery-1.7.min.js" ></script>
<script type="text/javascript" src="<?php echo base_url();?>js/jquery-ui-1.8.16.custom.min.js" ></script>
<script type="text/javascript" src="<?php echo base_url();?>js/general.js" ></script>

<script type="text/javascript">
var base_url=" <?php echo base_url();?> ";
var from_id=" <?php echo $this->session->userdata('emp_id') ;?> ";

var to_id="<?php echo $this->uri->segment(3);?>"

var my_id="<?php echo $this->session->userdata('emp_id') ;?>"

</script>


    <script type="text/javascript">
jQuery(function(){  
  jQuery('<audio id="chatAudio" ><source src="<?php echo base_url();?>images/sounds/notify.ogg" type="audio/ogg"><source src="<?php echo base_url();?>images/sounds/notify.mp3" type="audio/mpeg"><source src="<?php echo base_url();?>images/sounds/notify.wav" type="audio/wav"></audio>').appendTo('body');
   
});

</script>

<script type="text/javascript" src="<?php echo base_url();?>js/chat.js" ></script>

</head>
<?php $to_id=$this->uri->segment(3);?>
<style type="text/css"> #active{background:#eeeeee} #active:hover{background:#eeeeee} 
#date{float:right}
#message{position:absolute;margin-top:-4px;padding-left:4px;}
</style>
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
            	
                <ul class="maintabmenu">
                	<li class="current"><a href="dashboard.html" >Chat</a></li>
                </ul><!--maintabmenu-->
                
                <div class="content chatcontent">
                   
                   <div id="chatmessage" class="chatmessage">
                   		<div id="chatmessageinner"></div><!--chatmessageinner-->
                   </div><!--chatmessage-->
                   	
                   <div class="messagebox">
                   		<input type="text" id="msgbox" name="msgbox"  />
                        <button>Send</button>
                   </div>
                    
                </div><!--content-->
                
            </div><!--maincontentinner-->
            
            <?php include('footer.php');?>
            
        </div><!--maincontent-->
        
        <div class="mainright">
        	<div class="mainrightinner">
            	
                <div class="widgetbox uncollapsible">
                	<div class="title"><h2 class="chat"><span>Contacts</span></h2></div>
                    <div class="widgetcontent padding0">
                    	
                        <?php if(isset($chairman)){?>
                        
                    	<!--<!--<div class="chatsearch">
                        	<input type="text" name="" value="Search" />
                        </div>-->


                        <ul class="contactlist">
                         <?php if(isset($contacts)){foreach($contacts as $contact){?>
                        	<li <?php  if($contact->online == 1){ ?> class="online new" <?php }?> >
                            
                            <a href="<?php echo base_url(); ?>employee/chat/<?php echo $contact->id ?>">
                            
                            <img src="<?php echo base_url(); ?>images/profile/thumb_profile/<?php echo $contact->profile_pic ?>" width="35" height="30"   alt="" />
                            
                            <span><?php echo $contact->firstname ?> <?php echo $contact->lastname ?></span></a>
                            
                            <!--  <span class="msgcount">3</span> -->
                            
                            </li>
                            
                           <?php }}}elseif(isset($manager)){?>
                    
                    	<!--<div class="chatsearch">
                        	<input type="text" name="" value="Search" />
                        </div>-->

                        <ul class="contactlist">
                         <?php if(isset($contacts)){foreach($contacts as $contact){?>
                        	<li <?php  if($contact->online == 1){ ?> class="online new" <?php }if($contact->id == $to_id){ ?> id="active" <?php }?>>
                            
                            <a href="<?php echo base_url(); ?>employee/chat/<?php echo $contact->id ?>">
                            
                            <img src="<?php echo base_url(); ?>images/profile/thumb_profile/<?php echo $contact->profile_pic ?>" width="35" height="30"  alt="" />
                            
                            <span><?php echo $contact->firstname ?> <?php echo $contact->lastname ?></span></a>
                            
                          <!--  <span class="msgcount">3</span> -->
                            
                            </li>
                            
                           <?php }} ?>
						   <?php if(isset($my_chairman)){?>
                             
                            <li <?php  if($my_chairman->row(0)->online == 1){ ?> class="online new" <?php }if($my_chairman->row(0)->id == $to_id){ ?> id="active" <?php }?>>
                            
                            <a href="<?php echo base_url(); ?>employee/chat/<?php echo $my_chairman->row(0)->id; ?>">
                            
                            <img src="<?php echo base_url(); ?>images/profile/thumb_profile/<?php echo $my_chairman->row(0)->profile_pic; ?>" width="35" height="30"  alt="" />
                            
                            <span><?php echo $my_chairman->row(0)->firstname; ?> <?php echo $my_chairman->row(0)->lastname; ?></span></a>
                            
                            <!--  <span class="msgcount">3</span> -->
                            
                            </li>
                             <?php }?>
						   <?php }elseif(isset($sub_manager)){?>
                        
                    	<!--<!--<div class="chatsearch">
                        	<input type="text" name="" value="Search" />
                        </div>-->

                        <ul class="contactlist">
                         <?php if(isset($contacts)){foreach($contacts as $contact){?>
                        	<li   <?php  if($contact->online == 1){ ?> class="online new"  <?php }if($contact->id == $to_id){ ?> id="active" <?php }?> >
                            
                            <a href="<?php echo base_url(); ?>employee/chat/<?php echo $contact->id ?>">
                            
                            <img src="<?php echo base_url(); ?>images/profile/thumb_profile/<?php echo $contact->profile_pic ?>" width="35" height="30"  alt="" />
                            
                            <span><?php echo $contact->firstname ?> <?php echo $contact->lastname ?></span></a>
                            
                            <!--  <span class="msgcount">3</span> -->
                            
                            </li>
                            
                             
                           <?php }} ?>
						   <?php if(isset($my_manager)){?>
                             
                            <li <?php  if($my_manager->row(0)->online == 1){ ?> class="online new" <?php }if($my_manager->row(0)->id == $to_id){ ?> id="active" <?php }?>>
                            
                            <a href="<?php echo base_url(); ?>employee/chat/<?php echo $my_manager->row(0)->id; ?>">
                            
                            <img src="<?php echo base_url(); ?>images/profile/thumb_profile/<?php echo $my_manager->row(0)->profile_pic; ?>" width="35" height="30"  alt="" />
                            
                            <span><?php echo $my_manager->row(0)->firstname; ?> <?php echo $my_manager->row(0)->lastname; ?></span></a>
                            
                            <!--  <span class="msgcount">3</span> -->
                            
                            </li>
                             <?php }?>
						   <?php }elseif(!isset($manager,$chairman,$sub_manager)){ ?>
                        <!--<!--<div class="chatsearch">
                        	<input type="text" name="" value="Search" />
                        </div>-->


                        <ul class="contactlist">
							   <?php if(isset($contacts)){foreach($contacts as $contact){ if($id != $contact->id ){?>
                               
                        	<li <?php  if($contact->online == 1){ ?> class="online new" <?php }if($contact->id == $to_id){ ?> id="active" <?php }?>>
                            
                            <a href="<?php echo base_url(); ?>employee/chat/<?php echo $contact->id ?>">
                            
                            <img src="<?php echo base_url(); ?>images/profile/thumb_profile/<?php echo $contact->profile_pic ?>" width="35" height="30"  alt="" />
                            
                            <span><?php echo $contact->firstname ?> <?php echo $contact->lastname ?></span></a>
                            
                            <!--  <span class="msgcount">3</span> -->
                            
                            </li>
							 <?php }}} }?> 
                             
                              <?php if(isset($my_sub_manager)){?>
                             
                            <li <?php  if($my_sub_manager->row(0)->online == 1){ ?> class="online new" <?php }if($my_sub_manager->row(0)->id == $to_id){ ?> id="active" <?php }?>>
                            
                            <a href="<?php echo base_url(); ?>employee/chat/<?php echo $my_sub_manager->row(0)->id; ?>">
                            
                            <img src="<?php echo base_url(); ?>images/profile/thumb_profile/<?php echo $my_sub_manager->row(0)->profile_pic; ?>" width="35" height="30"  alt="" />
                            
                            <span><?php echo $my_sub_manager->row(0)->firstname; ?> <?php echo $my_sub_manager->row(0)->lastname; ?></span></a>
                            
                            <!--  <span class="msgcount">3</span> -->
                            
                            </li>
                             <?php }?>
                            
                        </ul>
                        
                        <?php if(isset($no_contacts)){?>
                        <div class="notification msgalert">
                        
                        <p>There are no contacts .</p>
                        <a class="close"></a>
                    </div>
                        <?php }?>
                        <div class="chatbottom">
                        	
                        </div>
                    </div><!--widgetcontent-->
                </div><!--widgetbox-->
                
            </div><!--mainrightinner-->
        </div><!--mainright-->
                
     	</div><!--mainwrapperinner-->
    </div><!--mainwrapper-->
	<!-- END OF MAIN CONTENT -->
    

</body>
</html>
