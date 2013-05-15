<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<title>Business Linkage</title>
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
<script type="text/javascript" src="<?php echo base_url();?>js/jquery-ui-1.8.16.custom.min.js" ></script>
<script type="text/javascript" src="<?php echo base_url();?>js/colorpicker.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>js/jquery.jgrowl.js" ></script>
<script type="text/javascript" src="<?php echo base_url();?>js/jquery.alerts.js" ></script>
<script type="text/javascript" src="<?php echo base_url();?>js/general.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>js/elements.js" ></script>
<!--[if lt IE 9]>
	<script src="css3-mediaqueries.js" tppabs="http://css3-mediaqueries-js.googlecode.com/svn/trunk/css3-mediaqueries.js"></script>
<![endif]-->

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
        
        <div class="maincontent noright">
        	<div class="maincontentinner">
            	
                <ul class="maintabmenu">
                	<li class="current"><a href="dashboard.html" tppabs="http://themepixels.com/themes/demo/webpage/starlight/dashboard.html">Elements</a></li>
                </ul><!--maintabmenu-->
                
                <div class="content">
                    
                    <div class="contenttitle">
                    	<h2 class="widgets"><span>Pickers</span></h2>
                    </div><!--contenttitle-->
                    
                    <br />
                    
                    <div class="stdform stdform2">
                    	<p>
                        	<label>Colorpicker</label>
                            <span class="field">
                            	<input type="text" name="colorpicker" class="vsmallinput" id="colorpicker" />
                            </span><!--field-->
                        </p>
                        <p>
                        	<label>Colorpicker 2</label>
                            <span class="field">
                            	<input type="text" name="colorpicker" class="vsmallinput" id="colorpicker2" />
                                <span id="colorSelector" class="colorselector">
                                	<span></span>
                                </span>
                            </span><!--field-->
                        </p>
                        <p class="flatmode">
                        	<label>Colorpicker Flat Mode</label>
                            <span class="field">
                            	<input type="text" name="colorpicker" class="vsmallinput" id="colorpicker3" />
                                <br /><br />
                            	<span id="colorpickerholder"></span>
                                
                            </span><!--field-->
                        </p>
                        <p>
                        	<label>Date Picker</label>
                            <span class="field">
                            	<input id="datepicker" type="text" class="width100" /> 
                            </span>
                        </p>
                    </div><!--stdForm-->
                    
                  	<br />
                    
                    <div class="contenttitle">
                    	<h2 class="widgets"><span>Sliders</span></h2>
                    </div><!--contenttitle-->
                    
                    <br />
                    
                    <div class="stdform stdform2">
                    	
                        <div class="par">
                        	<label>Normal Slider</label>
                            <div class="field">
                            	<div id="slider"></div>
                            </div><!--field-->
                        </div><!--par-->
                        
                        <div class="par">
                        	<label>Snap to Increments</label>
                            <div class="field">
                            	<span>Withdrawal: <strong><span id="amount" class="color333"></span></strong> </span>
                        		<div id="slider2"></div>
                            </div><!--field-->
                        </div><!--par-->
                        
                        <div class="par">
                        	<label>Range Slider</label>
                            <div class="field">
                            	<span>Price Range: <strong><span id="amount2" class="color333"></span></strong></span>
                        		<div id="slider3"></div>
                            </div><!--field-->
                        </div><!--par-->
                        
                        <div class="par">
                        	<label>Fixed Minimum</label>
                            <div class="field">
                            	<span>Maximum price: <strong><span id="amount4" class="color069"></span></strong></span>
                        		<div id="slider4"></div>
                            </div><!--field-->
                        </div><!--par-->
                        
                        <div class="par">
                        	<label>Fixed Maximum</label>
                            <div class="field">
                            	<span>Maximum price: <strong><span id="amount5" class="color333"></span></strong></span>
                        		<div id="slider5"></div>
                            </div><!--field-->
                        </div><!--par-->
                        
                        <div class="par">
                        	<label>Vertical Slider</label>
                            <div class="field">
                        		<div style="float: left; width: 70px;">
                                    <span>Volume: <strong><span id="amount6" class="color333"></span></strong></span> <br />
                                    <div id="slider6" style="height:150px;"></div>
                                </div>
                                
                                <div class="vs2" style="float: left; margin-left: 80px;">
                                    <span>Price Range: <strong><span id="amount7" class="color333"></span></strong></span> <br />
                                    <div id="slider7" style="height:150px;"></div>
                                </div>
                                <br clear="all" />
                            </div><!--field-->
                        </div><!--par-->
                        
                    </div><!--stdForm-->
                      
                    <br clear="all" /><br />
                    
                    <div class="contenttitle">
                    	<h2 class="widgets"><span>Notification Messages</span></h2>
                    </div><!--contenttitle-->
                    
                    <br />
                    
                    <div class="notification msginfo">
                        <a class="close"></a>
                        <p>This is an information message.</p>
                    </div><!-- notification msginfo -->
                    
                    <div class="notification msgsuccess">
                        <a class="close"></a>
                        <p>This is a success message.</p>
                    </div><!-- notification msgsuccess -->
                    
                    <div class="notification msgalert">
                        <a class="close"></a>
                        <p>This is an alert message.</p>
                    </div><!-- notification msgalert -->
                    
                    <div class="notification msgerror">
                        <a class="close"></a>
                        <p>This is an error message.</p>
                    </div><!-- notification msgerror -->
                    
                    <br />
                    
                    <div class="contenttitle">
                    	<h2 class="widgets"><span>Growl Notifications</span></h2>
                    </div><!--contenttitle-->
                    <br />
					<a href="" class="anchorbutton button_alert growl"><span>Basic growl</span></a> &nbsp;
                    <a href="" class="anchorbutton button_alert growl2"><span>Long live growl message</span></a>
                    
                    <br /><br /><br />
                    
                    <div class="contenttitle">
                    	<h2 class="widgets"><span>Alert Boxes</span></h2>
                    </div><!--contenttitle-->
                    <br />
					<a href="" class="anchorbutton button_alert alertboxbutton"><span>Basic Alert</span></a> &nbsp;
                    <a href="" class="anchorbutton button_alert confirmbutton"><span>Confirm Box</span></a> &nbsp;
					<a href="" class="anchorbutton button_alert promptbutton"><span>Prompt Box</span></a> &nbsp;
                    <a href="" class="anchorbutton button_alert alerthtmlbutton"><span>Dialog with HTML support</span></a>
                    
                    <br /><br /><br />
                                        
                    <div class="one_half">
                        <div class="contenttitle">
                            <h2 class="widgets"><span>Progress Bar</span></h2>
                        </div><!--contenttitle-->
                        <br />
                        <div class="progress">
                            Storage (60%)
                            <div class="bar"><div class="value bluebar" style="width: 60%;"></div></div>
                        </div><!--progress-->
                        <br />
                        <div class="progress">
                            Bandwidth (86%)
                            <div class="bar"><div class="value orangebar" style="width: 86%;"></div></div>
                        </div><!--progress-->
                        <br />
                        <div class="progress">
                            Impression (34%)
                            <div class="bar"><div class="value redbar" style="width: 34%;"></div></div>
                        </div><!--progress-->

                    </div><!--one_half-->
                    
                    <div class="one_half last">
                        <div class="contenttitle">
                            <h2 class="widgets"><span>Progress Bar</span></h2>
                        </div><!--contenttitle-->
                        <br />
                        <div class="progress">
                            <div class="bar2"><div class="value bluebar" style="width: 60%;">Storage (60%)</div></div>
                        </div><!--progress-->
                        <br />
                        <div class="progress">
                            <div class="bar2"><div class="value orangebar" style="width: 86%;">Storage (86%)</div></div>
                        </div><!--progress-->
                        <br />
                        <div class="progress">
                            <div class="bar2"><div class="value redbar" style="width: 34%;">Storage (34%)</div></div>
                        </div><!--progress-->
                    </div><!--one_half last-->
                    
                    <br clear="all" /><br /><br />
                    
                    <div class="contenttitle">
                    	<h2 class="widgets"><span>Pagination</span></h2>
                    </div><!--contenttitle-->
                    <br />
                    
                    <ul class="pagination">
                    	<li class="first"><a href="" class="disable">&laquo;</a></li>
                        <li class="previous"><a href="" class="disable">&lsaquo;</a></li>
                    	<li><a href="" class="current">1</a></li>
                        <li><a href="">2</a></li>
                        <li><a href="">3</a></li>
                        <li><a href="">4</a></li>
                        <li><a href="">5</a></li>
                        <li class="next"><a href="">&rsaquo;</a></li>
                        <li class="last"><a href="">&raquo;</a></li>
                    </ul>
                    
                    
                    <br clear="all" /><br /><br />
                    
                    <div class="contenttitle">
                    	<h2 class="widgets"><span>Sample Tab</span></h2>
                    </div><!--contenttitle-->
                    <br />

                    <div id="tabs">
                        	<ul>
                                <li><a href="#tabs-1">Tab 1</a></li>
                                <li><a href="#tabs-2">Tab 2</a></li>
                                <li><a href="#tabs-3">Tab 3</a></li>
                            </ul>
                            <div id="tabs-1">
                                Your content goes here for tab 1
                            </div>
                            <div id="tabs-2">
                                Your content goes here for tab 2
                            </div>
                            <div id="tabs-3">
                                Your content goes here for tab 3 
                        	</div>
					</div><!--#tabs-->
                    
                    <br clear="all" /><br />
                    
                    <div class="contenttitle">
                    	<h2 class="widgets"><span>Breadcrumbs</span></h2>
                    </div><!--contenttitle-->
                    <br />
                    
                    <ul class="breadcrumbs">
                    	<li><a href="">Dashboard</a></li>
                        <li><a href="">Elements</a></li>
                        <li>Breadcrumbs</li>
                    </ul>
                    <br />
                    <ul class="breadcrumbs breadcrumbs2">
                    	<li><a href="">Dashboard</a></li>
                        <li><a href="">Elements</a></li>
                        <li>Breadcrumbs</li>
                    </ul>

                    
                </div><!--content-->
                
            </div><!--maincontentinner-->
            
          <?php include('footer.php');?>
            
        </div><!--maincontent-->
        
                
     	</div><!--mainwrapperinner-->
    </div><!--mainwrapper-->
	<!-- END OF MAIN CONTENT -->
    

</body>
</html>
