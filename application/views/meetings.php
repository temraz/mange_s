<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<title>Chat | Business Linkage</title>
<link rel="shortcut icon" href="<?php echo base_url();?>images/head.png" type="image/x-icon"/>
<link rel="stylesheet" href="<?php echo base_url();?>css/style.css" type="text/css" />

<script type="text/javascript" src="<?php echo base_url();?>js/jquery-1.7.min.js" ></script>
<script type="text/javascript" src="<?php echo base_url();?>js/jquery-ui-1.8.16.custom.min.js" ></script>
<script type="text/javascript" src="<?php echo base_url();?>js/general.js" ></script>
<script type="text/javascript" src="<?php echo base_url();?>js/chat.js" ></script>

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
            	
                <ul class="maintabmenu">
                	<li class="current"><a href="<?php echo base_url();?>site/chat/" >Meetings</a></li>
                </ul><!--maintabmenu-->
                
                <div class="content chatcontent" >
                   
                   <div id="chatmessage" class="chatmessage" style="height:480px;">
                   		<div style="width:600px;margin:auto;padding-top:20px;"> 
                        <script id="TB_embed_js" src="http://api.opentok.com/hl/embed/2emb4f6d08de1586228a87313cff4c85e08f161d/embed.js?width=600&height=440" type="text/javascript" charset="utf-8"></script>
                        </div>
                  <img style="position:absolute;margin-top:-37px;margin-left:195px;" src="<?php echo base_url();?>images/meet.png" />
                   </div><!--chatmessage-->
                   	     
                    
                </div><!--content-->
                
            </div><!--maincontentinner-->
            
            <?php include('footer.php');?>
            
        </div><!--maincontent-->
        <?php $to_id=$this->uri->segment(3);?>
        <div class="mainright">
        	<div class="mainrightinner">
            	
                <div class="widgetbox uncollapsible">
                	<div class="title"><h2 class="chat"><span>Contacts</span></h2></div>
                    <div class="widgetcontent padding0">
                    	<div class="chatsearch">
                        	<input type="text" name="" value="Search" />
                        </div>
                    	<ul class="contactlist">
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
                        	<a href="">+ Add Contact</a>
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
