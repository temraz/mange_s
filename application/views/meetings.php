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
	<?php include('header.php');?>
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
        
        <div class="mainright">
        	<div class="mainrightinner">
            	
                <div class="widgetbox uncollapsible">
                	<div class="title"><h2 class="chat"><span>Contacts</span></h2></div>
                    <div class="widgetcontent padding0">
                    	<div class="chatsearch">
                        	<input type="text" name="" value="Search" />
                        </div>
                    	<ul class="contactlist">
                        	<li class="online new"><a href=""><img src="<?php echo base_url();?>images/avatar.png"  alt="" /> <span>Moahmed Temraz</span></a></li>
                            <li><a href=""><img src="<?php echo base_url();?>images/avatar.png" alt="" /> <span> Moahmed Gado</span></a></li>
                            <li class="online"><a href=""><img src="<?php echo base_url();?>images/av1.png"  alt="" /> <span>Ahmed  al hawata</span></a></li>
                            <li class="online"><a href=""><img src="<?php echo base_url();?>images/avatar.png"  alt="" /> <span>Ahmed al_naqaa</span></a></li>
                            <li class="online new"><a href=""><img src="<?php echo base_url();?>images/av2.png"  alt="" /> <span>Mohamed saamy</span></a></li>
                            <li><a href=""><img src="<?php echo base_url();?>images/av3.png" alt="" /> <span>Mostafa Badran</span></a></li>
                            <li><a href=""><img src="<?php echo base_url();?>images/av4.png"  alt="" /> <span>Ahmed Atia</span></a></li>
                            <li class="online"><a href=""><img src="<?php echo base_url();?>images/avatar.png"  alt="" /> <span>Mostafa Helal</span></a></li>
                        </ul>
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
