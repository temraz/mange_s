<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<title>Charts | Business Linkage</title>
<link rel="shortcut icon" href="<?php echo base_url();?>images/head.png" type="image/x-icon"/>
<link rel="stylesheet" href="<?php echo base_url();?>css/style.css"  type="text/css" />
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
<!--[if lte IE 8]><script language="javascript" type="text/javascript" src="excanvas.min.js" tppabs="http://themepixels.com/themes/demo/webpage/starlight/js/plugins/excanvas.min.js"></script><![endif]-->
<script type="text/javascript" src="<?php echo base_url();?>js/jquery.flot.min.js" ></script>
<script type="text/javascript" src="<?php echo base_url();?>js/jquery.flot.pie.js" ></script>
<script type="text/javascript" src="<?php echo base_url();?>js/jquery.flot.resize.min.js" ></script>
<script type="text/javascript" src="<?php echo base_url();?>js/jquery-ui-1.8.16.custom.min.js" ></script>
<script type="text/javascript" src="<?php echo base_url();?>js/general.js" ></script>
<script type="text/javascript" src="<?php echo base_url();?>js/charts.js"></script>
<!--[if lt IE 9]>
	<script src="css3-mediaqueries.js" tppabs="http://css3-mediaqueries-js.googlecode.com/svn/trunk/css3-mediaqueries.js"></script>
<![endif]-->
</head>

<body class="loggedin">


	<!-- START OF HEADER -->
	<div class="header radius3">
    	<div class="headerinner">
        	
            <a href=""><img src="<?php echo base_url();?>images/starlight_admin_template_logo_small.png" tppabs="http://themepixels.com/themes/demo/webpage/starlight/images/starlight_admin_template_logo_small.png" alt="" /></a>
            
              
            <div class="headright">
            	<div class="headercolumn">&nbsp;</div>
            	<div id="searchPanel" class="headercolumn">
                	<div class="searchbox">
                        <form action="" method="post">
                            <input type="text" id="keyword" name="keyword" class="radius2" value="Search here" /> 
                        </form>
                    </div><!--searchbox-->
                </div><!--headercolumn-->
            	<div id="notiPanel" class="headercolumn">
                    <div class="notiwrapper">
                        <a href="messages.php.htm" tppabs="http://themepixels.com/themes/demo/webpage/starlight/ajax/messages.php" class="notialert radius2">5</a>
                        <div class="notibox">
                            <ul class="tabmenu">
                                <li class="current"><a href="messages.php.htm" tppabs="http://themepixels.com/themes/demo/webpage/starlight/ajax/messages.php" class="msg">Messages (2)</a></li>
                                <li><a href="activities.php.htm" tppabs="http://themepixels.com/themes/demo/webpage/starlight/ajax/activities.php" class="act">Recent Activity (3)</a></li>
                            </ul>
                            <br clear="all" />
                            <div class="loader"><img src="<?php echo base_url();?>images/loader3.gif" tppabs="http://themepixels.com/themes/demo/webpage/starlight/images/loaders/loader3.gif" alt="Loading Icon" /> Loading...</div>
                            <div class="noticontent"></div><!--noticontent-->
                        </div><!--notibox-->
                    </div><!--notiwrapper-->
                </div><!--headercolumn-->
                <div id="userPanel" class="headercolumn">
                    <a href="" class="userinfo radius2">
                        <img src="<?php echo base_url();?>images/avatar.png" tppabs="http://themepixels.com/themes/demo/webpage/starlight/images/avatar.png" alt="" class="radius2" />
                        <span><strong>Justin Meller</strong></span>
                    </a>
                    <div class="userdrop">
                        <ul>
                            <li><a href="">Profile</a></li>
                            <li><a href="">Account Settings</a></li>
                            <li><a href="index.html" tppabs="http://themepixels.com/themes/demo/webpage/starlight/index.html">Logout</a></li>
                        </ul>
                    </div><!--userdrop-->
                </div><!--headercolumn-->
            </div><!--headright-->
        
        </div><!--headerinner-->
	</div><!--header-->
    <!-- END OF HEADER -->
        
    <!-- START OF MAIN CONTENT -->
    <div class="mainwrapper">
     	<div class="mainwrapperinner">
         	
        <div class="mainleft">
          	<div class="mainleftinner">
            
              	<div class="leftmenu">
            		<ul>
                    	<li><a href="dashboard.html" tppabs="http://themepixels.com/themes/demo/webpage/starlight/dashboard.html" class="dashboard"><span>Dashboard</span></a></li>
                        <li><a href="widgets.html" tppabs="http://themepixels.com/themes/demo/webpage/starlight/widgets.html" class="widgets"><span>Widgets</span></a></li>
                        <li><a href="tables.html" tppabs="http://themepixels.com/themes/demo/webpage/starlight/tables.html" class="tables"><span>Tables</span></a></li>
                        <li><a href="elements.html" tppabs="http://themepixels.com/themes/demo/webpage/starlight/elements.html" class="elements"><span>Elements</span></a></li>
                        <li class="current"><a href="charts.html" tppabs="http://themepixels.com/themes/demo/webpage/starlight/charts.html" class="charts"><span>Graphs &amp; Charts</span></a></li>
                        <li><a href="media.html" tppabs="http://themepixels.com/themes/demo/webpage/starlight/media.html" class="media"><span>Media</span></a></li>
                        <li><a href="form.html" tppabs="http://themepixels.com/themes/demo/webpage/starlight/form.html" class="editor menudrop"><span>Forms</span></a>
                        	<ul>
                            	<li><a href="form.html" tppabs="http://themepixels.com/themes/demo/webpage/starlight/form.html"><span>Form Styling</span></a></li>
                            	<li><a href="editor.html" tppabs="http://themepixels.com/themes/demo/webpage/starlight/editor.html"><span>WYSIWYG Editor</span></a></li>
                                <li><a href="wizard.html" tppabs="http://themepixels.com/themes/demo/webpage/starlight/wizard.html"><span>Wizard</span></a></li>
                            </ul>
                        </li>
                        <li><a href="grid.html" tppabs="http://themepixels.com/themes/demo/webpage/starlight/grid.html" class="grid"><span>Grid</span></a></li>
                        <li><a href="calendar.html" tppabs="http://themepixels.com/themes/demo/webpage/starlight/calendar.html" class="calendar"><span>Calendar</span></a></li>
                        <li><a href="buttons.html" tppabs="http://themepixels.com/themes/demo/webpage/starlight/buttons.html" class="buttons"><span>Buttons &amp; Icons</span></a></li>
                        <li><a href="chat.html" tppabs="http://themepixels.com/themes/demo/webpage/starlight/chat.html" class="chat"><span>Chat Support</span></a></li>
                        <li><a href="404.html" tppabs="http://themepixels.com/themes/demo/webpage/starlight/404.html" class="error"><span>Error Pages</span></a></li>
                    </ul>
                        
                </div><!--leftmenu-->
            	<div id="togglemenuleft"><a></a></div>
            </div><!--mainleftinner-->
        </div><!--mainleft-->
        
        <div class="maincontent">
        	<div class="maincontentinner">
            	
                <ul class="maintabmenu">
                	<li class="current"><a href="dashboard.html" tppabs="http://themepixels.com/themes/demo/webpage/starlight/dashboard.html">Charts</a></li>
                </ul><!--maintabmenu-->
                
                <div class="content">
                    
                    <div class="contenttitle">
                    	<h2 class="chart"><span>Simple Chart</span></h2>
                    </div><!--contenttitle-->
                    <br />
                    <div id="chartplace" style="height:300px;"></div>
                    
                    <br />
                    
                    <div class="contenttitle">
                    	<h2 class="chart"><span>Bar Graph</span></h2>
                    </div><!--contenttitle-->
                    <br />
                    <div id="bargraph" style="height:300px;"></div>
                    
                    <br />
                    
                    <div class="contenttitle">
                    	<h2 class="chart"><span>Real Time Chart</span></h2>
                    </div><!--contenttitle-->
                    <br />
                    <div id="realtime" style="height:300px;"></div>
                    <p>You can update a chart periodically to get a real-time effect
                    by using a timer to insert the new data in the plot and redraw it.</p>
                    
                    <br />
                    
                    <div class="one_half">
                    	
                        <div class="contenttitle">
                            <h2 class="chart"><span>Pie Chart</span></h2>
                        </div><!--contenttitle-->
                        <br />
                        <p>Adjusted the radius values to place them within the pie.</p>
                        <br />
                        <div id="piechart2" style="height: 250px;"></div>
                                                
                    </div><!--one_half-->
                    
                    <div class="one_half last">
                    	
                        <div class="contenttitle">
                            <h2 class="chart"><span>Pie Chart</span></h2>
                        </div><!--contenttitle-->
                        <br />
                        <p>Default pie graph when legend is disabled. Since the labels would normally be outside the container, the graph is resized to fit.</p>
                        <div id="piechart3" style="height: 250px;"></div>
                        
                    </div><!--one_half-->
                    
                    <br clear="all" /><br />
                    
                </div><!--content-->
                
            </div><!--maincontentinner-->
            
            <div class="footer">
            	<p>Starlight Admin Template &copy; 2012. All Rights Reserved. Designed by: <a href="">ThemePixels.com</a></p>
            </div><!--footer-->
            
        </div><!--maincontent-->
        
        <div class="mainright">
        	<div class="mainrightinner">
            	
                <div class="widgetbox">
                	<div class="title"><h2 class="chart"><span>Graph in Sidebar</span></h2></div>
                    <div class="widgetcontent">
                    	<div id="chartplace2" class="chartplace"></div>
                    </div><!--widgetcontent-->
                </div><!--widgetbox-->
                
                
                <div class="widgetbox">
                	<div class="title"><h2 class="chart"><span>Pie Chart in Sidebar</span></h2></div>
                    <div class="widgetcontent">
                    	<div id="piechart" style="width: 280px; height: 200px;"></div>
                    </div><!--widgetcontent-->
                </div><!--widgetbox-->
                
                <div class="widgetbox">
                	<div class="title"><h2 class="chart"><span>Bar Graph in Sidebar</span></h2></div>
                    <div class="widgetcontent">
                    	<div id="bargraph2" style="height: 200px;"></div>
                    </div><!--widgetcontent-->
                </div><!--widgetbox-->
                
                
                
            </div><!--mainrightinner-->
        </div><!--mainright-->
                
     	</div><!--mainwrapperinner-->
    </div><!--mainwrapper-->
	<!-- END OF MAIN CONTENT -->
    

</body>
</html>
