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
                	<li class="current"><a href="dashboard.html" tppabs="http://themepixels.com/themes/demo/webpage/starlight/dashboard.html">Chat Support</a></li>
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
                    	<div class="chatsearch">
                        	<input type="text" name="" value="Search" />
                        </div>
                    	<ul class="contactlist">
                        	<li class="online new"><a href=""><img src="avatar.png" tppabs="http://themepixels.com/themes/demo/webpage/starlight/images/avatar.png" alt="" /> <span>Joey Lacaba</span></a><span class="msgcount">3</span></li>
                            <li><a href=""><img src="avatar.png" tppabs="http://themepixels.com/themes/demo/webpage/starlight/images/avatar.png" alt="" /> <span>Allan Cadungog</span></a></li>
                            <li class="online"><a href=""><img src="av1.png" tppabs="http://themepixels.com/themes/demo/webpage/starlight/images/av1.png" alt="" /> <span>Mary Jove Guden</span></a></li>
                            <li class="online"><a href=""><img src="avatar.png" tppabs="http://themepixels.com/themes/demo/webpage/starlight/images/avatar.png" alt="" /> <span>Raffy Godinez</span></a></li>
                            <li class="online new"><a href=""><img src="av2.png" tppabs="http://themepixels.com/themes/demo/webpage/starlight/images/av2.png" alt="" /> <span>Rhey Ramao</span></a><span class="msgcount">1</span></li>
                            <li><a href=""><img src="av3.png" tppabs="http://themepixels.com/themes/demo/webpage/starlight/images/av3.png" alt="" /> <span>Carla Guden</span></a></li>
                            <li><a href=""><img src="av4.png" tppabs="http://themepixels.com/themes/demo/webpage/starlight/images/av4.png" alt="" /> <span>Rowella Sombrio</span></a></li>
                            <li class="online"><a href=""><img src="avatar.png" tppabs="http://themepixels.com/themes/demo/webpage/starlight/images/avatar.png" alt="" /> <span>Cheryl Piscos</span></a></li>
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
