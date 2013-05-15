<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<title>Calendar | Business Linkage</title>
<link rel="shortcut icon" href="<?php echo base_url();?>images/head.png" type="image/x-icon"/>
<link rel="stylesheet" href="<?php echo base_url();?>css/style.css"  type="text/css" />


<script type="text/javascript" src="<?php echo base_url();?>js/jquery-1.7.min.js" ></script>
<script type="text/javascript" src="<?php echo base_url();?>js/jquery-ui-1.8.16.custom.min.js" ></script>
<script type='text/javascript' src="<?php echo base_url();?>js/fullcalendar.min.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>js/general.js" ></script>
<script type="text/javascript" src="<?php echo base_url();?>js/calendar.js" ></script>

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
                	<li class="current"><a href="dashboard.html" tppabs="http://themepixels.com/themes/demo/webpage/starlight/dashboard.html">Calendar</a></li>
                </ul><!--maintabmenu-->
                
                <div class="content">
                
                    <div id="calendar"></div>
                    
                </div><!--content-->
                
            </div><!--maincontentinner-->
            
            <?php include('footer.php');?>
        </div><!--maincontent-->
        
        <div class="mainright">
        	<div class="mainrightinner">
            	
                <div class="widgetbox uncollapsible">
                	<div class="title"><h2 class="calendar"><span>Events</span></h2></div>
                    <div class="widgetcontent">
                    	<div id="external-events">
                            <div class="external-event">My friend's birthday event</div>
                            <div class="external-event">My wedding</div>
                            <div class="external-event">Company party</div>
                            <div class="external-event">Island hopping event</div>
                            <div class="external-event">Fun run event</div>
                            <p>Drag the events to the calendar to set a schedule.</p>
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
